<?php

namespace App\Http\Livewire\Paciente;

use App\Mail\EnvioResultado;
use App\Models\Paciente;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class PacienteResultado extends Component
{
    use WithPagination;

    public $paciente,$resultado;
    public $search;
    public $modal = false;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $pacientes = Paciente::orderBy('notificado')->where('nombre','like','%'.$this->search.'%')
            ->orWhere('apellido','like','%'.$this->search.'%')
            ->paginate(10);

        return view('livewire.paciente.paciente-resultado',compact('pacientes'));
    }

    public function resultado($id)
    {
        $this->paciente = Paciente::find($id);
        $this->abrirModal();
    }

    public function editar()
    {
        $this->paciente->resultado = $this->resultado;
        $paciente = $this->paciente->apellido . ' ' . $this->paciente->nombre;
        $correo = new EnvioResultado($paciente, $this->resultado);
        Mail::to($this->paciente->email)->send($correo);
        $this->paciente->notificado = true;
        $this->paciente->save();
        $this->cerrarModal();
    }

    //FUNCIONES MODAL
    public function abrirModal()
    {
        $this->modal = true;
    }
    public function cerrarModal()
    {
        $this->modal = false;
    }
}
