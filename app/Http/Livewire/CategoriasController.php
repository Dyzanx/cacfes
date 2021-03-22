<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categorias;

class CategoriasController extends Component{
    public $nombre;

    public $crear = 'false';
    public $mensajeSuccess;
    public $mensajeError;
    public $categoriaEdit = '';

    public function render(){
        return view('livewire.categorias', [
            'categorias' => Categorias::orderBy('id', 'desc')->paginate(20)
        ]);
    }

    public function crear(){
        $this->crear = 'true';
    }

    public function cancelar(){
        $this->crear = 'false';
        $this->categoriaEdit = '';
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
        $cat = Categorias::find($id);

        if(true){
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
        }
    }

}
