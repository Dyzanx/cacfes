<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ventas;
use App\Models\Clientes;
use App\Models\tipoCosto;
use App\Models\Producto;
use JavaScript;
class DashboardController extends Component{
    public $buscarVentaCliente;
    
    public function render(){
        return view('dashboard', [
            'clientes' => Clientes::where('tipoCliente', '=', 'cliente')->get(),
            'proveedores' => Clientes::where('tipoCliente', '=', 'proveedor')->get(),
            'ventas' => Ventas::get(),
            'tiposDeCosto' => tipoCosto::get(),
            'costos' => Producto::get()
        ]);
    }

    public function limpiarBusquedaVentas(){
        $this->filtroVentas = 'todos';
    }
}