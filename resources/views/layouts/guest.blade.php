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
                            <a href="/">Brand</a>
                        </div>
                        <div class="md:hidden">
                            <button type="button"
                                class="block text-gray-800 hover:text-gray-700 focus:text-gray-700 focus:outline-none">
                                <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                                    <path class="hidden"
                                        d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z" />
                                    <path
                                        d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row hidden md:block -mx-2">
                        <a href="/"
                            class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Inicio</a>
                        <a href="#"
                            class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Contactanos</a>
                    </div>
                </div>
            </nav>
        </head>
        <main>
            <div class="container mx-auto pt-4">
                {{ $slot }}
            </div>
        </main>
        <footer class="border-t bg-white text-gray-700 font-light text-sm px-3 py-2 w-full absolute bottom-0">
            <div class="flex flex-col-reverse sm:flex-row justify-between">
                <p class="leading-8 tracking-wide">
                    &copy; Copyright 2022. Todos los derechos reservados.
                </p>
                @if(Route::has('login'))
                    <div class="sm:px-6 flex justify-center items-center">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                        @endauth
                    </div>
                @endif
            </div>
        </footer>
    </div>

    @yield('js')
</body>

</html>
