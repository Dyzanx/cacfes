<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ventas;
use App\Models\Clientes;
use JavaScript;
class DashboardController extends Component{
    public $filtroVentas = 'todos';
    public $buscarVentaCliente;
    
    public function render(){
        return view('dashboard', [
            'clientes' => Clientes::where('tipoCliente', '=', 'cliente')->get(),
            'clientesJS' => json_decode(Clientes::where('tipoCliente', '=', 'cliente')->get()),
            'proveedores' => Clientes::where('tipoCliente', '=', 'proveedor')->get(),
            'ventas' => Ventas::get()
        ]);
    }

    public function limpiarBusquedaVentas(){
        $this->filtroVentas = 'todos';
    }
}