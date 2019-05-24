<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tabla_noticia;
use App\tabla_imagenes_noticia;
use App\Http\Requests\NoticiaStoreRequest;

use Illuminate\Support\Facades\DB;
use App\Request\TickerFormRequest;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = tabla_noticia::orderBy('id','ASC')->paginate();
        $imagenes_noticia = tabla_imagenes_noticia::all();
        return view('noticia.index',compact('noticias','imagenes_noticia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticia.create');
    }

    public function saveEditorImages(NoticiaStoreRequest $request)
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
            $store_path = "public/imagenes/noticias/editor/";
            $resource_path = "imagenes/noticias/editor/";
            $image_full_path = $store_path.$image_name;
            $resource_name = asset('storage/'.$resource_path.$image_name);
            Storage::disk('local')->put($image_full_path, $data);
            $img->removeAttribute("src");
            $img->setAttribute("src", $resource_name);
        }

        $contenidoHTML = $dom->saveHTML();
        return $contenidoHTML;
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
        $contenidoHTML = $this->saveEditorImages($request);

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
                'imagenes.*' => '|mimes:jpeg,png,jpg,gif,svg'
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

        return redirect()->route('noticia.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tabla_noticia = tabla_noticia::find($id);
        $tabla_imagenes_noticia = tabla_imagenes_noticia::all();
        return view('noticia.show',compact('tabla_noticia','tabla_imagenes_noticia'));
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
        $data = array(
            'noticia_a_editar' => $noticia_a_editar,
            "is_edit" => true);

        return view('noticia.create')->with('data', $data);
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
        $noticiaEditada = array(
            'titulo' => $request->get('titulo'),
            'contenido' => $request->get("contenidoHTML"),
            'video' => substr ( $video_path , 7, strlen($video_path) -7));

        DB::table('tabla_noticias')
            ->where('id', $id)
            ->update($noticiaEditada);

        return redirect()->route('noticia.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia_a_eliminar = tabla_noticia::find($id);
        $noticia_a_eliminar->delete();
     
        return redirect()->route('noticia.index');
    }
}
