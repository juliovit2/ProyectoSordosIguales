<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoticiaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required',
            'video' => 'required_without_all:contenido,imagenes',
            'imagenes' => 'required_without_all:contenido,video',
            'contenido' => 'required_without_all:video,imagenes'
        ];
    }
}
