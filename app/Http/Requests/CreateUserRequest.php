<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CreateUserRequest extends FormRequest
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
            'name' => 'required',
            'rut' => 'required',
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
            'email.required' => 'El campo e-mail es obligatorio',
            'password.required' => 'El campo password es obligatorio',
        ];
    }

    public function createUser()
    {
        DB::transaction(function () {
            $data = $this->validated();

            $user = new User([
                'name' => $data['name'],
                'rut' => $data['rut'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'direccion' => $data['direccion'],
                'telefono' => $data['telefono'],
                'ciudad' => $data['ciudad'],
            ]);
            $user->save();
        });
    }
}