<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Cortesia;
use App\Models\Paciente;
use App\Models\Servicio;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Carbon\Carbon;


class CitaController extends Controller
{
    public function coincidencias(Request $request)
    {
        $rules = [
            'date' => 'required|after:today',
            'sucursal_id' => 'required',
            'servicio_id' => 'required',
        ];
        $message = [
            'required' => 'Debe completar todos los campos',
            'after' => 'La fecha ingresada debe ser después de hoy'
        ];
        $request->validate($rules,$message);

        $from = ' 09:00:00';
        $to = ' 18:00:00';
        $inicio = Carbon::parse($request->date . $from);
        $fin = Carbon::parse($request->date . $to);
        $cita = Cita::where('fecha',$request->date)->where('sucursal_id',$request->sucursal_id);

        for($inicio; $inicio->diffInMinutes($fin) > 0 ; $inicio->addMinutes(20) ){
            $hora = $inicio->format('H:i');
            if( $cita->where('hora',$hora)->count() < 4){
                $horasDisponibles[]= $hora;
            }
        }
        $sucursales = Sucursal::all();
        $dia = Carbon::parse($request->date)->format('d-m-Y');
        //dd($horasDisponibles);
        return view('reservar.coincidencias',compact('horasDisponibles','sucursales','dia'));
    }

    public function guardarSesion(Request $request)
    {
        $rules = [
            'time' => 'required',
        ];
        $message = [
            'required' => 'Debe seleccionar una hora.'
        ];
        $servicio = Servicio::find($request->servicio_id);
        $request->validate($rules,$message);
        $request->session()->put('dia',$request->date);
        $request->session()->put('hora',$request->time);
        $request->session()->put('sucursal_id',$request->sucursal_id);
        $request->session()->put('servicio_id',$request->servicio_id);
        $request->session()->put('precio',$servicio->precio);
        
        return redirect()->route('datosPaciente');
    }

    public function index()
    {
        return view('reservar.datos');
    }

    public function datos_paciente(Request $request)
    {
        $rules = [
            'name'=> 'required|min:2',
            'lastname'=> 'required|min:2',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
        ];
        $message = [
            'required' => 'Debe seleccionar una hora.',
            'date' => 'Debe ingresar una fecha válida.',
            'email' => 'Debe ingresar un email válido.',
            'numeric' => 'Solo debe ingresar números.',
            'min' => 'Debe ingresar al menos :min caracteres',
        ];
        $request->validate($rules,$message);

        $paciente = [
            'apellido' => $request->lastname,
            'nombre' => $request->name,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'sexo' => $request->sexo,
            'telefono' => $request->phone,
            'email' => $request->email,
        ];
        $request->session()->put('paciente', $paciente);
        return redirect()->route('forma_pago');
    }

    public function forma_pago()
    {
        $dia = Carbon::parse(session('dia'))->format('d-m-Y');
        $hora = Carbon::parse(session('hora'))->format('H:i');
        $sucursal = Sucursal::find(session('sucursal_id'));
        $servicio = Servicio::find(session('servicio_id'));
        
        return view('reservar.forma_pago',compact('dia','hora','sucursal','servicio'));
    }

    public function pagoCortesia()
    {
        $paciente = new Paciente;
        $paciente->nombre = session('paciente.nombre');
        $paciente->apellido = session('paciente.apellido');
        $paciente->fecha_nacimiento = session('paciente.fecha_nacimiento');
        $paciente->sexo = session('paciente.sexo');
        $paciente->telefono = session('paciente.telefono');
        $paciente->email = session('paciente.email');
        $paciente->estado_id = 5;
        $paciente->save();

        $cita = new Cita;
        $cita->fecha = session('dia');
        $cita->hora = session('hora');
        $cita->servicio_id = session('servicio_id');
        $cita->sucursal_id = session('sucursal_id');
        $cita->paciente_id = $paciente->id;
        $cita->save();

        $cortesia = new Cortesia;
        $cortesia->cita_id = $cita->id;
        $cortesia->sucursal_id = session('sucursal_id');
        $cortesia->save();
        return view('reservar.cortesia');
    }
}
