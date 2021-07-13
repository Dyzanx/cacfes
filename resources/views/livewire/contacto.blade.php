<div class="rounded-md bg-gray-100 mx-5 my-5 overflow-hidden">
    <a title="contactar por instagram" target="_blank" href=""
        class="m-1 sm:m-2 text-xl float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-pink-400 hover:bg-pink-500 focus:outline-none"><i
            class="bi bi-instagram"></i></a>
    <a title="contactar a whatsapp" target="_blank"
        class="m-1 sm:m-2 text-xl float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none"
        href="https://api.whatsapp.com/send?phone=573126656455&text=Hola Carlos, tengo una duda sobre algún servicio"><i
            class="bi bi-whatsapp"></i></a>
    <h1 class="font-bold text-black text-xl p-3 sm:text-3xl border-b-2 border-black text-center sm:text-left">
        Contacto <span>- <a target="_blank"
                href="https://api.whatsapp.com/send?phone=573126656455&text=Hola Carlos, tengo una duda sobre algún servicio"
                class="text-green-400">+57 312 665 6455</a></span>
    </h1>

    <div class="grid grid-cols-12 gap-4">
        <iframe class="col-span-12 sm:col-span-6"
            src="https://www.google.com/maps/embed?pb=!4v1626056611622!6m8!1m7!1spdjl2r6tLBsdh2u_EoyEyg!2m2!1d6.206461006251886!2d-75.61208521583646!3f341.0098008241391!4f15.615138132019254!5f0.7820865974627469"
            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <div class="col-span-12 sm:col-span-6 mx-4 sm:mr-4">
            <h1
                class="font-bold text-black text-l p-1 sm:text-xl mb-2 border-b-2 border-black text-center sm:text-left">
                Contactar por correo</h1>
            <form>
                <div class="mb-2">
                    <label for="nombre" class="block font-medium text-md text-gray-900 font-bold text-center">Nombre
                        completo</label>
                    <input wire:model="nombre" type="text" name="nombre"
                        class="w-full bg-white focus:bg-gray-100 border-gray-700 focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                        autocomplete="off">
                </div>
                <div class="mb-2">
                    <label for="email"
                        class="block font-medium text-md text-gray-900 font-bold text-center">Correo</label>
                    <input wire:model="correo" type="email" name="email"
                        class="w-full bg-white focus:bg-gray-100 border-gray-700 focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                        autocomplete="off">
                </div>
                <div class="mb-2">
                    <label for="asunto"
                        class="block font-medium text-md text-gray-900 font-bold text-center">Asunto</label>
                    <input wire:model="asunto" type="text" name="asunto"
                        class="w-full bg-white focus:bg-gray-100 border-gray-700 focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                        autocomplete="off">
                </div>
                <div class="mb-2">
                    <label for="telefono"
                        class="block font-medium text-md text-gray-900 font-bold text-center">Telefono(opcional)</label>
                    <input wire:model="telefono" type="number" name="telefono"
                        class="w-full bg-white focus:bg-gray-100 border-gray-700 focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                        autocomplete="off">
                </div>
                <div>
                    <label for="mensaje" class="block font-medium text-md text-gray-900 font-bold text-center">Mensaje
                        adicional</label>
                    <textarea wire:model="mensaje" name="mensaje" cols="30" rows="5"
                        class="w-full bg-white focus:bg-gray-100 border-gray-700 focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"></textarea>
                </div>

                <button wire:click.prevent="enviarMail()"
                    class="my-4 float-right inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-800 focus:outline-none focus:border-gray-700 focus:shadow-outline-gray disabled:opacity-25 transition">
                    {{ __('Enviar') }}
                </button>

                @if($mensajeSuccess != '')
                <i wire:click.prevent="hideMessage()" title="Eliminar mensaje"
                    class="bi bi-x text-red-500 hover:text-red-300 text-2xl cursor-pointer"></i>
                <strong class="font-bold text-green-700 pl-2 text-md">{{$mensajeSuccess}}</strong>
                @elseif($mensajeError != '')
                <i wire:click.prevent="hideMessage()" title="Eliminar mensaje"
                    class="bi bi-x text-red-500 hover:text-red-300 text-xl cursor-pointer"></i>
                <strong class="-bold text-red-700 pl-2 text-md">{{$mensajeError}}</strong>
                @endif
            </form>
        </div>
    </div>
</div>

<head>
    <title>{{ config('app.name') }} - Contacto</title>
</head>