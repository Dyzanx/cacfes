<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Clientes;

class ClientesController extends Component{
    public $nombre;
    public $celular;
    public $direccionEntrega;
    public $tipoDoc;
    public $numDoc;
    public $tipoCliente;
    public $telefono;
    public $contacto;
    public $tipoBoleta;
    public $observaciones;

    public $crear = 'false';
    public $mensajeSuccess;
    public $mensajeError;
    public $clienteEdit = '';

    public function render(){
        return view('livewire.clientes', [
            'clientes' => Clientes::paginate(30)
        ]);
    }

    public function crear(){
        $this->crear = 'true';
    }

    public function cancelar(){
        $this->crear = 'false';
        $this->clienteEdit = '';
    }

    public function save(){
        $cliente = new Clientes();

        if(!empty($this->nombre) && !empty($this->celular) && !empty($this->direccionEntrega)){
            $cliente->nombre = $this->nombre;
            $cliente->celular = $this->celular;
            $cliente->direccion_entrega = $this->direccionEntrega;
            $cliente->tipoDocumento = $this->tipoDoc;
            $cliente->numeroDocumento = $this->numDoc;
            $cliente->tipoCliente = $this->tipoCliente;
            $cliente->telefono = $this->telefono;
            $cliente->contacto = $this->contacto;
            $cliente->observaciones = $this->observaciones;
            $cliente->tipoBoleteria = $this->tipoBoleta;

            $cliente->save();

            $this->mensajeError = '';
            $this->mensajeSuccess = '';

            if($cliente->save()){
                $this->mensajeSuccess = 'Cliente Añadido Correctamente';
                $this->crear = 'false';
            }else{
                $this->mensajeError = 'Hubo Un Fallo Al Añadir El Cliente';
                $this->crear = 'false';
            }
        }else{
            $this->mensajeError = 'Los Campos Del * Son Obligatorios';
            $this->crear = 'false';
        }
    }

    public function borrar($id){
        $cliente = Clientes::find($id);
        $cliente->delete();

        if($cliente->delete()){
            $this->mensajeSuccess = 'Cliente Borrado Correctamente';
            $this->crear = 'false';
        }else{
            $this->mensajeError = 'Hubo Un Fallo Al Borrar El Cliente';
            $this->crear = 'false';
        }
    }

    public function editar($id){
        $this->clienteEdit = Clientes::find($id);
    }

    public function update($id){
        $cliente = Clientes::find($id);

        if(true){
            $cliente->nombre = $this->nombre;
            $cliente->celular = $this->celular;
            $cliente->direccion_entrega = $this->direccionEntrega;
            $cliente->telefono = $this->telefono;
            $cliente->contacto = $this->contacto;
            $cliente->observaciones = $this->observaciones;
            if(!empty($this->tipoBoleta)){
                $cliente->tipoBoleteria = $this->tipoBoleta;
            }

            $cliente->update();

            $this->mensajeError = '';
            $this->mensajeSuccess = '';

            if($cliente->update()){
                $this->mensajeSuccess = 'Cliente Actualizado Correctamente';
                $this->clienteEdit = '';
            }else{
                $this->mensajeError = 'Hubo Un Fallo Al Actualizar El Cliente';
                $this->clienteEdit = '';
            }
        }
    }
}
