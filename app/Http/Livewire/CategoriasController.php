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

    public function render(){
        return view('livewire.categorias', [
            'categorias' => Categorias::orderBy('id', 'desc')->paginate(200)
        ]);
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
                $this->mensajeSuccess = 'Categoria Añadida Correctamente';
                $this->crear = 'false';
                $this->nombre = '';
            }else{
                $this->mensajeError = 'Hubo Un Fallo Al Añadir La Categoria';
                $this->crear = 'false';
            }
        }else{
            $this->mensajeError = 'El Campo Del Nombre Es Obligatorio';
            $this->crear = 'false';
        } 
    }

    public function borrar($id){
        $cat = Categorias::find($id);
        $cat->delete();

        if($cat->delete()){
            $this->mensajeError = 'Hubo Un Fallo Al Borrar La Categoria';
            $this->crear = 'false';
        }else{
            $this->mensajeSuccess = 'Categoria Borrada Correctamente';
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
                $this->mensajeSuccess = 'Actualizado Correctamente';
                $this->categoriaEdit = '';
            }else{
                $this->mensajeError = 'Hubo Un Fallo Al Actualizarlo';
                $this->categoriaEdit = '';
            }
        }else{
            $this->mensajeError = 'Son Necesarios Cambios Para La Actualizacion';
            $this->categoriaEdit = '';
        }
    }

}
