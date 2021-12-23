<?php

namespace App\Http\Livewire\Logo;

use App\Models\GeneralSetting;
use Livewire\Component;

class LogoLogin extends Component
{
    public $logo;

    public function __construct()
    {
        if (GeneralSetting::first() == null || GeneralSetting::first()->logo == null) {
            $this->logo = "/img/logo/SAIH-logo.png";
        }else{
            $this->logo = "logos/" . GeneralSetting::first()->logo;
        }
    }
    public function render()
    {
        return view('livewire.logo.logo-login');
    }
}
