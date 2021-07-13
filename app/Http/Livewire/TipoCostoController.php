<?php

namespace App\Http\Livewire;

use Livewire\Component;
use  App\Models\tipoCosto;

class TipoCostoController extends Component{
    public $nombre;

    public $crear = 'false';
    public $eliminar;
    public $mensajeSuccess;
    public $mensajeError;
    public $tipoCostoEdit = '';

    public function render(){
        return view('livewire.tipo-costo',[
            'tipoCostos' => tipoCosto::orderBy('id', 'desc')->paginate(200)
        ]);
    }

    public function hideMessage(){
        $this->mensajeError = null;
        $this->mensajeSuccess = null;
    }

    public function eliminar($factura){
        $this->eliminar = $factura;
    }

    public function crear(){
        $this->crear = 'true';
    }

    public function cancelar(){
        $this->crear = 'false';
        $this->tipoCostoEdit = '';
        $this->eliminar = null;
        $this->nombre = '';
    }

    public function save(){
        $tipoCosto = new tipoCosto();

        if(!empty($this->nombre)){
            $tipoCosto->nombre = $this->nombre;

            $tipoCosto->save();

            $this->mensajeError = '';
            $this->mensajeSuccess = '';

            if($tipoCosto->save()){
                $this->mensajeSuccess = 'Añadido correctamente';
                $this->crear = 'false';
                $this->nombre = '';
            }else{
                $this->mensajeError = 'Hubo un fallo al añadirlo';
                $this->crear = 'false';
            }
        }else{
            $this->mensajeError = 'El campo del nombre es obligatorio';
            $this->crear = 'false';
        } 
    }

    public function borrar($id){
        $tipoCosto = tipoCosto::find($id);
        $tipoCosto->delete();

        if($tipoCosto->delete()){
            $this->mensajeError = 'Hubo un fallo al borrarlo';
            $this->crear = 'false';
        }else{
            $this->mensajeSuccess = 'Borrado correctamente';
            $this->crear = 'false';
        }
    }

    public function editar($id){
        $this->tipoCostoEdit = tipoCosto::find($id);
    }

    public function update($id){
        if(!empty($this->nombre)){
            $tipoCosto = tipoCosto::find($id);

            $tipoCosto->nombre = $this->nombre;
            $tipoCosto->update();

            $this->mensajeError = '';
            $this->mensajeSuccess = '';

            if($tipoCosto->update()){
                $this->mensajeSuccess = 'Actualizado correctamente';
                $this->tipoCostoEdit = '';
            }else{
                $this->mensajeError = 'Hubo un fallo al actualizarlo';
                $this->tipoCostoEdit = '';
            }
        }else{
                $this->mensajeError = 'Son necesarioscCambios actuarlos';
                $this->tipoCostoEdit = '';
        }
    }
}
