<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ventas;
use App\Models\Clientes;
class DashboardController extends Component{
    public $filtroVentas = 'todos';
    public $buscarVentaCliente;
    
    public function render(){
        return view('dashboard', [
            'clientes' => Clientes::get(),
            'ventas' => Ventas::get()
        ]);
    }

    public function limpiarBusquedaVentas(){
        $this->filtroVentas = 'todos';
    }
}