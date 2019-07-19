<?php

namespace App\Http\Controllers;

use App\Documento;
use Illuminate\Http\Request;

class DocumentoPublicController extends Controller
{
    //
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
}
