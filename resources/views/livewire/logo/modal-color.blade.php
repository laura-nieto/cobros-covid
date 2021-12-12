<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <!-- component -->
    <div class="flex justify-center h-screen items-center bg-gray-200 bg-opacity-75 antialiased">
        <div
            class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl">
            <div
                class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg">
                <p class="font-semibold text-gray-800">Modificar Color</p>
                <svg wire:click="cerrarModalColor()" class="w-6 h-6" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </div>
            <div class="flex flex-col px-6 py-5 bg-gray-50">
                <div class="flex flex-row items-center">
                    <label class="text-sm font-medium text-gray-700 text-xl">
                        Seleccione Color:
                    </label>
                    <div class="w-24 h-12 ml-4">
                        <input type="color" name="color" id="color" placeholder="color"
                            class="h-full w-full bg-white border border-gray-200 rounded shadow-sm @error('color')border-red-500 @enderror" wire:model="color">
                        @error('color')
                            <span class="error text-red-500">{{$message}}</span>
                        @enderror
                    </div>            
                </div>
                <div class="flex flex-row items-center justify-end p-5 mt-3">
                    <button
                        class="px-4 mr-3 py-2 font-semibold border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400"
                        wire:click="cerrarModalColor()">Cancelar</button>
                    <button wire:click.prevent='saveColor()'
                        class="px-4 py-2 font-semibold border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Crear
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>