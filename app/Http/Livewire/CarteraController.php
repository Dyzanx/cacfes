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

    public $crear = 'false';
    public $carteraEdit = '';
    public $mensajeSuccess = '';
    public $mensajeError = '';
    
    public function render(){
        return view('livewire.cartera', [
            'cartera' => Cartera::where('compra', 'LIKE', "%{$this->search}%")
            ->orWhere('pago', 'LIKE', "%{$this->search}%")
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
        $this->mensajeError = null;
        $this->mensajeSuccess = null;

        if(!empty($this->cliente || $this->compra || $this->pago)){
                
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

            $car->update();

            if($car->update()){
                $this->mensajeSucces = 'Elemento Actualizado Correctamente';
                $this->carteraEdit = '';
            }else{
                $this->mensajeError = 'Hubo Un Error Al Actualizar El Elemento';
                $this->carteraEdit = '';
            }
        }else{
            $this->mensajeError = 'Hacer Cambios Es Necesario Para Actualizarlos';
            $this->carteraEdit = '';
        }
    }

    public function save(){
        $this->mensajeError = null;
        $this->mensajeSuccess = null;

        if(!empty($this->cliente && $this->compra && $this->pago)){
            $car = new Cartera();            

            $car->cliente_id = $this->cliente;
            $car->compra = $this->compra;

            if($this->pago >= $this->compra){
                $car->pago = $this->compra;
            }else{
                $car->pago = $this->pago;
            }

            $car->save();
                
            if($car->save()){
                $this->mensajeSuccess = 'Elemento Agreagado Correctamente';
                $this->crear = 'false';
                $this->cliente = '';
                $this->compra = '';
                $this->pago = '';
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
