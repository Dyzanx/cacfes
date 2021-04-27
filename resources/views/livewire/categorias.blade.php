<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cacfes - Categorias') }}
        </h2>
    </x-slot>

    @if(!empty($coste))
        <div class="modal-container font-bolder p-8 h-max absolute h-full w-full">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <i wire:click.prevent="cancelarCoste()" class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400"></i>
                                        <h1 class="font-bold text-black p-3 text-3xl">Coste De La Categoria : @foreach($categorias as $cat)
                                        @if($cat->id == $costeCatId) {{$cat->nombre}} @endif @endforeach</h1>
                                        <hr>
                                        <ul class="p-5 font-bold">
                                            @foreach($coste as $co)
                                                <li class="text-3x1">-Factura : {{$co->factura}} - Precio : {{number_format($co->precio*$co->cantidad)}}</li>
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
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    @if($crear == 'true' || $categoriaEdit != '')
                    @if($categoriaEdit != '')
                    <h1 class="font-bold text-black p-3 text-3xl">Categoria - {{$categoriaEdit->nombre}}</h1>
                    @else
                    <h1 class="font-bold text-black p-3 text-3xl">Añadir Nueva Categoria</h1>
                    @endif

                    <form>
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    @if($categoriaEdit != '')
                                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                                    <input type="text" wire:model="nombre" value="{{$categoriaEdit->nombre}}" placeholder="{{$categoriaEdit->nombre}}" name="nombre" id="nombre" autofocus autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @else
                                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                                    <input type="text" wire:model="nombre" name="nombre" id="nombre" autofocus autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @endif
                                </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <a href="" wire:click.prevent="cancelar()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400">
                                    Cancelar
                                </a>
                                @if($categoriaEdit != '')
                                <button type="submit" wire:click.prevent="update({{$categoriaEdit->id}})" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400">
                                    Actualizar
                                </button>
                                @else
                                <button wire:click.prevent="save()" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400">
                                    Crear
                                </button>
                                @endif
                            </div>
                        </div>
                    </form>
                    @else 
                    <i wire:click.prevent="crear()" class="bi bi-folder-plus m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400"></i>     
                    <h1 class="font-bold text-black p-3 text-3xl">Categorias</h1>
                    <hr>
                    @if($mensajeSuccess != '')
                        <strong class="font-bold text-green-700 pl-2">{{$mensajeSuccess}}</strong>
                    @elseif($mensajeError != '')
                        <strong class="font-bold text-red-700 pl-2">{{$mensajeError}}</strong>
                    @endif
                    <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Coste
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Editar
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Borrar
                        </th>
                        </tr>
                    </thead>
                    @foreach($categorias as $cat)
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$cat->id}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $cat->nombre }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="" wire:click.prevent="coste({{$cat->id}})"><i class="bi bi-cash bg-purple-500 hover:bg-purple-300 rounded text-lg text-white p-3"></i></a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="" wire:click.prevent="editar({{$cat->id}})"><i class="bi bi-pen bg-blue-400 hover:bg-blue-300 rounded text-lg text-white p-3"></i></a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="" wire:click.prevent="borrar({{$cat->id}})"><i class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                        </table>
                        @endif
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>