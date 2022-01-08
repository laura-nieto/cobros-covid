<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <!-- component -->
    <div class="flex justify-center h-screen items-center bg-gray-200 bg-opacity-75 antialiased">
        <div
            class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl">
            <div
                class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg">
                <p class="font-semibold text-gray-800">Notificar Resultado</p>
                <svg wire:click="cerrarModal()" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </div>
            <div class="flex flex-col px-6 py-5 bg-gray-50">
                <form action="" method="post" class="mb-3">
                    <div>
                        <h5 class="mb-4 font-semibold text-black text-lg">Paciente: {{$paciente->apellido . ' ' . $paciente->nombre}}</h5>
                    </div>
                    <div class="flex justify-center items-center">
                        <div class="bg-gray-200 rounded-lg" x-data="{resultado:''}">
                            <div class="inline-flex rounded-lg">
                                <input type="radio" wire:model="resultado" x-model="resultado" :value="0" id="negativo" class="hidden peer">
                                <label for="negativo"
                                    class="radio text-center self-center py-2 px-4 rounded-lg cursor-pointer peer-checked:bg-red-500">Negativo</label>
                            </div>
                            <div class="inline-flex rounded-lg">
                                <input type="radio" wire:model="resultado" x-model="resultado" :value="1" id="positivo" class="hidden peer">
                                <label for="positivo"
                                    class="radio text-center self-center py-2 px-4 rounded-lg cursor-pointer peer-checked:bg-green-500">Positivo</label>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="flex flex-row items-center justify-end p-5 mt-3">
                    <button
                        class="px-4 mr-3 py-2 font-semibold border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400"
                        wire:click="cerrarModal()">Cancelar</button>
                    <button wire:click.prevent='editar()'
                        class="px-4 py-2 font-semibold border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Notificar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
