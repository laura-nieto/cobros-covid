<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sucursales = Sucursal::all();
        return view('welcome',compact('sucursales'));
    }
}
