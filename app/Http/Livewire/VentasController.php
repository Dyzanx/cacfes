<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ventas;
use App\Models\Clientes;
use App\Models\Categorias;
use App\Models\Pagos;
use App\Models\Observaciones;

class VentasController extends Component{
    public $factura;
    public $categoria;
    public $cliente;
    public $cantidad;
    public $precio;
    public $fecha;

    public $fechaPago;
    public $pagoCliente;
    public $tardanza;
    public $saldo;

    public $notaOb;

    public $crearOb = 'false';
    public $crear = 'false';
    public $crearPago = 'false';
    public $mensajeSuccess;
    public $mensajeError;


    public $ventaEdit = '';
    public $pagoEdit = '';
    public $obEdit = '';


    public $ventaDetalle = '';
    public $pagoDetalle = '';
    public $obDetalle = '';

    public function render(){
        return view('livewire.ventas', [
            'ventas' => Ventas::paginate(10),
            'clientes' => Clientes::get(),
            'pagos' => Pagos::get(),
            'categorias' => Categorias::get()
        ]);
    }

    public function crearPago(){
        $this->crearPago = 'true';
        $this->crear = 'false';
    }

    public function crearOb($factura){
        $this->ventaGen = Ventas::where('factura', '=', "$factura")->get();
        $this->crearOb = Observaciones::where('factura', '=', "$factura")->get();
    }

    public function crear(){
        $this->crear = 'true';
        $this->crearPago = 'false';
    }

    public function cancelar(){
        $this->crear = 'false';
        $this->ventaEdit = '';
        $this->obEdit = '';
        $this->pagoEdit = '';
        $this->ventaEdit = '';
        $this->crearPago = 'false';
        $this->crearOb = 'false';
        $this->ventaDetalle = '';
    }

    public function editar($factura){
        $ventaEdit = Ventas::where('factura', '=', "$factura");
        $pagoEdit = Pagos::where('factura', '=', "$factura");
        $obEdit = Observaciones::where('factura', '=', "$factura");
    }

    public function save(){
        if(!empty($this->factura && $this->categoria && $this->cliente && $this->cantidad && $this->precio
        && $this->fecha && $this->fechaPago && $this->pagoCliente && $this->tardanza && $this->saldo 
        && $this->notaOb)){
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
            $pago->tardanza = $this->tardanza;
            $pago->saldo = $this->saldo;

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
        $venta = Ventas::where('factura', '=', "$factura")->first();
        $pago = Pagos::where('factura', '=', "$factura")->first();
        $ob = Observaciones::where('factura', '=', "$factura")->first();

        $pago->delete();
        $ob->delete();
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

    public function cambiarOb($factura){
        $this->obEdit = Observaciones::where('factura', '=', "$factura")->first();
    }

    public function cambiarPago($factura){
        $this->pagoEdit = Pagos::where('factura', '=', "$factura")->first();
    }

}