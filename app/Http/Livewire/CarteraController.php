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

    public $eliminar;
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

    public function eliminar($id){
        $this->eliminar = $id;
    }

    public function hideMessage(){
        $this->mensajeError = null;
        $this->mensajeSuccess = null;
    }

    public function editar($id){
        $this->carteraEdit = Cartera::find($id);
    }

    public function borrar($id){
        $car = Cartera::find($id);
        $car->delete();
        if($car->delete()){
            $this->mensajeError = 'Error al borrar el elemento';
            $this->eliminar = null;
        }else{
            $this->mensajeSuccess = 'Elemento borrado correctamente';
            $this->eliminar = null;
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
            $miembro->cliente_id = $this->cliente != '' ? $this->cliente : $miembro->cliente_id;
            $miembro->compra = $this->compra != '' ? $this->nombre : $miembro->compra;
            $miembro->pago = $this->pago != '' ? $this->pago : $miembro->pago;

            $car->update();

            if($car->update()){
                $this->mensajeSucces = 'Elemento actualizado correctamente';
                $this->carteraEdit = '';
            }else{
                $this->mensajeError = 'Error al actualizar el elemento';
                $this->carteraEdit = '';
            }
        }else{
            $this->mensajeError = 'Hacer cambios es becesario para actualizarlos';
            $this->carteraEdit = '';
        }
    }

    public function save(){
        $this->mensajeError = null;
        $this->mensajeSuccess = null;

        if(!empty($this->cliente && $this->compra && $this->pago)){
            if($this->pago > 0 && $this->compra > 0){
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
                    $this->mensajeSuccess = 'Elemento agreagado correctamente';
                    $this->crear = 'false';
                    $this->cliente = '';
                    $this->compra = '';
                    $this->pago = '';
                }else{
                    $this->mensajeError = 'Error al agregar el elemento';
                    $this->crear = 'false';
                }
            }else{
                $this->mensajeError = 'Los numeros no pueden ser negativos ni empezar por 0';
                $this->crear = 'false';
            }
        }else{
            $this->mensajeError = 'Los campos del * son obligatorios';
            $this->crear = 'false';
        }
    }

    public function cancelar(){
        $this->crear = 'false';
        $this->carteraEdit = '';
        $this->eliminar = null;
    }

    public function limpiarBusqueda(){
        $this->perPage = 10;
        $this->search = '';
    }

}
