<x-slot name="header">
    <h2 class="font-semibold text-xl text-white leading-tight">
        Cacfe's - Tipos de costos
    </h2>
</x-slot>

@if(!empty($eliminar))
<div class="font-bolder p-8 h-max h-full w-full">
    <div class="py-4 sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 rounded-lg sm:rounded-lg">
                                <i wire:click.prevent="cancelar()" title="salir de esta ventana"
                                    class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400"></i>
                                <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Estas seguro de
                                    eliminar este elemento?</h1>
                                <div class="bg-gray-100 text-gray-900 text-xl p-2 px-4 py-3"><span>si continúas se
                                        eliminaran los datos del registro de la base de datos & no podrás recuperar la
                                        informacion una vez se complete la acción, estás de acuerdo?</span></div>
                                <div class="px-4 py-3 bg-gray-200 text-right sm:px-6 border-t-2 border-black">
                                    <a href="" wire:click.prevent="cancelar()"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                                        Cancelar
                                    </a>
                                    <button wire:click.prevent="borrar({{$eliminar}})" type="submit"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400">
                                        Continuar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden sm:rounded-lg">
                            @if($crear == 'true' || $tipoCostoEdit != '')
                            @if($tipoCostoEdit != '')
                            <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">Editar
                                tipo de costo -
                                #{{$tipoCostoEdit->id}}</h1>
                            @else
                            <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">Añadir
                                nuevo tipo de
                                costo</h1>
                            @endif

                            <form>
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-gray-100 sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                @if($tipoCostoEdit != '')
                                                <label for="nombre"
                                                    class="block text-sm font-medium text-gray-900">Nombre</label>
                                                <input type="text" wire:model="nombre"
                                                    value="{{$tipoCostoEdit->nombre}}" autofocus
                                                    placeholder="{{$tipoCostoEdit->nombre}}" name="nombre" id="nombre"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                                @else
                                                <label for="nombre"
                                                    class="block text-sm font-medium text-gray-900">Nombre</label>
                                                <input type="text" wire:model="nombre" name="nombre" id="nombre"
                                                    autocomplete="off" autofocus
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-t-2 border-black bg-gray-200 text-right sm:px-6">
                                        <a href="" wire:click.prevent="cancelar()"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                                            Cancelar
                                        </a>
                                        @if($tipoCostoEdit != '')
                                        <button type="submit" wire:click.prevent="update({{$tipoCostoEdit->id}})"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400">
                                            Actualizar
                                        </button>
                                        @else
                                        <button wire:click.prevent="save()" type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400">
                                            Crear
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            @else
                            <i wire:click.prevent="crear()" title="agregar elemento"
                                class="bi bi-plus m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400"></i>
                            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Tipos de costos</h1>
                            @if($mensajeSuccess != '')
                            <i wire:click.prevent="hideMessage()" title="Eliminar mensaje"
                                class="bi bi-x text-red-500 hover:text-red-300 text-2xl float-right cursor-pointer"></i>
                            <strong class="font-bold text-green-700 pl-2 text-xl">{{$mensajeSuccess}}</strong>
                            @elseif($mensajeError != '')
                            <i wire:click.prevent="hideMessage()" title="Eliminar mensaje"
                                class="bi bi-x text-red-500 hover:text-red-300 text-2xl float-right cursor-pointer"></i>
                            <strong class="font-bold text-red-700 pl-2 text-xl">{{$mensajeError}}</strong>
                            @endif
                            <table class="min-w-full divide-y divide-black border-t-2 border-black">
                                <thead class="bg-gray-500">
                                    <tr
                                        class="text-center text-xs text-gray-900 uppercase border-l-2 border-r-2 border-b-2 border-gray-900">
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Nombre
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Editar
                                        </th>
                                        <th scope="col" class="px-6 py-3 font-medium bg-gray-300 tracking-wider">
                                            Borrar
                                        </th>
                                    </tr>
                                </thead>
                                @foreach($tipoCostos as $tipo)
                                <tbody class="bg-gray-200 text-center">
                                    <tr class="border-2 border-gray-900">
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            {{ $tipo->nombre }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            <a href="" wire:click.prevent="editar({{$tipo->id}})"><i
                                                    class="bi bi-pen bg-blue-400 hover:bg-blue-300 rounded text-lg text-white p-3"></i></a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="" wire:click.prevent="eliminar({{$tipo->id}})"><i
                                                    class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="bg-geay-100 px-4 py-3 sm:px-6">
                                {{ $tipoCostos->links() }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<head>
    <title>{{ config('app.name') }} - Tipos de costo</title>
</head>