<?php

namespace App\Http\Livewire;

use App\Models\Cita;
use Carbon\Carbon;
use Livewire\Component;

class Calendario extends Component
{
    public $search;

    public function mount()
    {
        $this->search = Carbon::today()->format('Y-m-d');
    }

    public function render()
    {
        $citas = Cita::where('sucursal_id',session('sucursal'))->where('fecha',$this->search)->orderBy('hora')->get()->groupBy('hora');
        return view('livewire.calendario',compact('citas'));
    }
}
