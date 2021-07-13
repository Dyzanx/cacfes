<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMail;

class ContactoController extends Component{
    public $nombre;
    public $correo;
    public $asunto;
    public $telefono;
    public $mensaje;

    public $mensajeError;
    public $mensajeSuccess;

    public function render(){
        return view('livewire.contacto');
    }

    public function hideMessage(){
        $this->mensajeError = null;
        $this->mensajeSuccess = null;
    }

    public function enviarMail(){
        if(!empty($this->nombre && $this->correo && $this->asunto && $this->mensaje)){
            Mail::to('cg9304@gmail.com')->send(new ContactoMail($this->nombre, $this->correo, $this->asunto, $this->telefono, $this->mensaje));

            $this->nombre = null;
            $this->correo = null;
            $this->asunto = null;
            $this->telefono = null;
            $this->mensaje = null;
            $this->mensajeSuccess = 'Correo enviado!, pasado un tiempo alguien se pondrá en contacto contigo';

        }else{
            $this->nombre = null;
            $this->correo = null;
            $this->asunto = null;
            $this->telefono = null;
            $this->mensaje = null;
            $this->mensajeError = 'Todos los campos excepto el telefono son obligatorios';
        }
    }
}