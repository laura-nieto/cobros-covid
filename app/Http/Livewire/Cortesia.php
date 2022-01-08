<?php

namespace App\Http\Livewire;

use App\Mail\EnvioCita;
use App\Mail\RechazoCortesia;
use App\Models\Cita;
use App\Models\Cortesia as ModelsCortesia;
use App\Models\Sucursal;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use PDF as PDF;

class Cortesia extends Component
{
    public function render()
    {
        $cortesias = ModelsCortesia::where('sucursal_id',session('sucursal'))->where('revisado',0)->get();
        return view('livewire.cortesia',compact('cortesias'));
    }

    public function aprobar(ModelsCortesia $cortesia)
    {
        $cita = $cortesia->cita;
        $paciente = $cortesia->cita->paciente;
        $email = $cortesia->cita->paciente->email;

        //PDF
        $url = request()->root() . '/paciente/' . $paciente->id;
        $qr = base64_encode(QrCode::format('svg')->size(200)->generate($url));
        $data = [
            'dia' => Carbon::parse($cita->fecha)->format('d-m-Y'),
            'hora' => Carbon::parse($cita->hora)->format('H:i'),
            'sucursal' => Sucursal::find($cita->sucursal_id),
            'qr' => $qr,
        ];
        $pdf = PDF::loadView('pdf.ticket', $data);
            
            // MANDAR EMAIL
        $correo = new EnvioCita( $paciente->nombre, $paciente->apellido, Carbon::parse($cita->fecha)->format('d-m-Y'),Carbon::parse($cita->hora)->format('H:i'), Sucursal::find($cita->sucursal_id)->nombre  );
        $correo->attachData($pdf->output(),'reserva.pdf',['mime' => 'application/pdf']);
        Mail::to($email)->send($correo);

        $cortesia->aprobado = 1;
        $cortesia->revisado = 1;
        $cortesia->user_id = Auth::id();
        $cortesia->save();
    }

    public function rechazar(ModelsCortesia $cortesia)
    {
        $cita = $cortesia->cita;
        $paciente = $cortesia->cita->paciente;
        $email = $cortesia->cita->paciente->email;

            //ELIMINAR CITA
        $cita->delete();
            //ENVIAR MAIL
        $correo = new RechazoCortesia($paciente->apellido, $paciente->nombre);
        Mail::to($email)->send($correo);

        $cortesia->aprobado = 0;
        $cortesia->revisado = 1;
        $cortesia->user_id = Auth::id();
        $cortesia->save();
    }
}
