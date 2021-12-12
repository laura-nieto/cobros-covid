<?php

namespace App\Http\Controllers;

use App\Mail\EnvioCita;
use App\Models\Cita;
use App\Models\Pago;
use App\Models\Sucursal;
use App\Services\PaypalService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaypalController extends Controller
{
    private $paypalService;

    function __construct(PaypalService $paypalService){
        $this->paypalService = $paypalService;
    }

    public function getExpressCheckout()
    {
        $payment = new Pago;
        $payment->cita_id = session('cita');
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


    public function getExpressCheckoutSuccess($payment_id){

        $payment = Pago::find($payment_id);
        $response = $this->paypalService->captureOrder($payment->paypal_orderid);

        if ($response->result->status == 'COMPLETED') {
            $payment->is_paid = 1;
            $payment->save();
            // MANDAR EMAIL
            $correo = new EnvioCita( session('paciente.nombre'), session('paciente.apellido'),Carbon::parse(session('dia'))->format('d-m-Y'),Carbon::parse(session('hora'))->format('H:i'), Sucursal::find(session('sucursal_id'))->nombre  );
            Mail::to(session('paciente.email'))->send($correo);
            return view('reservar.pago_exitoso');
        }else{
            $cita = Cita::find($payment->cita_id);
            $cita->delete();
            return redirect()->route('home')->with('error','Algo ocurrió, vuelva a intentarlo.');
        }
    }

    public function cancelPage($payment_id)
    {        
        $payment = Pago::find($payment_id);
        $cita = Cita::find($payment->cita_id);
        $cita->delete();
        return redirect()->route('home')->with('error','El pago ha sido cancelado');
    }
}
