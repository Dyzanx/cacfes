<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tallas;

class TallasController extends Component{
    public $nombre;

    public $crear = 'false';
    public $tallaEdit;
    public $mensajeSuccess;
    public $mensajeError;
    public $eliminar;

    public function render(){
        return view('livewire.tallas', [
            'tallas' => Tallas::orderBy('id', 'desc')->get()
        ]);
    }

    public function hideMessage(){
        $this->mensajeError = null;
        $this->mensajeSuccess = null;
    }

    public function eliminar($factura){
        $this->eliminar = $factura;
    }

    public function update($id){
        $this->mensajeError = null;
        $this->mensajeSuccess = null;

        if(!empty($this->nombre)){
            $ta = Tallas::find($id);
            $ta->nombre = $this->nombre;
            $ta->update();

            if($ta->update()){
                $this->mensajeSuccess = 'Talla actualizada correctamente';
                $this->tallaEdit = null;
            }else{
                $this->mensajeError = 'Hubo un error al actualizar la talla';
                $this->tallaEdit = null;
            }
        }else{
            $this->mensajeError = 'El nombre es necesario para cambiarlo';
            $this->tallaEdit = null;
        }
    }

    public function editar($id){
        $this->tallaEdit = Tallas::find($id);
    }

    public function borrar($id){
        $ta = Tallas::find($id);
        $ta->delete();

        if($ta->delete()){
            $this->mensajeError = 'Hubo un error al eliminarla';
            $this->eliminar = null;
        }else{
            $this->mensajeSuccess = 'Talla eliminada correctamente';
            $this->eliminar = null;
        }
    }

    public function save(){
        if(!empty($this->nombre)){
            $ta = new Tallas();

            $ta->nombre = $this->nombre;

            $ta->save();

            if($ta->save()){
                $this->mensajeSuccess = 'talla agregada correctamente';
                $this->crear = null;
            }else{
                $this->mensajeError = 'hubo un fallo al agregar la talla';
                $this->crear = null;
            }
        }else{
            $this->mensajeError = 'El nombre es obligatorio para agregala';
            $this->crear = null;
        }
    }

    public function crear(){
        $this->crear = 'true';
    }

    public function cancelar(){
        $this->crear = null;
        $this->nombre = null;
        $this->tallaEdit = null;
        $this->eliminar = null;
    }
}
