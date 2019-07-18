<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tabla_noticia;
use App\tabla_imagenes_noticia;
use App\Http\Requests\NoticiaStoreRequest;

use Illuminate\Support\Facades\DB;
use App\Request\TickerFormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $noticias = tabla_noticia::orderBy('id','DESC')->paginate();
        $imagenes_noticia = tabla_imagenes_noticia::all();
        return view('noticia.index',compact('noticias','imagenes_noticia'));
    }

    public function public_index() {
        $noticias = tabla_noticia::orderBy('id','DESC')->paginate(6);
        $imagenes_noticia = tabla_imagenes_noticia::all();
        return view('noticia.public_index',compact('noticias','imagenes_noticia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $is_edit = false;
        return view('noticia.create', compact('is_edit'));
    }

    public function saveEditorImages(NoticiaStoreRequest $request, bool $store = true)
    {
        //Extraemos el contenido del editor
        $contenidoHTML = $request->get("contenidoHTML");
        $dom = new \DomDocument();
        if (strlen( $contenidoHTML) == 0) {
            $contenidoHTML = "<p><br></p>";
        }
        $dom->loadHtml($contenidoHTML, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName("img");

        //Guardamos cada imagen insertada en el editor en la BD
        foreach($images as $k => $img){
            $data = $img->getAttribute("src");
            list($type, $data) = explode(";", $data);
            list(, $data)      = explode(",", $data);
            $data = base64_decode($data);
            $image_name = time().$k.".png";
            $store_path = storage_path()."/app/public/imagenes/noticias/editor/";
            $resource_path = "imagenes/noticias/editor/";
            $image_full_path = $store_path.$image_name;
            //$resource_path = asset($store_path);
            //dd($image_full_path);
            $resource_name = asset('storage/'.$resource_path.$image_name);
            if ($store) {
                $filename = "public/imagenes/noticias/editor/".$image_name;
                Storage::disk('local')->put($filename, $data);
            }
            $img->removeAttribute("src");
            $img->setAttribute("src", $resource_name);
        }

        $contenidoHTML = $dom->saveHTML();
        return $contenidoHTML;
    }

    // remove the BOm marks from the beginning of the summernote html output
    private function strip_bom($text)
    {
        $bom = "&iuml;&raquo;&iquest";
        $text = str_replace("&iuml;&raquo;&iquest;", '', $text);
        return $text;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(NoticiaStoreRequest $request)
    {
        $contenidoHTML = $this->saveEditorImages($request, true);
        //TODO meterlo en una funcion, elimina los caracteres "BOM" del output del summernote
        $contenidoHTML = $this->strip_bom($contenidoHTML);
        $video_path = null;
        //validar
        if($request->has('video')) {
            $this->validate($request, [
                'video' => 'mimes:mp4,avi,mpeg,flv'
            ]);
            $video_path = $request->file('video')->store('public/videos/noticias');
        }

        $noticia = new tabla_noticia(array(
            'titulo' => $request->get('titulo'),
            'contenido' => $contenidoHTML,
            'video' => substr ( $video_path , 7, strlen($video_path) -7)));

        $noticia->save();

        if($request->has('imagenes')) {
            $this->validate($request, [
                'imagenes.*' => '|mimes:jpeg,png,jpg,gif,svg,raw'
            ]);

            foreach ($request->imagenes as $imagen) {
                $image_path = $imagen->store('public/imagenes/noticias');
                $imagen_noticia = new tabla_imagenes_noticia(array(
                    'imagen' =>  substr ( $image_path , 7, strlen($image_path) -7),
                    'noticiaid' => $noticia->id
                ));
                $imagen_noticia->save();
            }
        }

        return redirect()->route('noticias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tabla_noticia = tabla_noticia::find($id);
        $tabla_imagenes_noticia = tabla_imagenes_noticia::all();
        $is_edit = false;
        return view('noticia.show',compact('tabla_noticia','tabla_imagenes_noticia', 'is_edit'));
    }

    public function  show_preview(NoticiaStoreRequest $request) {
        $video_path = null;
        $noticia = array(
            'titulo' => $request->get('titulo'),
            'contenido' => $request->get("contenidoHTML"),
            'video' => substr ( $video_path , 7, strlen($video_path) -7));

        $imagenes = [];
        if($request->has('imagenes')) {
            $this->validate($request, [
                'imagenes.*' => '|mimes:jpeg,png,jpg,gif,svg'
            ]);
            foreach ($request->imagenes as $imagen) {
                $base64src = base64_encode(file_get_contents($imagen));
                $base64src = "data:".$imagen->getMimeType().";base64, ".$base64src;
                array_push($imagenes, $base64src);
            }
        }

        return view('noticia.show_preview',compact('noticia','imagenes'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia_a_editar = tabla_noticia::find($id);
        $tabla_noticia = tabla_noticia::find($id);
        $tabla_imagenes_noticia = tabla_imagenes_noticia::all();
        $is_edit = true;
        $data = array(
            'noticia_a_editar' => $noticia_a_editar,
            'tabla_imagenes_noticia' => $tabla_imagenes_noticia,
            'tabla_noticia' => $tabla_noticia,
            "is_edit" => true);

        return view('noticia.create', compact('tabla_noticia','tabla_imagenes_noticia', 'data', 'is_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video_path = null;
        //validar
        if($request->has('video')) {
            $this->validate($request, [
                'video' => 'mimes:mp4,avi,mpeg,flv'
            ]);
            $video_path = $request->file('video')->store('public/videos/noticias');
        }

        if ($video_path != null) {
            $noticiaEditada = array(
                'titulo' => $request->get('titulo'),
                'contenido' => $request->get("contenidoHTML"),
                'video' => substr ( $video_path , 7, strlen($video_path) -7));

            DB::table('tabla_noticias')
                ->where('id', $id)
                ->update($noticiaEditada);
        }

        info($request);
        DB::table('tabla_noticias')
            ->where('id', $id)
            ->update(['contenido' => $request->get("contenidoHTML"),
                     'titulo' => $request->get("titulo")]);

        if($request->has('imagenes')) {
            $this->validate($request, [
                'imagenes.*' => '|mimes:jpeg,png,jpg,gif,svg'
            ]);

            if (sizeof($request->imagenes) <= 0) {
                return redirect()->route('noticias.index');
            }

            //DB::table('tabla_imagenes_noticia')->where('noticiaid', '=', $id)->delete();
            $imagenes_noticia = tabla_imagenes_noticia::where('noticiaid',$id)->delete();

            foreach ($request->imagenes as $imagen) {
                $image_path = $imagen->store('public/imagenes/noticias');
                $imagen_noticia = new tabla_imagenes_noticia(array(
                    'imagen' =>  substr ( $image_path , 7, strlen($image_path) -7),
                    'noticiaid' => $id
                ));
                $imagen_noticia->save();
            }
        }

        return redirect()->route('noticias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video_path = null;
        $image_paths = null;

        $images = tabla_imagenes_noticia::where('noticiaid', $id)->get();
        $video_path = DB::table('tabla_noticias')
                     ->select('video')
                     ->where('id', $id)
                     ->get();
        $images = $images->toArray();
        $videos = $video_path->toArray();

        $noticia_a_eliminar = tabla_noticia::find($id);
        $noticia_a_eliminar->delete();

        // Log::info($image_paths);
        // Log::info($video_path);
        $imagenes_noticia = tabla_imagenes_noticia::where('noticiaid',$id)->delete();
        if ($images != []) {
            foreach ($images as $image)  {
                //Storage::disk('local')->delete(storage_path()."/app/public/".$images[0]["imagen"]);
                unlink(storage_path()."/app/public/".$image["imagen"]);
            }
        }

        foreach ($videos as $video)  {
            //Storage::disk('local')->delete(storage_path()."/app/public/".$images[0]["imagen"]);
            if ($video->video == "0") {
                continue;
            }
            unlink(storage_path()."/app/public/".$video->video);
        }
     
        return redirect()->route('noticias.index');
    }
}
