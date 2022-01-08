<?php

namespace App\Http\Livewire\Paciente;

use App\Models\Paciente;
use Livewire\Component;

class PacienteVista extends Component
{
    public $paciente;
    public $nombre,$apellido,$fecha_nacimiento,$sexo,$telefono,$email;
    public $modal = false;

    public function mount($id){
        $this->paciente = Paciente::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.paciente.paciente-vista');
    }

    public function editar()
    {
        $this->paciente->nombre = $this->nombre;
        $this->paciente->apellido = $this->apellido;
        $this->paciente->sexo = $this->sexo;
        $this->paciente->fecha_nacimiento = $this->fecha_nacimiento;
        $this->paciente->telefono = $this->telefono;
        $this->paciente->email = $this->email;
        $this->paciente->save();
        $this->cerrarModal();
    }

    //FUNCIONES MODAL
    public function abrirModal()
    {
        $this->modal = true;
        $this->nombre = $this->paciente->nombre;
        $this->apellido = $this->paciente->apellido;
        $this->sexo = $this->paciente->sexo;
        $this->fecha_nacimiento = $this->paciente->fecha_nacimiento;
        $this->telefono = $this->paciente->telefono;
        $this->email = $this->paciente->email;
    }
    public function cerrarModal()
    {
        $this->modal = false;
    }
}
