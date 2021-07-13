<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categorias;
use App\Models\Ventas;

class CategoriasController extends Component{
    public $nombre;
    public $coste;
    public $costeCatId;

    public $crear = 'false';
    public $mensajeSuccess;
    public $mensajeError;
    public $categoriaEdit = '';
    public $eliminar;

    public function render(){
        return view('livewire.categorias', [
            'categorias' => Categorias::orderBy('id', 'desc')->paginate(200)
        ]);
    }

    public function hideMessage(){
        $this->mensajeError = null;
        $this->mensajeSuccess = null;
    }

    public function eliminar($factura){
        $this->eliminar = $factura;
    }

    public function coste($id){
        $this->costeCatId = $id;
        $this->coste = Ventas::where('categoria_id', '=', $id)->orderBy('categoria_id', 'desc')->get();
    }

    public function cancelarCoste(){
        $this->coste = null;
        $this->costeCatId = null;
    }

    public function crear(){
        $this->crear = 'true';
    }

    public function cancelar(){
        $this->crear = 'false';
        $this->categoriaEdit = '';
        $this->nombre = '';
    }

    public function save(){
        $categoria = new Categorias();

        if(!empty($this->nombre)){
            $categoria->nombre = $this->nombre;

            $categoria->save();

            $this->mensajeError = '';
            $this->mensajeSuccess = '';

            if($categoria->save()){
                $this->mensajeSuccess = 'Categoria añadida correctamente';
                $this->crear = 'false';
                $this->nombre = '';
            }else{
                $this->mensajeError = 'Hubo un fallo al añadir la categoria';
                $this->crear = 'false';
            }
        }else{
            $this->mensajeError = 'El campo del nombre es obligatorio';
            $this->crear = 'false';
        } 
    }

    public function borrar($id){
        $cat = Categorias::find($id);
        $cat->delete();

        if($cat->delete()){
            $this->mensajeError = 'Hubo un fallo al borrar la categoria';
            $this->crear = 'false';
        }else{
            $this->mensajeSuccess = 'Categoria borrada correctamente';
            $this->crear = 'false';
        }
    }

    public function editar($id){
        $this->categoriaEdit = Categorias::find($id);
    }

    public function update($id){
        if(!empty($this->nombre)){
            $cat = Categorias::find($id);

            $cat->nombre = $this->nombre;
            $cat->update();

            $this->mensajeError = '';
            $this->mensajeSuccess = '';

            if($cat->update()){
                $this->mensajeSuccess = 'Actualizado correctamente';
                $this->categoriaEdit = '';
            }else{
                $this->mensajeError = 'Hubo un fallo al actualizarlo';
                $this->categoriaEdit = '';
            }
        }else{
            $this->mensajeError = 'Son necesarios cambios para la actualizacion';
            $this->categoriaEdit = '';
        }
    }

}
