<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\EquipoTrabajo;

class EquipoTrabajoController extends Component{
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];
    public $search;
    public $perPage = 10;

    public $tmpInicioLabores;
    public $tmpFechaNacimiento;
    public $tmpHoyLabor;
    public $tmpHoyNacimiento;

    public $nombre;
    public $apellido;
    public $telefono;
    public $fechaNacimiento;
    public $mes;
    public $dia;
    public $inicioLabor;
    public $eliminar;

    public $crear = 'false';
    public $mensajeSuccess;
    public $mensajeError;
    public $miembroEdit = '';

    public function render(){
        return view('livewire.equipoTrabajo',[
            'miembros' => EquipoTrabajo::where('nombre', 'LIKE', "%{$this->search}%")
            ->orWhere('apellido', 'LIKE', "%{$this->search}%")
            ->orWhere('telefono', 'LIKE', "%{$this->search}%")->orderBy('id', 'desc')->paginate($this->perPage)
        ]);
    }

    public function editar($id){
        $this->miembroEdit = EquipoTrabajo::find($id);
    }

    public function hideMessage(){
        $this->mensajeError = null;
        $this->mensajeSuccess = null;
    }

    public function eliminar($id){
        $this->eliminar = $id;
    }

    public function update($id){
        if(!empty($this->nombre || $this->apellido || $this->telefono || $this->fechaNacimiento || $this->mes || $this->dia || $this->inicioLabor)){
            $miembro = EquipoTrabajo::find($id);

            $miembro->nombre = $this->nombre != '' ? $this->nombre : $miembro->nombre;
            $miembro->apellido = $this->apellido != '' ? $this->apellido : $miembro->apellido;
            $miembro->telefono = $this->telefono != '' ? $this->telefono : $miembro->telefono;
            $miembro->fecha_nacimiento = $this->fechaNacimiento != '' ? $this->fechaNacimiento : $miembro->fecha_nacimiento;
            $miembro->mes_cumpleaños = $this->mes != '' ? $this->mes : $miembro->mes_cumpleaños;
            $miembro->dia_cumpleaños = $this->dia != '' ? $this->dia : $miembro->dia_cumpleaños;
            $miembro->inicio_labores = $this->inicioLabor != '' ? $this->inicioLabor : $miembro->inicio_labores;
    
            $miembro->update();
    
            if($miembro->update()){
                $this->mensajeSuccess = 'Miembro actualizado correctamente';
                $this->miembroEdit = '';
            }else{
                $this->mensajeError = 'Hubo un error al actualizar el miembro';
                $this->miembroEdit = '';
            }
        }
    }

    public function crear(){
        $this->crear = 'true';
    }

    public function save(){
        if(!empty($this->nombre && $this->apellido && $this->telefono && $this->inicioLabor && $this->mes && $this->dia)){
            if($this->telefono > 0 && $this->mes > 0 && $this->dia > 0){
                $miembro = new EquipoTrabajo();

                $miembro->nombre = $this->nombre;
                $miembro->apellido = $this->apellido;
                $miembro->telefono = $this->telefono;
                $miembro->fecha_nacimiento = $this->fechaNacimiento;
                $miembro->mes_cumpleaños = $this->mes;
                $miembro->dia_cumpleaños = $this->dia;
                $miembro->inicio_labores = $this->inicioLabor;
    
                $miembro->save();
    
                if($miembro->save()){
                    $this->mensajeSuccess = 'Miembro añadido correctamente';
                    $this->crear = 'false';
                    $this->nombre = '';
                    $this->apellido = '';
                    $this->telefono = '';
                    $this->fechaNacimiento = '';
                    $this->mes = '';
                    $this->dia = '';
                    $this->inicioLabor = '';
                }else{
                    $this->mensajeError = 'Hubo un error al añadir el miembro';
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

    public function borrar($id){
        $miembro = EquipoTrabajo::find($id);
        $miembro->delete();

        if($miembro->delete()){
            $this->mensajeError = 'Hubo un error al borrar el Miembro';
            $this->eliminar = null;
        }else{
            $this->mensajeSuccess = 'Miembro borrado Correctamente';
            $this->eliminar = null;
        }
    }

    public function cancelar(){
        $this->crear = 'false';
        $this->miembroEdit = '';
        $this->eliminar = null;
        $this->nombre = '';
        $this->apellido = '';
        $this->telefono = '';
        $this->fechaNacimiento = '';
        $this->mes = '';
        $this->dia = '';
        $this->inicioLabor = '';
    }

    public function limpiarBusqueda(){
        $this->perPage = 10;
        $this->search = '';
    }
}
