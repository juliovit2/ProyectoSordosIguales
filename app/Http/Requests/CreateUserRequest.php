<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CreateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'rut' => ['required', 'rut', 'unique:users,rut'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'ciudad' => 'required',
        ];
    }

    public function messages(){

        return[
            'name.required' => 'El campo nombre es obligatorio',
            'rut.required' => 'El campo rut es obligatorio',
            'email.required' => 'El campo e-mail es obligatorio',
            'password.required' => 'El campo password es obligatorio',
        ];
    }

    public function createUser(){
        DB::transaction(function (){

            $data = $this->validated();
            $user = new User([
                'name' => $data['name'],
                'rut' => $data['rut'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'telefono' => $data['telefono'],
                'direccion' => $data['direccion'],
                'ciudad' => $data['ciudad'],
            ]);
            $user->save();

        });
    }

    public function save(){
        User::createUser($this->validated());
    }
}
