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
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        <!-- Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        <footer class="grid grid-cols-12 gap-5 bg-gray-700 border-t border-gray-400 text-white md:pb-2">
            <div class="lg:col-span-2 col-span-6 md:col-span-3"><a href="/"><img src="{{asset('img/logo.png')}}"
                        class="lg:h-20 m-auto" alt="Cacfes logo"></a></div>
            <div class="lg:col-span-2 col-span-6 md:col-span-5 text-sm inline-flex items-center text-center mr-5 lg:mr-0">2021 Cacfe's &copy; todos
                los derechos reservados</div>
            <div class="m-auto md:col-span-4 hidden md:flex text-sm inline-flex items-center text-center md:pb-3 pb-3 lg:pb-0">
                <a href="https://api.whatsapp.com/send?phone=573025853202&text=Hola!, quiero consultar algo sobre sus servicios" target="_blank" class="mx-5 text-xl text-green-400 hover:text-green-500"><i class="bi bi-whatsapp"></i></a>
                <a href="https://www.facebook.com/profile.php?id=100070751622851" target="_blank" class="mx-5 text-xl text-blue-400 hover:text-blue-500"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/cacfes/" target="_blank" class="mx-5 text-xl text-pink-400 hover:text-pink-500"><i class="bi bi-instagram"></i></a>
            </div>
            <div class="m-auto lg:col-span-2 col-span-12 md:col-span-12 text-sm inline-flex items-center text-center">
                <p class="hover-target cursor-pointer"><i class="bi bi-caret-down-fill"></i> Centro de ayuda
                    <span
                        class="hidden-footer-section hidden absolute lg:-mt-16 bg-white border border-grey-100 px-4 py transition">
                        <span class="block p-3 hover:text-gray-600 hover:underline text-gray-900"><a
                                href="{{route('contacto')}}">Contacto</a></span>
                    </span>
                </p>
            </div>
            <div class="m-auto lg:col-span-2 col-span-12 md:col-span-12 text-sm inline-flex items-center text-center">
                <p class="hover-target cursor-pointer"><i class="bi bi-caret-down-fill"></i> Nuestra compañía
                    <span
                        class="hidden-footer-section hidden absolute -mt-38 bg-white border border-grey-100 px-4 py transition">
                        <span class="block p-3 hover:text-gray-600 hover:underline text-gray-900"><a target="_blank"
                                href="/">Cacfe's</a></span>
                        <span class="block p-3 hover:text-gray-600 hover:underline text-gray-900"><a target="_blank"
                                href="http://ingeniemos.co">Ingeniemos</a></span>
                        <span class="block p-3 hover:text-gray-600 hover:underline text-gray-900"><a target="_blank"
                                href="">Saccaci</a></span>
                    </span>
                </p>
            </div>
            <div class="m-auto md:hidden lg:col-span-4 col-span-12 text-sm inline-flex items-center text-center md:pb-3 pb-3 lg:pb-0">
                <a href="https://api.whatsapp.com/send?phone=573126656455&text=Hola Carlos, tengo una duda sobre algún servicio" target="_blank" class="mx-5 text-xl text-green-400 hover:text-green-500"><i class="bi bi-whatsapp"></i></a>
                <a href="https://www.facebook.com/profile.php?id=100070751622851" target="_blank" class="mx-5 text-xl text-blue-400 hover:text-blue-500"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/cacfes/" target="_blank" class="mx-5 text-xl text-pink-400 hover:text-pink-500"><i class="bi bi-instagram"></i></a>
            </div>
        </footer>
    </body>
</html>
