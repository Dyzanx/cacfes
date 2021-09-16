<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\tipoCosto;
use App\Models\Categorias;
use App\Models\Clientes;

class facturaCostosController extends Component{
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];
    
    public $search;
    public $perPage = 10;

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
    public $eliminar;
    public $productoEdit = '';
    public $pEditItem = '';
    public $pEditCat = '';
    public $pEditProv = '';

    public function limpiarBusqueda(){
        $this->search = '';
        $this->perPage = 10;
    }

    public function render(){
        return view('livewire.facturaCostos',[
            'productos' => Producto::orderBy('id', 'desc')
            ->where('direccion', 'LIKE', "%{$this->search}%")
            ->orWhere('cantidad', 'LIKE', "%{$this->search}%")
            ->orWhere('valor_unitario', 'LIKE', "%{$this->search}%")->paginate($this->perPage),

            'items' => tipoCosto::orderBy('id', 'desc')->get(),
            'similarItems' => tipoCosto::where('nombre', 'LIKE', "{$this->item}"),
            'categorias' => Categorias::orderBy('id', 'desc')->get(),
            'proveedores' => Clientes::where('tipoCliente', '=', 'proveedor')->get(),
            'clientes' => Clientes::where('tipoCliente', '=', 'cliente')->get()
        ]);
    }

    public function hideMessage(){
        $this->mensajeError = null;
        $this->mensajeSuccess = null;
    }

    public function eliminar($id){
        $this->eliminar = $id;
    }

    public function crear(){
        $this->crear = 'true';
    }

    public function limpiar(){
        $this->fecha = '';
        $this->item = '';
        $this->categoria = '';
        $this->cliente = '';
        $this->cantidad = '';
        $this->udMedida = '';
        $this->valUnitario = '';
        $this->descuento = '';
        $this->direccion = '';
        $this->proveedor = '';
        $this->descripcion = '';
        $this->observaciones = '';
    }

    public function cancelar(){
        $this->crear = 'false';
        $this->productoEdit = '';
        $this->eliminar = null;

        $this->fecha = '';
        $this->item = '';
        $this->categoria = '';
        $this->cliente = '';
        $this->cantidad = '';
        $this->udMedida = '';
        $this->valUnitario = '';
        $this->descuento = '';
        $this->direccion = '';
        $this->proveedor = '';
        $this->descripcion = '';
        $this->observaciones = '';
    }

    public function editar($id){
        $this->productoEdit = Producto::find($id);
        $this->pEditItem = tipoCosto::find($this->productoEdit->item_id);
        $this->pEditCat = Categorias::find($this->productoEdit->categoria_id);
        $this->pEditProv = Clientes::find($this->productoEdit->proveedor_id);
    }

    public function save(){
        if(!empty($this->item && $this->categoria && $this->proveedor && $this->cantidad 
        && $this->valUnitario && $this->fecha && $this->cliente && $this->direccion)){

            if($this->cantidad > 0 && $this->valUnitario > 0){
                $producto = new Producto();
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
                    $this->mensajeSuccess = 'Producto añadido correctamente';
                    $this->crear = 'false';
    
                    $this->fecha = '';
                    $this->item = '';
                    $this->categoria = '';
                    $this->cliente = '';
                    $this->cantidad = '';
                    $this->udMedida = '';
                    $this->valUnitario = '';
                    $this->descuento = '';
                    $this->direccion = '';
                    $this->proveedor = '';
                    $this->descripcion = '';
                    $this->observaciones = '';
                }else{
                    $this->mensajeError = 'Hubo un fallo al crear el producto';
                    $this->crear = 'false';
                }
            }else{
                $this->mensajeError = 'los numeros no pueden ser negativos ni 0';
                $this->crear = 'false';
            }
        }else{
            $this->mensajeError = 'Los campos del * son obligatorios';
            $this->crear = 'false';
        }
    }

    public function borrar($id){
        $producto = Producto::find($id);
        $producto->delete();

        if($producto->delete()){
            $this->mensajeError = 'Hubo un fallo al borrar el producto';
            $this->eliminar = null;
        }else{
            $this->mensajeSuccess = 'Producto borrado correctamente';
            $this->eliminar = null;
        }
    }

    public function update($id){
        if(!empty($this->fecha || $this->item || $this->categoria || $this->cliente || $this->cantidad || 
            $this->udMedida || $this->valUnitario || $this->descuento || $this->direccion || $this->proveedor
            || $this->descripcion || $this->observaciones)){

            $producto = Producto::find($id);

            $producto->fecha = $this->fecha != '' ? $this->fecha : $producto->fecha;
            $producto->item_id = $this->item != '' ? $this->item : $producto->item_id;
            $producto->categoria_id = $this->categoria != '' ? $this->categoria : $producto->categoria_id;
            $producto->fecha = $cliente->cliente != '' ? $this->cliente : $producto->cliente;
            $producto->cantidad = $this->cantidad != '' ? $this->cantidad : $producto->cantidad;
            $producto->unidad_medida = $this->udMedida != '' ? $this->udMedida : $producto->unidad_medida;
            $producto->valor_unitario = $this->valUnitario != '' ? $this->valUnitario : $producto->valor_unitario;
            $producto->descuento = $this->descuento != '' ? $this->descuento : $producto->descuento;
            $producto->direccion = $this->direccion != '' ? $this->direccion : $producto->direccion;
            $producto->proveedor_id = $this->proveedor != '' ? $this->proveedor : $producto->proveedor_id;
            $producto->descripcion = $this->descripcion != '' ? $this->descripcion : $producto->descripcion;
            $producto->observacion = $this->observaciones != '' ? $this->observaciones : $producto->observacion;
    
            $producto->update();
    
            $this->mensajeError = '';
            $this->mensajeSuccess = '';
    
            if($producto->update()){
                $this->mensajeSuccess = 'Producto actualizado correctamente';
                $this->productoEdit = '';
            }else{
                $this->mensajeError = 'Hubo un fallo al actualizar el producto';
                $this->productoEdit = '';
            }
        }else{
            $this->mensajeError = 'Son necesarios cambios para la actualizacion';
            $this->productoEdit = '';
        }
    }
}
