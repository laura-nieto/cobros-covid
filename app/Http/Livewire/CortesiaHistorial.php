<?php

namespace App\Http\Livewire;

use App\Models\Cortesia;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CortesiaHistorial extends Component
{
    public function render()
    {
        $cortesias = Cortesia::where('sucursal_id',session('sucursal'))->get();
        return view('livewire.cortesia-historial',compact('cortesias'));
    }
}
