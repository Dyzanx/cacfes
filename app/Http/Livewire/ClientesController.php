<?php

namespace App\Http\Livewire;

use Livewire\Component;
use  App\Models\Clientes;

class ClientesController extends Component{
    public $nombre;
    public $celular;
    public $direccionEntrega;
    public $editar = false;

    public function render(){
        return view('livewire.clientes', [
            'clientes' => Clientes::paginate(2)
        ]);
    }

    public function save(){

    }

    public function borrar($id){

    }

    public function editar($id){

    }
}
