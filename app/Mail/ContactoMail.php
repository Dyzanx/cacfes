<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactoMail extends Mailable{
    use Queueable, SerializesModels;

    public $subject = 'Mensaje de contacto de usuario';
    public $nombre;
    public $asunto;
    public $correo;
    public $telefono;
    public $mensaje;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $correo, $asunto, $telefono, $mensaje){
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->asunto = $asunto;
        $this->telefono = $telefono;
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->view('mail.contacto');
    }
}
