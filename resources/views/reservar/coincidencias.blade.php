<x-guest-layout>

    <form action="{{url('busqueda')}}" method="get">
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid sm:grid-cols-3 gap-6">
                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700 text-base">Día</label>
                        <input type="date" name="date" id="date" autocomplete="given-name" class="mt-1 focus:ring-indigo-200 focus:border-indigo-300 block w-full shadow-sm sm:text-base border-gray-300 rounded-md" required>
                    </div>
    
                    <div>
                        <label for="sucursal_id" class="block text-sm font-medium text-gray-700 text-base">Sucursal</label>
                        <select name="sucursal_id" id="sucursal_id" class="mt-1 focus:ring-indigo-200 focus:border-indigo-300 block w-full shadow-sm sm:text-base border-gray-300 rounded-md" required>
                            <option selected>Seleccione una sucursal</option>
                            @foreach ($sucursales as $sucursal)
                                <option value="{{$sucursal->id}}">{{$sucursal->nombre}} - {{$sucursal->direccion}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="servicio_id" class="block text-sm font-medium text-gray-700 text-base">Tipo de Servicio</label>
                        <select name="servicio_id" id="servicio_id" class="mt-1 focus:ring-indigo-200 focus:border-indigo-300 block w-full shadow-sm sm:text-base border-gray-300 rounded-md" required>
                            
                        </select>
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 text-right sm:px-6 bg-white">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
                  Buscar
                </button>
            </div>
        </div>
    </form>
    <div class="mt-3">
        <form action="" method="post">
            @csrf
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="mb-3">
                        <h5 class="text-lg font-bold">Día {{$dia}}</h5>
                    </div>
                    <div>
                        <label for="time" class="block text-sm font-medium text-gray-700 text-base">Horario</label>
                        <select name="time" id="time" class="mt-1 focus:ring-indigo-200 focus:border-indigo-300 block w-full shadow-sm sm:text-base border-gray-300 rounded-md" required>
                            <option selected>Seleccione un horario</option>
                            @foreach ($horasDisponibles as $hora)
                                <option value="{{$hora}}">{{$hora}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="px-4 py-3 text-right sm:px-6 bg-white">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
                      Seleccionar
                    </button>
                </div>
            </div>
        </form>
    </div>
    @section('js')
        <script type="text/javascript">
            const baseURL = {!!json_encode(url('/')) !!}
        </script>
        <script src="{{ asset('js/select-servicio.js') }}"></script>
    @endsection
</x-guest-layout>