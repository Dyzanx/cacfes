<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Diseños;
use App\Models\Tallas;
use App\Models\WelcomeDiseños;

class Welcome extends Component{
    public $para;
    public $crear;
    public $agregarPancarta;
    public $detalles;
    public $mensajeSuccess;
    public $mensajeError;
    public $editar;
    public $ventana = 'true';

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
            'tallas' => Tallas::orderBy('id', 'desc')->get(),
            'elementosCarrusel' => WelcomeDiseños::where('diseño_para', '=', 'carrusel')->orderBy('id', 'desc')->paginate(3),
            'elemento' => WelcomeDiseños::where('diseño_para', '=', 'cartelera')->orderBy('id', 'desc')->paginate(1),
        ]);
    }

    public function cerrarVentana(){
        $this->ventana = null;
    }

    public function saveWelcome(){
        if(!empty($this->image_path && $this->para)){
            $we = new WelcomeDiseños();

            $we->image_path = $this->image_path;
            $we->diseño_para = $this->para;

            $we->save();

            if($we->save()){
                $this->mensajeSuccess = 'Agregado correctamente';
                $this->agregarPancarta = null;
            }else{
                $this->mensajeError = 'Hubo un error al completar la acción';
                $this->agregarPancarta = null;
            }
        }else{
            $this->mensajeError = 'Los dos datos son obligatorios para agregar al contenido';
            $this->agregarPancarta = null;
        }
    }

    public function agregarPancarta(){
        $this->agregarPancarta = 'true';
    }

    public function hideMessage(){
        $this->mensajeError = null;
        $this->mensajeSuccess = null;
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
                $this->mensajeSuccess = 'Diseño actualizado correctamente';
                $this->editar = null;
            }else{
                $this->mensajeError = 'Hubo un error al actualizar el diseño';
                $this->editar = null;
            }
        }else{
            $this->mensajeError = 'Son necesarios cambios para actualizarlos';
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

    public function handleFileUpload($imageData){
        $this->image_path = $imageData;
        return $imageData;
    }

    public function save(){
        $this->mensajeError = null;
        $this->mensajeSuccess = null;

        if(!empty($this->nombre && $this->stock && $this->precio && $this->talla && $this->descripcion && $this->image_path)){
            if($this->stock > 0 && $this->precio > 0){
                $dis = new Diseños();

                $dis->nombre = $this->nombre;
                $dis->stock = $this->stock;
                $dis->precio = $this->precio;
                $dis->talla = $this->talla;
                $dis->descripcion = $this->descripcion;
                $dis->image_path = $this->image_path;
    
                $dis->save();
    
                if($dis->save()){
                    $this->mensajeSuccess = 'Diseño añadido correctamente';
                    $this->crear = null;
                }else{
                    $this->mensajeError = 'Hubo un fallo al guardar el diseño';
                    $this->crear = null;
                }
            }else{
                $this->mensajeError = 'Los numeros no pueden ser negativos ni 0';
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

    public function agregarDiseño(){
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
        $this->agregarPancarta = null;

        $this->nombre = null;
        $this->stock = null;
        $this->precio = null;
        $this->talla = null;
        $this->descripcion = null;
        $this->image_path = null;
    }

}