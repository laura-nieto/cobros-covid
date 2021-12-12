<x-guest-layout>
    <form action="" method="post">
        @csrf
        <div class="shadow overflow-hidden sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="mb-6">
                    <h3 class="text-xl font-medium">Datos del paciente</h3>
                </div>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label for="lastname" class="block text-base font-medium text-gray-700">Apellido</label>
                        <input type="text" name="lastname" id="lastname" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-base border-gray-300 rounded-md @error('lastname')border-red-500 @enderror" required>
                        @error('lastname')
                            <span class="error text-red-500 mt-2">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="name" class="block text-base font-medium text-gray-700">Nombre</label>
                        <input type="text" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-base border-gray-300 rounded-md @error('name')border-red-500 @enderror" required>
                        @error('name')
                            <span class="error text-red-500 mt-2">{{$message}}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="fecha_nacimiento" class="block text-base font-medium text-gray-700">Fecha de Nacimiento</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-base border-gray-300 rounded-md @error('fecha_nacimiento')border-red-500 @enderror" required>
                        @error('fecha_nacimiento')
                            <span class="error text-red-500 mt-2">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="sexo" class="block text-sm font-medium text-gray-700 text-base">Sexo</label>
                        <select name="sexo" id="sexo" class="mt-1 focus:ring-indigo-200 focus:border-indigo-300 block w-full shadow-sm sm:text-base border-gray-300 rounded-md @error('sexo')border-red-500 @enderror" required>
                            <option selected>Seleccione una opción</option>
                            <option value="femenino">Femenino</option>
                            <option value="masculino">Masculino</option>
                        </select>
                        @error('sexo')
                            <span class="error text-red-500 mt-2">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="block text-base font-medium text-gray-700">Teléfono</label>
                        <input type="text" name="phone" id="phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-base border-gray-300 rounded-md @error('phone')border-red-500 @enderror" required>
                        @error('phone')
                            <span class="error text-red-500 mt-2">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-base font-medium text-gray-700">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-base border-gray-300 rounded-md @error('email')border-red-500 @enderror" required>
                        @error('email')
                            <span class="error text-red-500 mt-2">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="px-4 py-3 text-right sm:px-6 bg-white">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
                  Siguiente
                </button>
            </div>
        </div>
    </form>
</x-guest-layout>