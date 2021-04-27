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

    public function limpiarBusqueda(){
        $this->search = '';
        $this->perPage = 10;
    }

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

    public function crear(){
        $this->crear = 'true';
    }

    public function cancelar(){
        $this->crear = 'false';
        $this->clienteEdit = '';

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
                $this->mensajeSuccess = 'Cliente Añadido Correctamente';
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
            $this->mensajeError = 'Hubo Un Fallo Al Borrar El Cliente';
            $this->crear = 'false';
        }else{
            $this->mensajeSuccess = 'Cliente Borrado Correctamente';
            $this->crear = 'false';
            
        }
    }

    public function editar($id){
        $this->clienteEdit = Clientes::find($id);
    }

    public function update($id){
        if(!empty($this->nombre || $this->celular || $this->direccionEntrega || $this->telefono ||
            $this->contacto || $this->observaciones || $this->tipoBoleta)){
            $cliente = Clientes::find($id);

            if(!empty($this->nombre)){
                $cliente->nombre = $this->nombre;
            }
            if(!empty($this->celular)){
                $cliente->celular = $this->celular;
            }
            if(!empty($this->direccionEntrega)){
                $cliente->direccion_entrega = $this->direccionEntrega;
            }
            if(!empty($this->telefono)){
                $cliente->telefono = $this->telefono;
            }
            if(!empty($this->contacto)){
                $cliente->contacto = $this->contacto;
            }
            if(!empty($this->observaciones)){
                $cliente->observaciones = $this->observaciones;
            }
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
        }else{
            $this->mensajeError = 'Son Necesarios Cambios Para La Actualizacion';
            $this->clienteEdit = '';
        }
    }
}
