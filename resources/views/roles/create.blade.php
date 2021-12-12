<x-app-layout>
    <div class="py-12 flex-1 p-10">
        <x-slot name="header">
            {{ __('Crear Rol') }}
        </x-slot>
        <x-seccion>
            <form action="{{ route('admin.roles.store') }}" method="post">
                @csrf
                <div class="overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Rol</label>
                                <input type="text" name="name" id="name" placeholder="Ingrese el nombre del Rol"
                                    autocomplete="given-name" value="{{ old('title') }}"
                                    class="mt-1 mb-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('name') border-red-400 ring-red-400 @enderror">
                                @error('name')
                                    <span class="text-red-500">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="px-4 pt-2 pb-5 bg-white sm:px-6">
                        <fieldset>
                            <legend class="text-base font-medium text-gray-900">Permisos</legend>
                            <div class="mt-4 grid grid-cols-3 md:grid-cols-6 gap-6">
                                @foreach($permisos as $permiso)
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="{{$permiso->id}}" name="permiso[]" type="checkbox" value="{{$permiso->id}}"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="{{$permiso->id}}" class="font-medium text-gray-700">{{$permiso->description}}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </fieldset>
                    </div>
                    <div class="px-4 py-4 text-right bg-white sm:px-6">
                        <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Crear
                        </button>
                    </div>
                </div>
            </form>
        </x-seccion>
    </div>
</x-app-layout>
