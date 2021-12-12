<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <!-- component -->
    <div class="flex justify-center h-screen items-center bg-gray-200 bg-opacity-75 antialiased">
        <div
            class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl">
            <div
                class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg">
                <p class="font-semibold text-gray-800">Modificar Logo</p>
                <svg wire:click="cerrarModalImagen()" class="w-6 h-6" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </div>
            <div class="flex flex-col px-6 py-5 bg-gray-50">
                <form enctype="multipart/form-data" wire:submit.prevent="submit" id="form-update">
                    @csrf
                    <div>
                        <div
                            class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48" aria-hidden="true">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Seleccione una imágen</span>
                                        <input id="file-upload" name="logo" type="file" class="sr-only"
                                            wire:model="logo">
                                    </label>
                                    <p class="pl-1">o arrastre al cuadro</p>
                                </div>
                                <p class="text-xs text-gray-500">
                                    PNG, JPG hasta 2MB
                                </p>
                            </div>
                        </div>
                        @error('logo') <span class="error">{{ $message }}</span> @enderror
                    </div>        
                </form>
                <div class="flex flex-row items-center justify-end p-5 mt-3">
                    <button
                        class="px-4 mr-3 py-2 font-semibold border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400"
                        wire:click="cerrarModalImagen()">Cancelar</button>
                    <button wire:click.prevent='saveLogo()'
                        class="px-4 py-2 font-semibold border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Crear
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>