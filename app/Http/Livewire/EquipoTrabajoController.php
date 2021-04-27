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

    public $nombre;
    public $apellido;
    public $telefono;
    public $fechaNacimiento;
    public $mes;
    public $dia;
    public $inicioLabor;
    public $edad;
    public $dias;

    public $crear = 'false';
    public $mensajeSuccess;
    public $mensajeError;
    public $miembroEdit = '';

    public function render(){
        return view('livewire.equipoTrabajo',[
            'miembros' => EquipoTrabajo::where('nombre', 'LIKE', "%{$this->search}%")
            ->orWhere('apellido', 'LIKE', "%{$this->search}%")
            ->orWhere('edad', 'LIKE', "%{$this->search}%")
            ->orWhere('telefono', 'LIKE', "%{$this->search}%")->orderBy('id', 'desc')->paginate($this->perPage)
        ]);
    }

    public function editar($id){
        $this->miembroEdit = EquipoTrabajo::find($id);
    }

    public function update($id){
        if(!empty($this->nombre || $this->apellido || $this->telefono || $this->fechaNacimiento || 
            $this->mes || $this->dia || $this->inicioLabor || $this->edad || $this->dias)){
            $miembro = EquipoTrabajo::find($id);

            if(!empty($this->nombre)){
                $miembro->nombre = $this->nombre;
            }
            if(!empty($this->apellido)){
                $miembro->apellido = $this->apellido;
            }
            if(!empty($this->telefono)){
                $miembro->telefono = $this->telefono;
            }
            if(!empty($this->fechaNacimiento)){
                $miembro->fecha_nacimiento = $this->fechaNacimiento;
            }
            if(!empty($this->mes)){
                $miembro->mes_cumpleaños = $this->mes;
            }
            if(!empty($this->dia)){
                $miembro->dia_cumpleaños = $this->dia;
            }
            if(!empty($this->inicioLabor)){
                $miembro->inicio_labores = $this->inicioLabor;
            }
            if(!empty($this->edad)){
                $miembro->edad = $this->edad;
            }
            if(!empty($this->dias)){
                $miembro->dias = $this->dias;
            }
    
            $miembro->update();
    
            if($miembro->update()){
                $this->mensajeSuccess = 'Miembro Actualizado Correctamente';
                $this->miembroEdit = '';
            }else{
                $this->mensajeError = 'Hubo Un Error Al Actualizar El Miembro';
                $this->miembroEdit = '';
            }
        }else{
            $this->mensajeError = 'Son Necesarios Cambios Para Completar La Actualizacion';
            $this->miembroEdit = '';
        }
    }

    public function crear(){
        $this->crear = 'true';
    }

    public function save(){
        if(!empty($this->nombre && $this->apellido && $this->telefono && $this->edad && $this->inicioLabor
            && $this->mes && $this->dia)){
            
            $miembro = new EquipoTrabajo();

            $miembro->nombre = $this->nombre;
            $miembro->apellido = $this->apellido;
            $miembro->telefono = $this->telefono;
            $miembro->fecha_nacimiento = $this->fechaNacimiento;
            $miembro->mes_cumpleaños = $this->mes;
            $miembro->dia_cumpleaños = $this->dia;
            $miembro->inicio_labores = $this->inicioLabor;
            $miembro->edad = $this->edad;
            $miembro->dias = $this->dias;

            $miembro->save();

            if($miembro->save()){
                $this->mensajeSuccess = 'Miembro Añadido Correctamente';
                $this->crear = 'false';
                $this->nombre = '';
                $this->apellido = '';
                $this->telefono = '';
                $this->fechaNacimiento = '';
                $this->mes = '';
                $this->dia = '';
                $this->inicioLabor = '';
                $this->edad = '';
                $this->dias = '';
            }else{
                $this->mensajeError = 'Hubo Un Error Al Añadir El Miembro';
                $this->crear = 'false';
            }
        }else{
            $this->mensajeError = 'Los Campos Del * Son Obligatorios';
            $this->crear = 'false';
        }
    }

    public function borrar($id){
        $miembro = EquipoTrabajo::find($id);
        $miembro->delete();

        if($miembro->delete()){
            $this->mensajeError = 'Hubo Un Error Al Borrar El Miembro';
        }else{
            $this->mensajeSuccess = 'Miembro Borrado Correctamente';
        }
    }

    public function cancelar(){
        $this->crear = 'false';
        $this->miembroEdit = '';

        $this->nombre = '';
        $this->apellido = '';
        $this->telefono = '';
        $this->fechaNacimiento = '';
        $this->mes = '';
        $this->dia = '';
        $this->inicioLabor = '';
        $this->edad = '';
        $this->dias = '';
    }

    public function limpiarBusqueda(){
        $this->perPage = 10;
        $this->search = '';
    }
}
