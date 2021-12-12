<x-guest-layout>
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
            <div class="px-4 py-3 text-right sm:px-6 bg-white">
                <a href="{{url('paypal/checkout')}}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
                  Pagar
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>