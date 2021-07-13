
<x-slot name="header">
    <h2 class="font-semibold text-xl text-white leading-tight">
        Cacfe's - Cartera
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
                                <i wire:click.prevent="cancelar()" title="salir de esta ventana" class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400"></i>   
                                <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Estas seguro de eliminar este elemento?</h1>
                                <div class="bg-gray-100 text-gray-900 text-xl p-2 px-4 py-3"><span>si continúas se eliminaran los datos del registro de la base de datos & no podrás recuperar la informacion una vez se complete la acción, estás de acuerdo?</span></div>
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
                            @if($crear == 'true' || $carteraEdit != '')

                            @if($carteraEdit != '')
                            <h1 class="font-bold text-black p-3 text-xl sm:text-3xl border-b-2 border-black">Editar elemento - #{{$carteraEdit->id}}</h1>
                            @else
                            <h1 class="font-bold text-black p-3 text-xl sm:text-3xl border-b-2 border-black">Añadir elemento a la
                                cartera</h1>
                            @endif

                            <form>
                                <div class="shadow overflow-hidden">
                                    <div class="px-4 py-5 bg-gray-100 sm:p-6">
                                        <div class="grid grid-cols-9 gap-6">
                                            @if($carteraEdit != '')

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="cliente"
                                                    class="block text-sm font-medium text-gray-900">Cliente</label>
                                                <select autofocus name="cliente" wire:model="cliente"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                                    <option selected value="{{$carteraEdit->cliente_id}}">
                                                        @foreach($clientes as $cli) @if($cli->id ==
                                                        $carteraEdit->cliente_id)
                                                        {{$cli->nombre}}
                                                        @endif @endforeach
                                                    </option>
                                                    @foreach($clientes as $cli)
                                                    @if($cli->id != $carteraEdit->cliente_id)
                                                    <option value="{{$cli->id}}">{{$cli->nombre}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="compra"
                                                    class="block text-sm font-medium text-gray-900">Compra</label>
                                                <input type="number" wire:model="compra" min="1"
                                                    placeholder="{{$carteraEdit->compra}}"
                                                    value="{{$carteraEdit->compra}}" name="compra" autofocus
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700 w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="pago"
                                                    class="block text-sm font-medium text-gray-900">Pago</label>
                                                <input type="number" wire:model="pago" min="1"
                                                    placeholder="{{$carteraEdit->pago}}" value="{{$carteraEdit->pago}}"
                                                    name="pago" autofocus autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700 w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            @else
                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="cliente"
                                                    class="block text-sm font-medium text-gray-900">Cliente<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <select autofocus name="cliente" wire:model="cliente"
                                                    class="bg-white focus:bg-gray-100 border-gray-700 w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                                    <option selected>Seleccione el cliente</option>
                                                    @foreach($clientes as $cli)
                                                    <option value="{{$cli->id}}">{{$cli->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="compra"
                                                    class="block text-sm font-medium text-gray-900">Compra<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="compra" name="compra"
                                                    autocomplete="off" min="1"
                                                    class="bg-white focus:bg-gray-100 border-gray-700 w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="pago"
                                                    class="block text-sm font-medium text-gray-900">Pago<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="pago" name="pago" autocomplete="off" min="1"
                                                    class="bg-white focus:bg-gray-100 border-gray-700 w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="px-4 py-3 bg-gray-200 text-right sm:px-6 border-t-2 border-black">
                                    <a href="" wire:click.prevent="cancelar()"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                                        Cancelar
                                    </a>
                                    @if($carteraEdit != '')
                                    <button type="submit" wire:click.prevent="update({{$carteraEdit->id}})"
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
                            </form>
                            @else
                            <i wire:click.prevent="crear()"
                                title="Agregar un elemento" class="bi bi-plus m-3 cursor-pointer float-right inline-flex justify-center  py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400"></i>
                            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Cartera</h1>

                            <div class="flex bg-gray-100 border-b-2 border-black px-4 py-3 sm:px-6">
                                <input wire:model="search" type="text"
                                    placeholder="Buscar Un Miembro Por : Compra - Pago"
                                    class="bg-white focus:bg-gray-100 m-3 border-gray-700 form-input mt-1 block w-full focus:border-2 block focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                <div class="m-3 form-input shadow-sm mt-1 block">
                                    <select name="perPage" wire:model="perPage"
                                        class="bg-white focus:bg-gray-100 border-gray-700 focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                        <option value="10">10 miembros por pagina</option>
                                        <option value="15">15 miembros por pagina</option>
                                        <option value="20">20 miembros por pagina</option>
                                        <option value="30">30 miembros por pagina</option>
                                        <option value="50">50 miembros por pagina</option>
                                        <option value="60">60 miembros por pagina</option>
                                        <option value="100">100 miembros por pagina</option>
                                    </select>
                                </div>
                                @if($search != '' || $perPage != 10)
                                <button wire:click.prevent="limpiarBusqueda()" title="borrar filtros de busqueda"
                                    class="m-3 form-input rounded-md shadow-sm mt-1 block w-16 text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                                    <i class="bi bi-x"></i>
                                </button>
                                @endif
                            </div>

                            @if($mensajeSuccess != '')
                            <i wire:click.prevent="hideMessage()" title="Eliminar mensaje" class="bi bi-x text-red-500 hover:text-red-300 text-2xl float-right cursor-pointer"></i>
                            <strong class="font-bold text-green-700 pl-2 text-xl">{{$mensajeSuccess}}</strong>
                            @elseif($mensajeError != '')
                            <i wire:click.prevent="hideMessage()" title="Eliminar mensaje" class="bi bi-x text-red-500 hover:text-red-300 text-2xl float-right cursor-pointer"></i>
                            <strong class="font-bold text-red-700 pl-2 text-xl">{{$mensajeError}}</strong>
                            @endif
                            <table class="min-w-full divide-y divide-black border-t-2 border-black">
                                <thead class="bg-gray-50">
                                    <tr class="text-center text-xs text-gray-900 uppercase border-l-2 border-r-2 border-b-2 border-gray-900">
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Cliente
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Compra
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Pago
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Saldo
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Estado
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
                                @foreach($cartera as $car)
                                <tbody class="bg-gray-200 text-center">
                                    <tr class="border-2 border-gray-900">
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            @foreach($clientes as $cli)
                                            @if($cli->id == $car->cliente_id)
                                            {{$cli->nombre}}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            ${{number_format($car->compra)}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            ${{number_format($car->pago)}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            ${{number_format($car->compra-$car->pago)}}
                                        </td>
                                        @if($car->compra-$car->pago <= 0)
                                        <td
                                            class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900 text-white bg-blue-400 text-center">
                                            {{ __('Al dia') }}
                                        </td>
                                        @else
                                        <td
                                            class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900 text-white bg-red-400 text-center">
                                            {{ __('Pendiente') }}
                                        </td>
                                        @endif
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            <a href="" wire:click.prevent="editar({{$car->id}})"><i
                                                    class="bi bi-pen bg-blue-400 hover:bg-blue-300 rounded text-lg text-white p-3"></i></a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            <a href="" wire:click.prevent="eliminar({{$car->id}})"><i
                                                    class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="bg-gray-100 px-4 py-3 sm:px-6">
                                {{$cartera->links()}}
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
   <title>{{ config('app.name') }} - Cartera</title>
</head>
