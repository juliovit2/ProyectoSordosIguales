<?php

namespace App\Mail;

use http\Env\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $datos;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $request)
    {
        $this->datos = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        switch (count($this->datos)){
            case 5:
                return $this->subject('Contacto')->view('emails.correo');
            case 6:
                return $this->subject('Contacto')->view('emails.denuncia');
            default:
                return $this->subject('Contacto')->attach(public_path('temp/'.$this->datos[6]))->view('emails.voluntario');
        }
    }
}
