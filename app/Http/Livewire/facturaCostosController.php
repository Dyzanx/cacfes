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
        if(!empty($this->fecha || $this->item || $this->categoria || $this->cliente || $this->cantidad || 
            $this->udMedida || $this->valUnitario || $this->descuento || $this->direccion || $this->proveedor
            || $this->descripcion || $this->observaciones)){

            $producto = Producto::find($id);

            if(!empty($this->fecha)){
                $producto->fecha = $this->fecha;
            }
            if(!empty($this->item)){
                $producto->item_id = $this->item;
            }
            if(!empty($this->categoria)){
                $producto->categoria_id = $this->categoria;
            }
            if(!empty($this->cliente)){
                $producto->cliente = $this->cliente;
            }
            if(!empty($this->cantidad)){
                $producto->cantidad = $this->cantidad;
            }
            if(!empty($this->udMedida)){
                $producto->unidad_medida = $this->udMedida;
            }
            if(!empty($this->valUnitario)){
                $producto->valor_unitario = $this->valUnitario;
            }
            if(!empty($this->descuento)){
                $producto->descuento = $this->descuento;
            }
            if(!empty($this->direccion)){
                $producto->direccion = $this->direccion;   
            }
            if(!empty($this->proveedor_id)){
                $producto->proveedor_id = $this->proveedor;
            }
            if(!empty($this->descripcion)){
                $producto->descripcion = $this->descripcion;
            }
            if(!empty($this->observaciones)){
                $producto->observacion = $this->observaciones;
            }
    
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
        }else{
            $this->mensajeError = 'Son Necesarios Cambios Para La Actualizacion';
            $this->productoEdit = '';
        }
    }
}
