<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <!-- component -->
    <div class="flex justify-center h-screen items-center bg-gray-200 bg-opacity-75 antialiased">
        <div
            class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl">
            <div
                class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg">
                <p class="font-semibold text-gray-800">Editar Paciente</p>
                <svg wire:click="cerrarModal()" class="w-6 h-6" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </div>
            <div class="flex flex-col px-6 py-5 bg-gray-50">
                <form action="" method="post" class="mb-3">
                    <div class="flex flex-col">
                        <label class="mb-2 mt-5 font-semibold text-gray-700" for="apellido">Apellido</label>
                        <input type="text" name="apellido" id="apellido" placeholder="Ingrese un apellido"
                            class="bg-white border border-gray-200 rounded shadow-sm @error('apellido')border-red-500 @enderror" wire:model="apellido">
                        @error('apellido')
                            <span class="error text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 mt-5 font-semibold text-gray-700" for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Ingrese un nombre"
                            class="bg-white border border-gray-200 rounded shadow-sm @error('nombre')border-red-500 @enderror" wire:model="nombre">
                        @error('nombre')
                            <span class="error text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="sexo" class="block mt-5 text-sm font-medium text-gray-700 text-base">Sexo</label>
                        <select wire:model="sexo" name="sexo" id="sexo" class="mt-1 focus:ring-indigo-200 focus:border-indigo-300 block w-full shadow-sm sm:text-base border-gray-300 rounded-md @error('sexo')border-red-500 @enderror" required>
                            <option selected>Seleccione una opción</option>
                            <option value="femenino">Femenino</option>
                            <option value="masculino">Masculino</option>
                        </select>
                        @error('sexo')
                            <span class="error text-red-500 mt-2">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 mt-5 font-semibold text-gray-700" for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Ingrese una fecha de nacimiento"
                            class="bg-white border border-gray-200 rounded shadow-sm @error('fecha_nacimiento')border-red-500 @enderror" wire:model="fecha_nacimiento">
                        @error('fecha_nacimiento')
                            <span class="error text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label class="mb-2 mt-5 font-semibold text-gray-700" for="telefono">Teléfono</label>
                        <input type="number" name="telefono" id="telefono" placeholder="Ingrese una fecha de nacimiento"
                            class="bg-white border border-gray-200 rounded shadow-sm @error('telefono')border-red-500 @enderror" wire:model="telefono">
                        @error('telefono')
                            <span class="error text-red-500">{{$message}}</span>
                        @enderror
                    </div>  
                    <div class="flex flex-col">
                        <label class="mb-2 mt-5 font-semibold text-gray-700" for="email">Correo Electrónico</label>
                        <input type="email" name="email" id="email" placeholder="Ingrese un correo electrónico"
                            class="bg-white border border-gray-200 rounded shadow-sm @error('email')border-red-500 @enderror" wire:model="email">
                        @error('email')
                            <span class="error text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                </form>
                <div class="flex flex-row items-center justify-end p-5 mt-3">
                    <button
                        class="px-4 mr-3 py-2 font-semibold border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400"
                        wire:click="cerrarModal()">Cancelar</button>
                    <button wire:click.prevent='editar()'
                        class="px-4 py-2 font-semibold border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Editar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
