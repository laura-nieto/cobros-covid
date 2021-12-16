<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles
        @livewire('logo.colors')
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased" style="background-color:#B7E3F5;">
        <div class="min-h-screen">
            <head>
                <nav class="bg-white shadow-lg">
                    <div class="md:flex items-center justify-between py-2 px-8 md:px-12">
                        <div class="flex justify-between items-center">
                        <div class="text-2xl font-bold text-gray-800 md:text-3xl">
                                <a href="/">Covid - 19</a>
                        </div>
                            <div class="md:hidden">
                                <button type="button" class="block text-gray-800 hover:text-gray-700 focus:text-gray-700 focus:outline-none">
                                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                                        <path class="hidden" d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"/>
                                        <path d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row hidden md:block -mx-2">
                            <a href="#" class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Inicio</a>
                            <a href="#" class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Contactanos</a>
                        </div>
                    </div>
                </nav>
                <div class="flex bg-white" style="height:300px;">
                    <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
                        <div>
                            <h2 class="text-3xl font-semibold text-gray-800 md:text-4xl">Sistema para cobros de pruebas Covid</h2>
                            {{-- <p class="mt-2 text-sm text-gray-500 md:text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis commodi cum cupiditate ducimus, fugit harum id necessitatibus odio quam quasi, quibusdam rem tempora voluptates. Cumque debitis dignissimos id quam vel!</p> --}}
                            {{-- <div class="flex justify-center lg:justify-start mt-6">
                                <a class="px-4 py-3 bg-gray-900 text-gray-200 text-xs font-semibold rounded hover:bg-gray-800" href="#">Get Started</a>
                                <a class="mx-4 px-4 py-3 bg-gray-300 text-gray-900 text-xs font-semibold rounded hover:bg-gray-400" href="#">Learn More</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="hidden lg:block lg:w-1/2" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
                        <div class="h-full object-cover" style="background-image: url(https://images.unsplash.com/photo-1584036561566-baf8f5f1b144?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1632&q=80);background-size:cover;">
                            <div class="h-full bg-black opacity-25"></div>
                        </div>
                    </div>
                </div>
            </head>
            <main>
                <div class="container mx-auto py-2">
                    @if (session('error'))    
                        <div class="bg-red-200 text-red-600 my-4 py-2 flex items-center justify-center rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                            <p class="font-bold ml-3">{{session('error')}}</p>
                        </div>
                    @endif
                    <form action="{{url('busqueda')}}" method="get" class="lg:w-8/12 mx-auto">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                              <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="date" class="block text-base font-medium text-gray-700">Día</label>
                                        <input type="date" name="date" id="date" autocomplete="given-name" class="mt-1 focus:ring-indigo-200 focus:border-indigo-300 block w-full shadow-sm sm:text-base border-gray-300 rounded-md" required>
                                    </div>
                    
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="sucursal_id" class="block text-base font-medium text-gray-700">Sucursal</label>
                                        <select name="sucursal_id" id="sucursal_id" class="mt-1 focus:ring-indigo-200 focus:border-indigo-300 block w-full shadow-sm sm:text-base border-gray-300 rounded-md" required>
                                            <option selected>Seleccione una sucursal</option>
                                            @foreach ($sucursales as $sucursal)
                                                <option value="{{$sucursal->id}}">{{$sucursal->nombre}} - {{$sucursal->direccion}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="servicio_id" class="block text-base font-medium text-gray-700">Tipo de Servicio</label>
                                        <select name="servicio_id" id="servicio_id" class="mt-1 focus:ring-indigo-200 focus:border-indigo-300 block w-full shadow-sm sm:text-base border-gray-300 rounded-md" required>
                                            
                                        </select>
                                    </div>
                              </div>
                            </div>
                            <div class="px-4 py-3 sm:px-6 bg-white grid grid-cols-2">
                                @error('date')
                                    <span class="error text-red-500 mt-2">{{$message}}</span>
                                @enderror
                                <button type="submit" class="justify-self-end col-start-2 inline-flex justify-center py-2 px-4 border border-transparent shadow-base text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
                                  Buscar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
            <footer class="border-t bg-white text-gray-700 font-light text-base px-3 py-2 w-full absolute bottom-0">
                <div class="flex flex-col-reverse sm:flex-row justify-between">
                    <p class="leading-8 tracking-wide">
                        &copy; Copyright 2022. Todos los derechos reservados.
                    </p>
                    @if (Route::has('login'))
                        <div class="sm:px-6 flex justify-center items-center">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                            @endauth
                        </div>
                    @endif
                </div>
            </footer>
        </div>
        <script type="text/javascript">
            const baseURL = {!! json_encode(url('/')) !!}
        </script>
        <script src="{{asset('js/select-servicio.js')}}"></script>
    </body>
</html>
