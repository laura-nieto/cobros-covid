<div class="w-full">
    <div class="py-12 flex-1 px-2 md:px-10">
        <x-slot name="header">
            {{ __('Configuración') }}
        </x-slot>
        @if(session('success'))
            <x-success>{{ session('success') }}</x-success>
        @endif
        <x-seccion>
            @if ($modalColor)
                @include('livewire.logo.modal-color')
            @endif
            @if ($modalImagen)
                @include('livewire.logo.modal-imagen')
            @endif
            <div class="overflow-hidden py-6 sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-200 sm:rounded-lg">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Vista Previa
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">
                                Tipo
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($setting as $item => $value)  
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        @if ($item == 'logo')
                                            <img src="{{asset('logos/'.$value)}}" alt="" class="w-24">
                                        @else
                                            <div class="w-24 h-24 border border-black" style="background-color:{{$value}}"></div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        @switch($item)
                                            @case('logo')
                                                Logo
                                                @break
                                            @case('fondo1')
                                                Fondo de las barras de navegación
                                                @break
                                            @case('fondo2')
                                                Fondo del apartado principal
                                                @break
                                            @case('color1')
                                                Letras de las barras de navegación
                                                @break
                                            @case('color2')
                                                Letras del apartado principal
                                                @break
                                            @default
                                                
                                        @endswitch
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex justify-evenly">
                                        <button {{ $item == 'logo'? "wire:click=crearLogo()":"wire:click=crearColor('$item')" }}
                                        class="px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Editar</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-seccion>
    </div>
</div>