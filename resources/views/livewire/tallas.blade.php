<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-900 leading-tight">
        Cacfe's - Tallas
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-blue-300 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden sm:rounded-lg">
                            @if($crear == 'true' || $tallaEdit != '')
                            @if($tallaEdit != '')
                            <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">Editar Talla -
                                <span class="uppercase">{{$tallaEdit->nombre}}</span></h1>
                            @else
                            <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">Agregar Nueva Talla</h1>
                            @endif

                            <form>
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-blue-300 sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                @if($tallaEdit != '')
                                                <label for="nombre"
                                                    class="block text-sm font-medium text-gray-700">Nombre</label>
                                                <input type="text" wire:model="nombre"
                                                    value="{{$tallaEdit->nombre}}" autofocus
                                                    placeholder="{{$tallaEdit->nombre}}" name="nombre" id="nombre" autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                                @else
                                                <label for="nombre"
                                                    class="block text-sm font-medium text-gray-700">Nombre</label>
                                                <input type="text" wire:model="nombre" name="nombre" id="nombre"
                                                    autocomplete="off" autofocus
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 border-t-2 border-black bg-blue-300 text-right sm:px-6">
                                        <a href="" wire:click.prevent="cancelar()"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                                            Cancelar
                                        </a>
                                        @if($tallaEdit != '')
                                        <button type="submit" wire:click.prevent="update({{$tallaEdit->id}})"
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
                            <i wire:click.prevent="crear()"
                                class="bi bi-plus m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400"></i>
                            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Tallas</h1>
                            @if($mensajeSuccess != '')
                            <strong class="font-bold text-green-700 pl-2">{{$mensajeSuccess}}</strong>
                            @elseif($mensajeError != '')
                            <strong class="font-bold text-red-700 pl-2">{{$mensajeError}}</strong>
                            @endif
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-pink-300">
                                    <tr class="text-center text-white uppercase border-2 border-pink-400">
                                        <th scope="col"
                                            class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                            Nombre
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                            Editar
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                            Borrar
                                        </th>
                                    </tr>
                                </thead>
                                @foreach($tallas as $ta)
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="text-center bg-pink-300 border-2 border-pink-400">
                                        <td class="uppercase px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            {{ $ta->nombre }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            <a href="" wire:click.prevent="editar({{$ta->id}})"><i
                                                    class="bi bi-pen bg-blue-400 hover:bg-blue-300 rounded text-lg text-white p-3"></i></a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            <a href="" wire:click.prevent="borrar({{$ta->id}})"><i
                                                    class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>