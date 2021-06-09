<?php

namespace App\Http\Livewire;

use Livewire\Component;
use  App\Models\tipoCosto;

class TipoCostoController extends Component{
    public $nombre;

    public $crear = 'false';
    public $mensajeSuccess;
    public $mensajeError;
    public $tipoCostoEdit = '';

    public function render(){
        return view('livewire.tipo-costo',[
            'tipoCostos' => tipoCosto::orderBy('id', 'desc')->paginate(200)
        ]);
    }

    public function crear(){
        $this->crear = 'true';
    }

    public function cancelar(){
        $this->crear = 'false';
        $this->tipoCostoEdit = '';
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
                $this->mensajeSuccess = 'Añadido Correctamente';
                $this->crear = 'false';
                $this->nombre = '';
            }else{
                $this->mensajeError = 'Hubo Un Fallo Al Añadirlo';
                $this->crear = 'false';
            }
        }else{
            $this->mensajeError = 'El Campo Del Nombre Es Obligatorio';
            $this->crear = 'false';
        } 
    }

    public function borrar($id){
        $tipoCosto = tipoCosto::find($id);
        $tipoCosto->delete();

        if($tipoCosto->delete()){
            $this->mensajeError = 'Hubo Un Fallo Al Borrarlo';
            $this->crear = 'false';
        }else{
            $this->mensajeSuccess = 'Borrado Correctamente';
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
                $this->mensajeSuccess = 'Actualizado Correctamente';
                $this->tipoCostoEdit = '';
            }else{
                $this->mensajeError = 'Hubo Un Fallo Al Actualizarlo';
                $this->tipoCostoEdit = '';
            }
        }else{
                $this->mensajeError = 'Son Necesarios Cambios Actuarlos';
                $this->tipoCostoEdit = '';
        }
    }
}
