<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.css">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    
    
    @livewireScripts

</head>

<body class="font-sans antialiased bg-yellow-100">

    <x-jet-banner />

    <div class="min-h-screen bg-white">
        @livewire('navigation-menu')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-gray-600 shadow">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        <footer class="grid grid-cols-12 gap-5 bg-gray-700 border-t border-gray-400 text-white">
            <div class="sm:col-span-2 col-span-6"><a href="/"><img src="{{asset('img/logo.png')}}" class="sm:h-20 m-auto" alt="Cacfes logo"></a></div>
            <div class="sm:col-span-2 col-span-6 text-sm inline-flex items-center text-center">2021 Cacfe's &copy; todos los derechos reservados</div>
            <div class="m-auto sm:col-span-2 col-span-12 text-sm inline-flex items-center text-center">
                <p class="hover-target cursor-pointer"><i class="bi bi-caret-down-fill"></i> Centro de ayuda
                    <span class="hidden-footer-section hidden absolute sm:-mt-16 bg-white border border-grey-100 px-4 py transition">
                        <span class="block p-3 hover:text-gray-600 hover:underline text-gray-900"><a href="">Contacto</a></span>
                    </span>
                </p>
            </div>
            <div class="m-auto sm:col-span-2 col-span-12 text-sm inline-flex items-center text-center">
                <p class="hover-target cursor-pointer"><i class="bi bi-caret-down-fill"></i> Nuestra compañía
                    <span class="hidden-footer-section hidden absolute -mt-38 bg-white border border-grey-100 px-4 py transition">
                        <span class="block p-3 hover:text-gray-600 hover:underline text-gray-900"><a target="_blank" href="/">Cacfe's</a></span>
                        <span class="block p-3 hover:text-gray-600 hover:underline text-gray-900"><a target="_blank" href="https://ingeniemos.site">Ingeniemos</a></span>
                        <span class="block p-3 hover:text-gray-600 hover:underline text-gray-900"><a target="_blank" href="">Saccaci</a></span>
                    </span>
                </p>
            </div>
        </footer>
    </div>
    
    @stack('modals')
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
</body>
</html>