<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ventas;
use App\Models\Clientes;
use App\Models\Categorias;
use App\Models\Pagos;
use App\Models\Observaciones;
use App\Models\Generales;

class VentasController extends Component{
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];
    public $perPage = 10;
    public $search;

    public $factura;

    public $categoria;
    public $cliente;
    public $cantidad;
    public $precio;
    public $fecha;

    public $tempFechaVenta;
    public $tempFechaPago;

    public $fechaPago;
    public $pagoCliente;
    public $notaOb;

    public $crear = 'false';
    public $mensajeSuccess;
    public $mensajeError;

    public $ventaDetalle = '';
    public $pagoDetalle = '';
    public $obDetalle = '';

    public $notaDetalle;

    public $ventaEdit = '';
    public $pagoEdit = '';
    public $obEdit = '';

    public function render(){
        return view('livewire.ventas', [
            'ventas' => Ventas::where('factura', 'LIKE', "%{$this->search}%")->paginate($this->perPage),
            'pagos' => Pagos::where('factura', 'LIKE', "%{$this->search}%")->paginate($this->perPage),
            'clientes' => Clientes::get(),
            'categorias' => Categorias::get(),
            'general' => Generales::first()
        ]);
    }

    public function crear(){
        $this->crear = 'true';
        $this->ventaDetalle = '';
    }

    public function editar($factura){
        $ventaEdit = Ventas::where('factura', '=', $factura);
        $pagoEdit = Pagos::where('factura', '=', $factura);
        $obEdit = Observaciones::where('factura', '=', $factura);
    }

    public function save(){
        if(!empty($this->factura && $this->categoria && $this->cliente && $this->cantidad && $this->precio
        && $this->fecha && $this->fechaPago && $this->pagoCliente)){
            $venta = new Ventas();
            $ob = new Observaciones();
            $pago = new Pagos();

            $venta->factura = $this->factura;
            $venta->cliente_id = $this->cliente;
            $venta->categoria_id = $this->categoria;
            $venta->cantidad = $this->cantidad;
            $venta->precio = $this->precio;
            $venta->fecha_venta = $this->fecha;

            $pago->factura = $this->factura;
            $pago->fecha_pago = $this->fechaPago;
            $pago->pago_cliente = $this->pagoCliente;

            $ob->factura = $this->factura;
            $ob->nota = $this->notaOb;
            
            $venta->save();
            $ob->save();
            $pago->save();

            $this->mensajeError = '';
            $this->mensajeSuccess = '';

            if($venta->save() && $ob->save() && $pago->save()){
                $this->mensajeSuccess = 'Venta Añadida Correctamente';
                $this->crear = 'false';
                $this->factura = '';
                $this->cliente = '';
                $this->categoria = '';
                $this->cantidad = '';
                $this->precio = '';
                $this->fecha = '';

                $this->factura = '';
                $this->fechaPago = '';
                $this->pagoCliente = '';
                $this->tardanza = '';
                $this->saldo = '';

                $this->factura = '';
                $this->notaOb = '';
            }else{
                $this->mensajeError = 'Hubo Un Error Al Añadir La Venta';
                $this->crear = 'false';
            }
        }else{
            $this->mensajeError = 'Los Campos Del * Son Obligatorios';
            $this->crear = 'false';
        } 
    }

    public function borrar($factura){
        $venta = Ventas::where('factura', '=', "$factura");
        $pago = Pagos::where('factura', '=', "$factura");
        $ob = Observaciones::where('factura', '=', "$factura");

        $ob->delete();
        $pago->delete();
        $venta->delete();

        if($venta->delete() && $ob->delete() && $pago->delete()){
            $this->mensajeError = 'Hubo Un Error Al Borrar La Venta';
            $this->crear = 'false';
        }else{
            $this->mensajeSuccess = 'Venta Borrada Correctamente';
            $this->crear = 'false';
        }
    }

    public function detalles($factura){
        $this->ventaDetalle = Ventas::where('factura', '=', "$factura")->first();
        $this->pagoDetalle = Pagos::where('factura', '=', "$factura")->first();
        $this->obDetalle = Observaciones::where('factura', '=', "$factura")->first();
    }

    public function detallesNota($factura){
        $this->obDetalle = Observaciones::where('factura', '=', "$factura")->first();
    }

    public function saveDetalleNota($factura){
        if(!empty($this->notaDetalle)){
            $ob = Observaciones::where('factura', '=', "$factura")->get();

            $ob->nota = $this->notaDetalle;
        //     $ob->update();

        //     if($ob->update()){
        //         $this->mensajeSuccess = 'Observacion Actualizada Correctamente';
        //         $this->obDetalle = '';
        //         $this->notaDetalle = '';
        //     }else{
        //         $this->mensajeError = 'Hubo Un Error Al Actualizar La Observacion';
        //         $this->notaDetalle = '';
        //         $this->obDetalle = '';
        //     }
        // }else{
        //     $this->mensajeError = 'Es Necesario Una Nueva Nota Para Relizar La Actalización';
        //     $this->obDetalle = '';
        } 

        return var_dump($factura);
    }

    public function cancelar(){
        $this->crear = 'false';
        $this->ventaEdit = '';
        $this->obEdit = '';
        $this->ventaEdit = '';
        $this->ventaDetalle = '';
        $this->pagoDetalle = '';
        $this->obDetalle = '';

        $this->factura = '';
        $this->cliente = '';
        $this->categoria = '';
        $this->cantidad = '';
        $this->precio = '';
        $this->fecha = '';

        $this->fechaPago = '';
        $this->pagoCliente = '';
        $this->tardanza = '';
        $this->saldo = '';

        $this->notaOb = '';
    }

    public function limpiarBusqueda(){
        $this->search = '';
        $this->perPage = 10;
    }

    public function cancelarDetalles(){
        $this->ventaDetalle = '';
        $this->pagoDetalle = '';
        $this->obDetalle = '';
        $this->notaDetalle = '';
    }

}