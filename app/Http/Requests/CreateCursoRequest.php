<?php

namespace App\Http\Requests;

use App\tabla_curso;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CreateCursoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'profesor' => 'required'
        ];
    }

    public function messages(){

        return[
            'name.required' => 'El campo "Nombre" es obligatorio',
            'profesor.required' => 'El campo "Profesor Encargado" es obligatorio',
        ];
    }

    public function createCurso(){
        DB::transaction(function (){
            $data = $this->validated();
            $curso = new tabla_curso([
                'nombre' => $data['name'],
                'profesorid' => $data['profesor']
            ]);
            DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
            $curso->save();
            DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        });
    }

    public function save(){
        tabla_curso::createCurso($this->validated());
    }
}