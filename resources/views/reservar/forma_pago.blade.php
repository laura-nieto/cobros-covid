<x-guest-layout>
    @php
        // SDK de Mercado Pago
        require base_path('/vendor/autoload.php');
        // Agrega credenciales
        MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
        
        // Crea un objeto de preferencia
        $preference = new MercadoPago\Preference();
        // Crea un ítem en la preferencia
        $item = new MercadoPago\Item();
        $item->title = 'Prueba de COVID';
        $item->quantity = 1;
        $item->unit_price = session('precio');
        // URL
        $preference->back_urls = array(
            "success" => route('mercadoPago.success'),
            "failure" => route('mercadoPago.fail'),
            "pending" => route('mercadoPago.success')
        );
        $preference->auto_return = "approved";

        $preference->items = array($item);
        $preference->save();
    @endphp
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="mb-6">
                <h3 class="text-xl font-medium">Pago</h3>
            </div>
            <div>
                <h4 class="text-lg">Turno para el día {{$dia}} a las {{$hora}}hs. En <strong>{{$sucursal->nombre}}</strong> ({{$sucursal->direccion}})</h4>
            </div>
            <div>
                <h4 class="text-lg">Total a pagar: ${{$servicio->precio}}</h4>
            </div>
            <div class="px-4 py-3 text-right sm:px-6 bg-white flex justify-end cho-container">
                <a href="{{url('pago/cortesia')}}" class="mr-2 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
                    Cortesía
                </a>
                <a href="{{url('paypal/checkout')}}" class="mr-2 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
                  Paypal
                </a>
            </div>
        </div>
    </div>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        // Agrega credenciales de SDK
        const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
                locale: 'es-AR'
        });

        // Inicializa el checkout
        mp.checkout({
            preference: {
                id: '{{ $preference->id }}'
            },
            render: {
                container: '.cho-container', // Indica el nombre de la clase donde se mostrará el botón de pago
                label: 'Mercado Pago', // Cambia el texto del botón de pago (opcional)
            }
        });
    </script>
</x-guest-layout>