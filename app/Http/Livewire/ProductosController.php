<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\tipoCosto;
use App\Models\Categorias;
use App\Models\Clientes;

class ProductosController extends Component{
    public $search;

    public $item;
    public $categoria;
    public $cliente;
    public $cantidad;
    public $fecha;
    public $udMedida;
    public $valUnitario;
    public $descuento;
    public $direccion;
    public $proveedor;
    public $descripcion;
    public $observaciones;

    public $crear = 'false';
    public $mensajeSuccess;
    public $mensajeError;

    public $productoEdit = '';
    public $pEditItem = '';
    public $pEditCat = '';
    public $pEditProv = '';

    public function render(){
        return view('livewire.productos',[
            'productos' => Producto::orderBy('id', 'desc')
            ->where('direccion', 'LIKE', "%{$this->search}%")
            ->orWhere('id', 'LIKE', "%{$this->search}%")
            ->orWhere('cantidad', 'LIKE', "%{$this->search}%")
            ->orWhere('valor_unitario', 'LIKE', "%{$this->search}%")
            ->orWhere('descuento', 'LIKE', "%{$this->search}%")->paginate(30),

            'items' => tipoCosto::orderBy('id', 'desc')->get(),
            'categorias' => Categorias::orderBy('id', 'desc')->get(),
            'proveedores' => Clientes::where('tipoCliente', '=', 'proveedor')->get(),
            'clientes' => Clientes::where('tipoCliente', '=', 'cliente')->get()
        ]);
    }

    public function crear(){
        $this->crear = 'true';
    }

    public function cancelar(){
        $this->crear = 'false';
        $this->productoEdit = '';
    }

    public function editar($id){
        $this->productoEdit = Producto::find($id);
        $this->pEditItem = tipoCosto::find($this->productoEdit->item_id);
        $this->pEditCat = Categorias::find($this->productoEdit->categoria_id);
        $this->pEditProv = Clientes::find($this->productoEdit->proveedor_id);
    }

    public function save(){
        $producto = new Producto();

        if(!empty($this->item && $this->categoria && $this->proveedor && $this->cantidad 
        && $this->valUnitario && $this->fecha && $this->cliente && $this->direccion)){

            $producto->fecha = $this->fecha;
            $producto->item_id = $this->item;
            $producto->categoria_id = $this->categoria;
            $producto->cliente = $this->cliente;
            $producto->cantidad = $this->cantidad;
            $producto->unidad_medida = $this->udMedida;
            $producto->valor_unitario = $this->valUnitario;
            $producto->descuento = $this->descuento;
            $producto->direccion = $this->direccion;
            $producto->proveedor_id = $this->proveedor;
            $producto->descripcion = $this->descripcion;
            $producto->observacion = $this->observaciones;

            $producto->save();

            $this->mensajeError = '';
            $this->mensajeSuccess = '';

            if($producto->save()){
                $this->mensajeSuccess = 'Producto Añadido Correctamente';
                $this->crear = 'false';
            }else{
                $this->mensajeError = 'Hubo Un Fallo Al Crear El Producto';
                $this->crear = 'false';
            }
        }else{
            $this->mensajeError = 'Los Campos Del * Son Obligatorios';
            $this->crear = 'false';
        }
    }

    public function borrar($id){
        $producto = Producto::find($id);
        $producto->delete();

        if($producto->delete()){
            $this->mensajeError = 'Hubo Un Fallo Al Borrar El Producto';
        }else{
            $this->mensajeSuccess = 'Producto Borrado Correctamente';
        }
    }

    public function update($id){
        $producto = Producto::find($id);

            $producto->fecha = $this->fecha;
            $producto->item_id = $this->item;
            $producto->categoria_id = $this->categoria;
            $producto->cliente = $this->cliente;
            $producto->cantidad = $this->cantidad;
            $producto->unidad_medida = $this->udMedida;
            $producto->valor_unitario = $this->valUnitario;
            $producto->descuento = $this->descuento;
            $producto->direccion = $this->direccion;
            $producto->proveedor_id = $this->proveedor;
            $producto->descripcion = $this->descripcion;
            $producto->observacion = $this->observaciones;

            $producto->update();

            $this->mensajeError = '';
            $this->mensajeSuccess = '';

            if($producto->update()){
                $this->mensajeSuccess = 'Producto Actualizado Correctamente';
                $this->productoEdit = '';
            }else{
                $this->mensajeError = 'Hubo Un Fallo Al Actualizar El Producto';
                $this->productoEdit = '';
            }
    }
}
