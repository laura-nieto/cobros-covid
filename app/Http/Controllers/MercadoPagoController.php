<?php

namespace App\Http\Controllers;

use App\Mail\EnvioCita;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Pago;
use App\Models\Sucursal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use PDF as PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Http\Request;

class MercadoPagoController extends Controller
{
    public function success(Request $request)
    { 
        $paciente = new Paciente;
        $paciente->nombre = session('paciente.nombre');
        $paciente->apellido = session('paciente.apellido');
        $paciente->fecha_nacimiento = session('paciente.fecha_nacimiento');
        $paciente->sexo = session('paciente.sexo');
        $paciente->telefono = session('paciente.telefono');
        $paciente->email = session('paciente.email');
        $paciente->estado_id = 1;
        $paciente->save();

        $cita = new Cita();
        $cita->fecha = session('dia');
        $cita->hora = session('hora');
        $cita->servicio_id = session('servicio_id');
        $cita->sucursal_id = session('sucursal_id');
        $cita->paciente_id = $paciente->id;
        $cita->save();

        $payment = new Pago;
        $payment->cita_id = $cita->id;
        $payment->is_paid = true;
        $payment->save();

        //PDF
        //$image = base64_encode(file_get_contents(public_path('/img/logo/SAIH-logo.png'))); //LOGO
        $url = $request->root() . '/paciente/' . Cita::find($payment->cita_id)->paciente->id;
        $qr = base64_encode(QrCode::format('svg')->size(200)->generate($url));
        $data = [
            'dia' => Carbon::parse(session('dia'))->format('d-m-Y'),
            'hora' => Carbon::parse(session('hora'))->format('H:i'),
            'sucursal' => Sucursal::find(session('sucursal_id')),
            // 'imagen' => $image,
            'qr' => $qr,
        ];
        $pdf = PDF::loadView('pdf.ticket', $data);
            
        // MANDAR EMAIL
        $correo = new EnvioCita( session('paciente.nombre'), session('paciente.apellido'),Carbon::parse(session('dia'))->format('d-m-Y'),Carbon::parse(session('hora'))->format('H:i'), Sucursal::find(session('sucursal_id'))->nombre  );
        $correo->attachData($pdf->output(),'reserva.pdf',['mime' => 'application/pdf']);
        Mail::to(session('paciente.email'))->send($correo);

        return view('reservar.pago_exitoso');
    }

    public function fail()
    {
        return redirect()->route('home')->with('error','Parece que ocurrió un error, vuelva a intentarlo');
    }
}
