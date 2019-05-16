<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class tabla_usuario extends Model
{
    //ES IMPORTANTE ingresar los datos en el mismo orden
    protected $fillable = [
        'rut', 'correo', 'nombre','direccion', 'telefono', 'ciudad', 'clave', 'rol', 'cursando'
    ];

    protected $hidden = [
        'remember_token',
    ];
}


/*use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword;

class User extends Authenticatable
{
    use Notifiable;

    // Función copiada del archivo:
    // vendor\laravel\framework\src\Illuminate\Auth\Passwords\CanResetPassword.php
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }
}*/
