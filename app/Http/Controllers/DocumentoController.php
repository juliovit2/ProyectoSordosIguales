<?php

namespace App\Http\Controllers;

use App\Documento;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class DocumentoController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function interface()
    {
        $documentos = Documento::get();
        return view('documentos/interface', ['documentos' => $documentos]);//
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos = Documento::get();
        return view('documentos/index', ['documentos' => $documentos]);//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documentos/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $data = request()->all();
        $this->validate(request(), [
            'inputTitulo' => 'required',
            'inputPortada' => 'file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',
            'inputDocumento' => 'required|file|mimes:pdf',
        ]);
        $video = $data['inputVideo'] == null?'None':$data['inputVideo'];
        $filenameDocumento = time() . $data['inputDocumento']->getClientOriginalName();
        $fileDocumento = $request->file('inputDocumento')->storeAs('public/Documentos', $filenameDocumento);
        $documentoURL = \Storage::url($fileDocumento);

        if (Arr::exists($data, 'inputPortada')) {
            $filenamePortada = time() . $data['inputPortada']->getClientOriginalName();
            $filePortada = $request->file('inputPortada')->storeAs('public/Documentos', $filenamePortada);
            $portadaUrl = \Storage::url($filePortada);

            Documento::create([
                'titulo' => $data['inputTitulo'],
                'video' => $video,
                'pdf' => $documentoURL,
                'portada' => $portadaUrl
            ]);
        } else {
            Documento::create([
                'titulo' => $data['inputTitulo'],
                'video' => $video,
                'pdf' => $documentoURL,
            ]);
        }

        return redirect()->route('documentos.index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documento = Documento::get()->find($id);
        return view('documentos/edit', compact("documento"));//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->all();
        $this->validate(request(), [
            'inputTitulo' => 'required',
            'inputPortada' => 'file|image|mimes:jpeg,png,gif,webp,pdf|max:2048',
            'inputDocumento' => 'file|mimes:pdf|max:25600',
        ]);

        $documento = Documento::findOrfail($id);
        $video = $data['inputVideo'] == null?'None':$data['inputVideo'];
        $newPortada = $documento->portada;
        $newDocumento = $documento->pdf;

        //Reemplazar Documento
        if (Arr::exists($data, 'inputDocumento')) {
            //Encontrar la direcion url guardada
            $url = $documento->pdf;
            // Transformar la direccion URL en direccion de directorio y borrar
            $location = str_replace("/storage", "public", $url);
            \Storage::delete($location);

            // Crear nuevo archivo

            $filenameDocumento = time() . $data['inputDocumento']->getClientOriginalName();
            $fileDocumento = $request->file('inputDocumento')->storeAs('public/Documentos/', $filenameDocumento);
            $newDocumento = \Storage::url($fileDocumento);
        }

        //Reemplazar Portada
        if (Arr::exists($data, 'inputPortada')) {
            //Encontrar la direcion url guardada
            $url = $documento->portada;
            // Transformar la direccion URL en direccion de directorio y borrar
            $location = str_replace("/storage", "public", $url);
            \Storage::delete($location);

            // Crear nuevo archivo

            $filenamePortada = time() . $data['inputPortada']->getClientOriginalName();
            $filePortada = $request->file('inputPortada')->storeAs('public/Documentos/', $filenamePortada);
            $newPortada = \Storage::url($filePortada);
        }

        $documento->update([
            'titulo' => $data['inputTitulo'],
            'pdf' => $newDocumento,
            'portada' => $newPortada,
            'video' => $video,
        ]);

        return redirect()->route('documentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $documento = Documento::get()->find($id);

        //Encontrar la direcion url guardada
        $url = $documento->pdf;
        // Transformar la direccion URL en direccion de directorio y borrar
        $location = str_replace("/storage", "public", $url);
        \Storage::delete($location);

        //Encontrar la direcion url guardada
        $url = $documento->portada;
        // Transformar la direccion URL en direccion de directorio y borrar
        $location = str_replace("/storage", "public", $url);
        \Storage::delete($location);
        $documento->delete();

        return redirect()->route('documentos.index');
    }
}