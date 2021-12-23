<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
        @livewire('logo.colors')
            <!-- Scripts -->
            <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100 bg-nav color-nav">
            <!-- Primary Navigation Menu -->
            <div class="mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('dashboard') }}">
                                @livewire('logo.logo-index')
                            </a>
                            <button class="mobile-menu-button p-4 focus:outline-none ml-4">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </nav>


        <!-- Page Content -->
        <main class="relative min-h-screen lg:flex bg-main color-main">
            <!-- SIDEBAR -->
            <div
                class="sidebar hidden bg-white w-full h-full lg:h-auto lg:w-72 space-y-6 bg-nav color-nav absolute lg:static z-10">
                <div class="h-32 p-10 border-b border-gray-300 flex flex-col items-center justify-center"
                    style="background-image:url({{ asset('/img/fondos/header-blue.jpg') }});background-size:cover;">

                    <h4 class="text-white text-xl font-semibold">
                        {{ Auth::user()->nombre . " " . Auth::user()->apellido }}
                    </h4>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-dropdown-link
                            class="text-white hover:bg-transparent focus:border-gray-100 focus:bg-transparent"
                            href="{{ route('logout') }}" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Cerrar Sesión') }}
                        </x-jet-dropdown-link>
                    </form>

                </div>
                <!-- NAV -->
                <nav class="px-1">
                    <div class="mb-6">
                        <ul>
                            <li
                                class="flex items-center py-2.5 px-2 mb-2 transition duration-200 rounded hover:bg-blue-600 hover:text-white {{ (request()->is('dashboard')) ? 'bg-blue-600 text-white' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                                </svg>
                                <a href="{{ route('dashboard') }}" class="ml-2 w-full">
                                    Inicio
                                </a>
                            </li>

                            @can('admin.settings')
                                <li
                                    class="flex items-center py-2.5 px-2 mb-2 transition duration-200 rounded hover:bg-blue-600 hover:text-white {{ (request()->is('themes')) ? 'bg-blue-600 text-white' : '' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="3"></circle>
                                        <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1
                                    0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0
                                    0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2
                                    2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0
                                    0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1
                                    0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0
                                    0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65
                                    0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0
                                    1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0
                                    1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2
                                    0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0
                                    1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0
                                    2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0
                                    0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65
                                    1.65 0 0 0-1.51 1z"></path>
                                    </svg>
                                    <a href="{{ route('admin.settings') }}" class="ml-2 w-full">
                                        Configuración de Página
                                    </a>
                                </li>
                            @endcan

                                <li
                                    class="flex items-center py-2.5 px-2 mb-2 transition duration-200 rounded hover:bg-blue-600 hover:text-white {{ (request()->is('calendario')) ? 'bg-blue-600 text-white' : '' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <a href="{{ route('admin.calendario.index') }}" class="ml-2 w-full">
                                        Calendario
                                    </a>
                                </li>
                        </ul>
                    </div>
                    <div>
                        <span class="flex px-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                <path fill-rule="evenodd"
                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                    clip-rule="evenodd" />
                            </svg>
                            <p>ABM</p>
                        </span>
                        <ul>
                            <li class="mb-0.5">
                                @can('admin.roles.index')
                                    <a href="{{ url('roles') }}" role="menuitem"
                                        class="block py-2.5 px-4 transition duration-200 rounded hover:bg-blue-600 hover:text-white w-full {{ (request()->is('roles')) ? 'bg-blue-600 text-white' : '' }}">Roles</a>
                                @endcan
                            </li>
                            <li class="mb-0.5">
                                @can('admin.users.index')
                                    <a href="{{ url('users') }}" role="menuitem"
                                        class="block py-2.5 px-4 transition duration-200 rounded hover:bg-blue-600 hover:text-white w-full {{ (request()->is('users')) ? 'bg-blue-600 text-white' : '' }}">Usuarios</a>
                                @endcan
                            </li>
                            <li class="mb-0.5">
                                @can('admin.servicios.index')
                                    <a href="{{ url('servicios') }}" role="menuitem"
                                        class="block py-2.5 px-4 transition duration-200 rounded hover:bg-blue-600 hover:text-white w-full {{ (request()->is('servicios')) ? 'bg-blue-600 text-white' : '' }}">Servicios</a>
                                @endcan
                            </li>
                            <li class="mb-0.5">
                                @can('admin.sucursales.index')
                                    <a href="{{ url('sucursales') }}" role="menuitem"
                                        class="block py-2.5 px-4 transition duration-200 rounded hover:bg-blue-600 hover:text-white w-full {{ (request()->is('sucursales')) ? 'bg-blue-600 text-white' : '' }}">Sucursales</a>
                                @endcan
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="lg:w-full">
                @if(isset($header))
                    <x-title-page>{{ $header }}</x-title-page>
                @endif
                {{ $slot }}
            </div>
        </main>
    </div>

    @stack('modals')

    @livewireScripts
        <script>
            const btn = document.querySelector('.mobile-menu-button');
            const sidebar = document.querySelector('.sidebar');

            btn.addEventListener('click', () => {
                sidebar.classList.toggle('hidden')
            })

        </script>
        @yield('js')

        <footer class="border-t text-gray-700 font-light text-sm px-3 py-2 w-full">
            <div>
                <p class="leading-8 tracking-wide">
                    Sistema SAIH-ERP. &copy; Copyright 2022. Todos los derechos reservados.
                </p>
            </div>
        </footer>
</body>

</html>
