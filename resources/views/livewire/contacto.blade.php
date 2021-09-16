<div class="lg:rounded-md bg-gray-100 lg:mx-5 my-5 overflow-hidden">
    <a title="contactar por instagram" target="_blank" href="https://www.instagram.com/cacfes/"
        class="contacto-redes m-1 lg:m-2 text-xl float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-pink-400 hover:bg-pink-500 focus:outline-none"><i
            class="bi bi-instagram"></i></a>
            <a title="contactar a facebook" target="_blank"
        class="contacto-redes m-1 lg:m-2 text-xl float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500 focus:outline-none"
        href="https://www.facebook.com/profile.php?id=100070751622851"><i
            class="bi bi-facebook"></i></a>
    <a title="contactar a whatsapp" target="_blank"
        class="contacto-redes m-1 lg:m-2 text-xl float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none"
        href="https://api.whatsapp.com/send?phone=573025853202&text=Hola!, quiero consultar algo sobre sus servicios"><i
            class="bi bi-whatsapp"></i></a>
    <h1 class="font-bold text-black text-xl p-3 lg:text-3xl border-b-2 border-black text-left">
        Contacto - <a target="_blank"
                href="https://api.whatsapp.com/send?phone=573025853202&text=Hola!, quiero consultar algo sobre sus servicios"
                class="text-sm lg:text-xl text-green-400">+57 302 585 3202</a>
    </h1>

    <div class="grid grid-cols-12 gap-4">
        <img class="lg:m-auto col-span-12 lg:col-span-6 md:col-span-12"
            src="{{asset('img/foto-negocio.jpeg')}}">
        <div class="col-span-12 lg:col-span-6 md:col-span-12 mx-4 lg:mr-4">
            <h1
                class="font-bold text-black text-l p-1 lg:text-xl mb-2 border-b-2 border-black text-center lg:text-left">
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
                        class="block font-medium text-md text-gray-900 font-bold text-center">Telefono</label>
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
                <strong class="font-bold text-green-700 pl-2 sm:text-sm md:text-md lg:text-md">{{$mensajeSuccess}}</strong>
                @elseif($mensajeError != '')
                <i wire:click.prevent="hideMessage()" title="Eliminar mensaje"
                    class="bi bi-x text-red-500 hover:text-red-300 text-xl cursor-pointer"></i>
                <strong class="font-bold text-red-700 pl-2 sm:text-sm md:text-md lg:text-md">{{$mensajeError}}</strong>
                @endif
            </form>
        </div>
    </div>
</div>

<head>
    <title>{{ config('app.name') }} - Contacto</title>
</head>