<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cartera;
use App\Models\Clientes;

class CarteraController extends Component{
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];
    public $search;
    public $perPage = 10;

    public $cliente;
    public $compra;
    public $pago;
    public $saldo;
    public $estado;

    public $crear = 'false';
    public $carteraEdit = '';
    public $mensajeSuccess = '';
    public $mensajeError = '';
    
    public function render(){
        return view('livewire.cartera', [
            'cartera' => Cartera::where('compra', 'LIKE', "%{$this->search}%")
            ->orWhere('pago', 'LIKE', "%{$this->search}%")
            ->orWhere('saldo', 'LIKE', "%{$this->search}%")
            ->orderBy('id', 'desc')->paginate($this->perPage),
            
            'clientes' => Clientes::orderBy('id', 'desc')->get()
        ]);
    }

    public function editar($id){
        $this->carteraEdit = Cartera::find($id);
    }

    public function borrar($id){
        $car = Cartera::find($id);
        $car->delete();
        if($car->delete()){
            $this->mensajeError = 'Error Al Borrar El Elemento';
        }else{
            $this->mensajeSuccess = 'Elemento Borrado Correctamente';
        }
    }

    public function crear(){
        $this->crear = 'true';
    }

    public function update($id){
        if(!empty($this->cliente || $this->compra || $this->pago || $this->saldo
            || $this->estado)){
                
            $car = Cartera::find($id);

            if(!empty($this->cliente)){
                $car->cliente_id = $this->cliente;
            }
            if(!empty($this->compra)){
                $car->compra = $this->compra;
            }
            if(!empty($this->pago)){
                $car->pago = $this->pago;
            }
            if(!empty($this->saldo)){
                $car->saldo = $this->saldo;
            }
            if(!empty($this->estado)){
                $car->estado = $this->estado;
            }

            $car->update();

            if($car->update()){
                $this->mensajeSucces = 'Elemento Actualizado Correctamente';
                $this->carteraEdit = '';
            }else{
                $this->mensajeError = 'Hubo Un Error Al Actualizar El Elemento';
                $this->carteraEdit = '';
            }
        }else{
            $this->mensajeError = 'Hacer Cambios Es Necesario Para La Actualizacion';
            $this->carteraEdit = '';
        }
    }

    public function save(){
        if(!empty($this->cliente && $this->compra && $this->pago && $this->saldo
            && $this->estado)){
            $car = new Cartera();

            $car->cliente_id = $this->cliente;
            $car->compra = $this->compra;
            $car->pago = $this->pago;
            $car->saldo = $this->saldo;
            $car->estado = $this->estado;

            $car->save();
                
            if($car->save()){
                $this->mensajeSuccess = 'Elemento Agreagado Correctamente';
                $this->crear = 'false';
                $this->cliente = '';
                $this->compra = '';
                $this->pago = '';
                $this->saldo = '';
                $this->estado = '';
            }else{
                $this->mensajeError = 'Error Al Agregar El Elemento';
                $this->crear = 'false';
            }
        }else{
            $this->mensajeError = 'Los Campos Del * Son Obligatorios';
            $this->crear = 'false';
        }
    }

    public function cancelar(){
        $this->crear = 'false';
        $this->carteraEdit = '';
    }

    public function limpiarBusqueda(){
        $this->perPage = 10;
        $this->search = '';
    }

}
