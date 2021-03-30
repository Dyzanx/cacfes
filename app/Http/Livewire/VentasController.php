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

    public $ventaGen;

    public $facturaPago;
    public $fechaPago;
    public $pagoCliente;
    public $tardanza;
    public $saldo;

    public $facturaOb;
    public $notaOb;

    public $crearOb = 'false';
    public $crear = 'false';
    public $crearPago = 'false';
    public $mensajeSuccess;
    public $mensajeError;
    public $ventaEdit = '';
    public $ventaDetalle = '';
    public $pagoDetalle = '';
    public $obDetalle = '';

    public function render(){
        return view('livewire.ventas', [
            'ventas' => Ventas::paginate(10),
            'clientes' => Clientes::orderBy('id', 'desc')->get(),
            'pagos' => Pagos::orderBy('factura', 'desc')->get(),
            'categorias' => Categorias::orderBy('id', 'desc')->get()
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
        $this->crearPago = 'false';
        $this->crearOb = 'false';
    }

    public function saveOb(){
        if(!empty($this->facturaOb && $this->notaOb)){
            $ob = new Observaciones();

            $ob->factura = $this->facturaOb;
            $ob->nota = $this->notaOb;
            
            $ob->save();
            
            if($ob->save()){
                $this->mensajeSuccess = 'Nota Añadido Correctamente';
                $this->crearPago = 'false';
            }else{
                $this->mensajeError = 'Hubo Un Error Al Añadir La Nota';
                $this->crearPago = 'false';
            }
        }else{
            $this->mensajeError = 'Los Campos Del * Son Obligatorios';
            $this->crearPago = 'false';
        }
    }

    public function savePago(){
        if(!empty($this->facturaPago && $this->fechaPago && $this->pagoCliente && $this->tardanza
         && $this->saldo)){
            $pago = new Pagos();

            $pago->factura = $this->facturaPago;
            $pago->fecha_pago = $this->fechaPago;
            $pago->pago_cliente = $this->pagoCliente;
            $pago->tardanza = $this->tardanza;
            $pago->saldo = $this->saldo;

            $pago->save();
        
            if($pago->save() && $ob->save()){
                $this->mensajeSuccess = 'Pago Añadido Correctamente';
                $this->crearPago = 'false';
            }else{
                $this->mensajeError = 'Hubo Un Error Al Añadir El Pago';
                $this->crearPago = 'false';
            }
        }else{
            $this->mensajeError = 'Los Campos Del * Son Obligatorios';
            $this->crearPago = 'false';
        }
    }

    public function save(){
        if(!empty($this->factura && $this->categoria && $this->cliente && $this->cantidad && $this->precio
        && $this->fecha)){
            $venta = new Ventas();

            $venta->factura = $this->factura;
            $venta->cliente_id = $this->cliente;
            $venta->categoria_id = $this->categoria;
            $venta->cantidad = $this->cantidad;
            $venta->precio = $this->precio;
            $venta->fecha_venta = $this->fecha;
            
            $venta->save();

            $this->mensajeError = '';
            $this->mensajeSuccess = '';

            if($venta->save()){
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
        $venta = Ventas::where('factura', '=', "$factura");
        $venta->delete();

        if($venta->delete()){
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

    public function cancelarDetalles(){
        $this->ventaDetalle = '';
    }

}