<?php

namespace App\Http\Livewire\Logo;

use App\Models\GeneralSetting;
use Livewire\Component;

class Colors extends Component
{
    public function render()
    {
        $setting = GeneralSetting::first();
        $fondo1 = $setting->fondo1 == null ? 'white': $setting->fondo1;
        $fondo2 = $setting->fondo2 == null ? 'rgba(243, 244, 246,1)': $setting->fondo2;
        $color1 = $setting->color1 == null ? 'black': $setting->color1;
        $color2 = $setting->color2 == null ? 'black': $setting->color2;
        return view('livewire.logo.colors',compact('color1','color2','fondo1','fondo2'));
    }
}
