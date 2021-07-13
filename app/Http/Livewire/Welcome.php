<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Diseños;
use App\Models\Tallas;

class Welcome extends Component{
    public $crear;
    public $detalles;
    public $mensajeSuccess;
    public $mensajeError;
    public $editar;

    public $nombre;
    public $stock;
    public $precio;
    public $talla;
    public $descripcion;
    public $image_path;

    protected $listeners = ['fileUpload' => 'handleFileUpload'];

    public function render(){
        return view('welcome', [
            'diseños' => Diseños::orderBy('id', 'desc')->paginate(20),
            'tallas' => Tallas::orderBy('id', 'desc')->get()
        ]);
    }

    public function borrar($id){
        $di = Diseños::find($id);
        $di->delete();
        
        if($di->delete()){
            $this->mensajeError = 'Hubo Un Error Al Borrar El Diseño';
            $this->detalles = null;
        }else{
            $this->mensajeSuccess = 'Diseño Eliminado Correctamente';
            $this->detalles = null;
        }
    }

    public function update($id){
        $this->mensajeError = null;
        $this->mensajeSuccess = null;

        if(!empty($this->nombre || $this->stock || $this->precio || $this->talla  || $this->descripcion  || $this->image_path)){
            $di = Diseños::find($id);

            if(!empty($this->nombre)){
                $di->nombre = $this->nombre;
            }
            if(!empty($this->stock)){
                $di->stock = $this->stock;
            }
            if(!empty($this->precio)){
                $di->precio = $this->precio;
            }
            if(!empty($this->talla)){
                $di->talla = $this->talla;
            }
            if(!empty($this->descripcion)){
                $di->descripcion = $this->descripcion;
            }
            if(!empty($this->image_path)){
                $di->image_path = $this->image_path;
            }

            $di->update();

            if($di->update()){
                $this->mensajeSuccess = 'Diseño Actualizado Correctamente';
                $this->editar = null;
            }else{
                $this->mensajeError = 'Hubo Un Error Al Actualizar El Diseño';
                $this->editar = null;
            }
        }else{
            $this->mensajeError = 'Son Necesarios Cambios Para Actualizarlos';
             
            $this->editar = null;
            $this->nombre = null;
            $this->stock = null;
            $this->precio = null;
            $this->talla = null;
            $this->descripcion = null;
            $this->image_path = null;
        }
    }

    public function editar($id){
        $this->nombre = null;
        $this->stock = null;
        $this->precio = null;
        $this->talla = null;
        $this->descripcion = null;
        $this->image_path = null;
        $this->detalles = null;
        $this->editar = Diseños::find($id);
    }

    public function detallesM($id){
        $this->detalles = Diseños::find($id);
    }
    public function hola(){
        $this->detalles = "hola";
    }

    public function handleFileUpload($imageData){
        $this->image_path = $imageData;
        return $imageData;
    }

    public function save(){
        $this->mensajeError = null;
        $this->mensajeSuccess = null;

        if(!empty($this->nombre && $this->stock && $this->precio && $this->talla && $this->descripcion && $this->image_path)){
            $dis = new Diseños();

            $dis->nombre = $this->nombre;
            $dis->stock = $this->stock;
            $dis->precio = $this->precio;
            $dis->talla = $this->talla;
            $dis->descripcion = $this->descripcion;
            $dis->image_path = $this->image_path;

            $dis->save();

            if($dis->save()){
                $this->mensajeSuccess = 'Diseño Añadido Correctamente';
                $this->crear = null;
            }else{
                $this->mensajeError = 'Hubo Un Fallo Al Guardar El Diseño';
                $this->crear = null;
            }
        }else{
            $this->mensajeError = 'Los campos del * son obligatorios';
            $this->crear = null;
        }
    }

    public function limpiarCampos(){
        $this->nombre = '';
        $this->stock = '';
        $this->precio = '';
        $this->talla = '';
        $this->descripcion = '';
    }

    public function crear(){
        $this->crear = 'true';
    }

    public function borrarImagen(){
        $this->image_path = null;
    }

    public function cancelar(){
        $this->editar = null;
        $this->mensajeError = null;
        $this->mensajeSuccess = null;
        $this->crear = null;
        $this->detalles = null;

        $this->nombre = null;
        $this->stock = null;
        $this->precio = null;
        $this->talla = null;
        $this->descripcion = null;
        $this->image_path = null;
    }

}