<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Clientes;

class ClientesController extends Component{
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];
    public $search;
    public $perPage = 10;

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
    public $eliminar;

    public function render(){
        return view('livewire.clientes', [
            'clientes' => Clientes::
            where('nombre', 'LIKE', "%{$this->search}%")
            ->orWhere('celular', 'LIKE', "%{$this->search}%")
            ->orWhere('numeroDocumento', 'LIKE', "%{$this->search}%")
            ->orWhere('direccion_entrega', 'LIKE', "%{$this->search}%")
            ->orWhere('telefono', 'LIKE', "%{$this->search}%")->paginate($this->perPage),
        ]);
    }

    public function hideMessage(){
        $this->mensajeError = null;
        $this->mensajeSuccess = null;
    }

    public function eliminar($factura){
        $this->eliminar = $factura;
    }

    public function limpiarBusqueda(){
        $this->search = '';
        $this->perPage = 10;
    }

    public function crear(){
        $this->crear = 'true';
    }

    public function cancelar(){
        $this->crear = 'false';
        $this->clienteEdit = '';
        $this->eliminar = null;

        $this->nombre = '';
        $this->celular = '';
        $this->direccionEntrega = '';
        $this->tipoDoc = '';
        $this->numDoc = '';
        $this->tipoCliente = '';
        $this->telefono = '';
        $this->contacto = '';
        $this->observaciones = '';
        $this->tipoBoleta = '';
    }

    public function save(){
        $cliente = new Clientes();

        if(!empty($this->nombre && $this->tipoCliente && $this->celular && $this->direccionEntrega)){
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
                $this->mensajeSuccess = 'Cliente añadido correctamente';
                $this->crear = 'false';

                $this->nombre = '';
                $this->celular = '';
                $this->direccionEntrega = '';
                $this->tipoDoc = '';
                $this->numDoc = '';
                $this->tipoCliente = '';
                $this->telefono = '';
                $this->contacto = '';
                $this->observaciones = '';
                $this->tipoBoleta = '';

            }else{
                $this->mensajeError = 'Hubo un fallo al añadir el cliente';
                $this->crear = 'false';
            }
        }else{
            $this->mensajeError = 'Los campos del * son obligatorios';
            $this->crear = 'false';
        }
    }

    public function borrar($id){
        $cliente = Clientes::find($id);
        $cliente->delete();

        if($cliente->delete()){
            $this->mensajeError = 'Hubo un fallo al borrar el cliente';
            $this->crear = 'false';
            $this->eliminar = null;
        }else{
            $this->mensajeSuccess = 'Cliente borrado correctamente';
            $this->crear = 'false';
            $this->eliminar = null;
            
        }
    }

    public function editar($id){
        $this->clienteEdit = Clientes::find($id);
    }

    public function update($id){
        if(!empty($this->nombre || $this->celular || $this->direccionEntrega || $this->telefono ||
            $this->contacto || $this->observaciones || $this->tipoBoleta)){
            $cliente = Clientes::find($id);

            $cliente->nombre = $this->nombre != '' ? $this->nombre : $cliente->nombre;
            $cliente->celular = $this->celular != '' ? $this->celular : $cliente->celular;
            $cliente->direccion_entrega = $this->direccionEntrega != '' ? $this->direccionEntrega : $cliente->direccion_entrega;
            $cliente->telefono = $this->telefono != '' ? $this->telefono : $cliente->telefono;
            $cliente->contacto = $this->contacto != '' ? $this->contacto : $cliente->contacto;
            $cliente->observaciones = $this->observaciones != '' ? $this->observaciones : $cliente->observaciones;
            $cliente->tipoBoleteria = $this->tipoBoleta != '' ? $this->tipoBoleta : $cliente->tipoBoleteria;

            $cliente->update();

            $this->mensajeError = '';
            $this->mensajeSuccess = '';

            if($cliente->update()){
                $this->mensajeSuccess = 'Cliente actualizado correctamente';
                $this->clienteEdit = '';
            }else{
                $this->mensajeError = 'Hubo un fallo al actualizar el cliente';
                $this->clienteEdit = '';
            }
        }else{
            $this->mensajeError = 'Son necesarios cambios para la actualizacion';
            $this->clienteEdit = '';
        }
    }
}
