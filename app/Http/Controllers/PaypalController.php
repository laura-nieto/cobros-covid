<?php

namespace App\Http\Controllers;

use App\Mail\EnvioCita;
use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Pago;
use App\Models\Sucursal;
use App\Services\PaypalService;
use BaconQrCode\Encoder\QrCode as EncoderQrCode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF as PDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PaypalController extends Controller
{
    private $paypalService;

    function __construct(PaypalService $paypalService){
        $this->paypalService = $paypalService;
    }

    public function getExpressCheckout()
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

        $cita = new Cita;
        $cita->fecha = session('dia');
        $cita->hora = session('hora');
        $cita->servicio_id = session('servicio_id');
        $cita->sucursal_id = session('sucursal_id');
        $cita->paciente_id = $paciente->id;
        $cita->save();

        session()->put('cita',$cita->id);

        $payment = new Pago;
        $payment->cita_id = $cita->id;
        $payment->save();

        $response = $this->paypalService->createOrder($payment->id);
        
        if($response->statusCode !== 201) {
            $cita = Cita::find($payment->cita_id);
            $cita->delete();
            abort(500);
        }

        $payment = Pago::find($payment->id);
        $payment->paypal_orderid = $response->result->id;
        $payment->save();

        // REDIRECCION
        foreach ($response->result->links as $link) {
            if($link->rel == 'approve') {
                return redirect($link->href);
            }
        }
    }


    public function getExpressCheckoutSuccess(Request $request,$payment_id){

        $payment = Pago::find($payment_id);
        $response = $this->paypalService->captureOrder($payment->paypal_orderid);

        if ($response->result->status == 'COMPLETED') {
            $payment->is_paid = 1;
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
        }else{
            $cita = Cita::find($payment->cita_id);
            $cita->paciente->estado_id = 4;
            $cita->push();
            $cita->delete();
            return redirect()->route('home')->with('error','Algo ocurrió, vuelva a intentarlo.');
        }
    }

    public function cancelPage($payment_id)
    {        
        $payment = Pago::find($payment_id);
        $cita = Cita::find($payment->cita_id);
        $cita->paciente->estado_id = 4;
        $cita->push();
        $cita->delete();
        return redirect()->route('home')->with('error','El pago ha sido cancelado');
    }
}
