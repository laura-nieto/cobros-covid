<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function get_servicios($id)
    {
        $servicios = Servicio::where('sucursal_id',$id)->get();
        return response()->json($servicios);
    }
}
