<div class="w-full">
    <div class="py-12 flex-1 px-2 md:px-10">
        <x-slot name="header">
            {{ __('Información del Paciente') }}
        </x-slot>
        @if(session('success'))
            <x-success>{{ session('success') }}</x-success>
        @endif
        <x-seccion>
            @if ($modal)
                @include('livewire.pacientes.modal-paciente-modificar')
            @endif
            <div class="bg-white shadow overflow-hidden sm:rounded-lg px-4 py-5 sm:px-6">
                <div>
                    <dl>
                      <div class="px-4 py-5 md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <dt class="text-sm font-medium text-gray-500 text-lg">
                          Apellido
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 text-lg">
                            {{$paciente->apellido}}
                        </dd>
                      </div>
                      <div class="px-4 py-5 md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <dt class="text-sm font-medium text-gray-500 text-lg">
                          Nombre
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 text-lg">
                            {{$paciente->nombre}}
                        </dd>
                      </div>
                      <div class="px-4 py-5 md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <dt class="text-sm font-medium text-gray-500 text-lg">
                          Sexo
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 capitalize text-lg">
                            {{$paciente->sexo}}
                        </dd>
                      </div>
                      <div class="px-4 py-5 md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <dt class="text-sm font-medium text-gray-500 text-lg">
                          Fecha de Nacimiento
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 text-lg">
                            {{Carbon\Carbon::parse($paciente->fecha_nacimiento)->format('d-m-Y')}}
                        </dd>
                      </div>
                      <div class="px-4 py-5 md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <dt class="text-sm font-medium text-gray-500 text-lg">
                          Teléfono
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 text-lg">
                            {{$paciente->telefono}}
                        </dd>
                      </div>
                      <div class="px-4 py-5 md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <dt class="text-sm font-medium text-gray-500 text-lg">
                          Correo Electrónico
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 text-lg">
                            {{$paciente->email}}
                        </dd>
                      </div>
                    </dl>
                </div>
                <div class="px-6 mt-6 flex justify-end">
                    <button wire:click='abrirModal()'
                    class="px-4 py-2 mr-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Editar</button>
                    <button
                    class="px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Validar</button>
                </div>
            </div>
        </x-seccion>
    </div>
</div>
