<div class="w-full">
    <div class="py-12 flex-1 px-2 md:px-10">
        <x-slot name="header">
            {{ __('Calendario') }}
        </x-slot>
        @if(session('success'))
            <x-success>{{ session('success') }}</x-success>
        @endif
        <x-seccion>
            <div>
                <div class="flex flex-col">
                    <label class="mb-2 mt-5 font-semibold text-gray-700" for="search">Citas para el día</label>
                    <input type="date" name="search" id="search" placeholder="Ingrese un día"
                        class="bg-white border border-gray-200 rounded shadow-sm w-96 @error('search')border-red-500 @enderror" wire:model="search">
                </div>
                <div class="mt-3">
                    @if (!$citas->count())
                        <h4 class="mt-5 text-xl font-bold">No hay citas para ese día</h4>
                    @else
                        <div class="flex bg-white text-black py-3">
                            <div class="border-gray-400 divide-y divide-gray-300 w-full lg:w-1/2">
                                @foreach($citas as $hora => $cita)
                                    <div class="flex">
                                        <h5 class="p-4 cursor-pointer font-bold">
                                            {{ Carbon\Carbon::parse($hora)->format('H:i') }}
                                        </h5>
                                        
                                        <ol class="divide-y divide-gray-300 list-inside w-full">
                                            @foreach ($cita as $item)    
                                                <li class="p-4 hover:bg-gray-50 cursor-pointer grid grid-cols-2">
                                                    <p>{{$item->paciente->apellido . ' ' . $item->paciente->nombre}}</p>
                                                    <a href="{{url('paciente/'.$item->paciente->id)}}" class="justify-self-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Ver</a>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </x-seccion>
    </div>
</div>
