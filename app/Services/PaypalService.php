<?php

namespace App\Services;

use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class paypalService {
    
    private $client;

    function __construct()
    {
        $environment = new SandboxEnvironment(env('PAYPAL_SANDBOX_CLIENT_ID'), env('PAYPAL_SANDBOX_CLIENT_SECRET'));
        $this->client = new PayPalHttpClient($environment);
    }

    public function createOrder($payment_id)
    {
        $request = new OrdersCreateRequest();
        $request->headers["prefer"] = "return=representation";
        $request->body = $this->checkoutData($payment_id);
        
        return $this->client->execute($request);
    }

    public function captureOrder($paypalOrderId)
    {
        $request = new OrdersCaptureRequest($paypalOrderId);

        return $this->client->execute($request);
    }

    public function checkoutData($payment_id){
        return [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                    "reference_id" => uniqid(),
                    "amount" => [
                        "value" => session('precio'),
                        "currency_code" => "USD"
                    ]
                ]],
            "application_context" => [
                "cancel_url" => route('paypal.cancel',$payment_id),
                "return_url" => route('paypal.success',$payment_id)
            ] 
        ];
    }
}