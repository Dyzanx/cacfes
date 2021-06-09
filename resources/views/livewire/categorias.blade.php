<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-900 leading-tight">
        Cacfe's - Categorias
    </h2>
</x-slot>

@if(!empty($coste))
<div class="modal-container font-bolder p-4 sm:p-8 h-max absolute h-full w-full">
    <div class="py-6 sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-300 overflow-hidden shadow-xl rounded-lg sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden sm:rounded-lg">
                                <i wire:click.prevent="cancelarCoste()"
                                    class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400"></i>
                                <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">Coste De La
                                    Categoria :
                                    @foreach($categorias as $cat)
                                    @if($cat->id == $costeCatId) {{$cat->nombre}} @endif @endforeach</h1>
                                <ul class="p-2 sm:p-5 font-bold">
                                    @foreach($coste as $co)
                                    <li>-Factura : {{$co->factura}} - Precio :
                                        {{number_format($co->precio*$co->cantidad)}}</li>
                                    @endforeach
                                </ul>

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
        <div class="bg-blue-300 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden sm:rounded-lg">
                            @if($crear == 'true' || $categoriaEdit != '')
                            @if($categoriaEdit != '')
                            <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">Categoria -
                                {{$categoriaEdit->nombre}}</h1>
                            @else
                            <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">Añadir Nueva Categoria
                            </h1>
                            @endif

                            <form>
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-blue-300 sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                @if($categoriaEdit != '')
                                                <label for="nombre"
                                                    class="block text-sm font-medium text-gray-900">Nombre</label>
                                                <input type="text" wire:model="nombre"
                                                    value="{{$categoriaEdit->nombre}}"
                                                    placeholder="{{$categoriaEdit->nombre}}" name="nombre" id="nombre"
                                                    autofocus autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                                @else
                                                <label for="nombre"
                                                    class="block text-sm font-medium text-gray-900">Nombre</label>
                                                <input type="text" wire:model="nombre" name="nombre" id="nombre"
                                                    autofocus autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border-t-2 border-black px-4 py-3 bg-blue-300 text-right sm:px-6">
                                        <a href="" wire:click.prevent="cancelar()"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                                            Cancelar
                                        </a>
                                        @if($categoriaEdit != '')
                                        <button type="submit" wire:click.prevent="update({{$categoriaEdit->id}})"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 sfocus:ring-green-400">
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
                                class="bi bi-folder-plus m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400"></i>
                            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Categorias</h1>
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
                                                Coste
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
                                    @foreach($categorias as $cat)
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr class="text-center bg-pink-300 border-2 border-pink-400">
                                            <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                                {{ $cat->nombre }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                                <a href="" wire:click.prevent="coste({{$cat->id}})"><i
                                                        class="bi bi-cash bg-purple-500 hover:bg-purple-300 rounded text-lg text-white p-3"></i></a>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                                <a href="" wire:click.prevent="editar({{$cat->id}})"><i
                                                        class="bi bi-pen bg-blue-400 hover:bg-blue-300 rounded text-lg text-white p-3"></i></a>
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                                <a href="" wire:click.prevent="borrar({{$cat->id}})"><i
                                                        class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                                <div class="bg-blue-300 px-4 py-3 sm:px-6">
                                    {{ $categorias->links() }}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>