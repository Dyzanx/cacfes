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
    public $newfactura;

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

    public function update($factura){
        $this->mensajeError = null;
        $this->mensajeSuccess = null;

        if(!empty($this->newfactura || $this->categoria || $this->cliente || $this->cantidad || $this->precio || $this->fecha 
        || $this->fechaPago || $this->pagoCliente || $this->notaOb)){

            $ve = Ventas::where('factura', '=', "$factura")->firts();
            $pa = Pagos::where('factura', '=', "$factura")->firts();
            $no = Observaciones::where('factura', '=', "$factura")->firts();

            if(!empty($this->newfactura)){
                $ve->factura = $this->newfactura;
                $pa->factura = $this->newfactura;
                $no->factura = $this->newfactura;
            }
            if(!empty($this->categoria)){
                $ve->categoria_id = $this->categoria;
            }
            if(!empty($this->cliente)){
                $ve->cliente_id = $this->cliente;
            }
            if(!empty($this->cantidad)){
                $ve->cantidad = $this->cantidad;
            }
            if(!empty($this->precio)){
                $ve->precio = $this->precio;
            }
            if(!empty($this->fecha)){
                $ve->fecha_venta = $this->fecha;
            }
            if(!empty($this->fechaPago)){
                $pa->fecha_pago = $this->fechaPago;
            }
            if(!empty($this->pagoCliente)){
                $pa->pago_cliente = $this->pagoCliente;
            }
            if(!empty($this->notaOb)){
                $no->nota = $this->notaOb;
            }

            $ve->update();
            $pa->update();
            $no->update();

            if($ve->update() && $pa->update() && $no->update()){
                $this->mensajeError = 'Venta actualizada correctamente';
                $this->ventaEdit = null;
                $this->pagoEdit = null;
                $this->obEdit = null;
            }else{
                $this->mensajeError = 'Hubo un error al actuaizar la venta';
                $this->ventaEdit = null;
                $this->pagoEdit = null;
                $this->obEdit = null;
            }
        }else{
            $this->mensajeError = 'Son necesarios cambios para actualizarlos';
            $this->ventaEdit = null;
            $this->pagoEdit = null;
            $this->obEdit = null;
        }
    }

    public function crear(){
        $this->crear = 'true';
        $this->ventaDetalle = '';
    }

    public function editar($factura){
        $this->ventaEdit = Ventas::where('factura', '=', $factura)->first();
        $this->pagoEdit = Pagos::where('factura', '=', $factura)->first();
        $this->obEdit = Observaciones::where('factura', '=', $factura)->first();
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