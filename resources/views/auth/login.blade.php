<head>
   <title>{{ config('app.name') }} - Iniciar Sesion</title>
</head>

<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('img/icono.png') }}" alt="Cacfe's Logo" class="w-24 rounded-full">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-gray-900">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-jet-label for="email" value="{{ __('Correo') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="off" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="off" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Mantener Sesión') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="hidden sm:block underline text-sm text-green-500 hover:text-green-400 mr-5" href="{{ route('password.request') }}">
                        {{ __('Olvide mi Contraseña') }}
                    </a>
                @endif
                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-pink-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-500 active:bg-gray-500 focus:outline-none focus:border-pink-500 focus:shadow-outline-gray disabled:opacity-25 transition">
                    Registrase
                </a>
                <x-jet-button class="ml-4">
                    {{ __('Entrar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
