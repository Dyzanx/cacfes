<head>
   <title>{{ config('app.name') }} - Cartera</title>
</head>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-900 leading-tight">
        Cacfe's - Cartera
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-blue-300 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden sm:rounded-lg">
                            @if($crear == 'true' || $carteraEdit != '')

                            @if($carteraEdit != '')
                            <h1 class="font-bold text-black p-3 text-xl sm:text-3xl border-b-2 border-black">Editar Elemento -
                                #{{$carteraEdit->id}}</h1>
                            @else
                            <h1 class="font-bold text-black p-3 text-xl sm:text-3xl border-b-2 border-black">Añadir Elemento A La
                                Cartera</h1>
                            @endif

                            <form>
                                <div class="shadow overflow-hidden">
                                    <div class="px-4 py-5 bg-blue-300 sm:p-6">
                                        <div class="grid grid-cols-9 gap-6">
                                            @if($carteraEdit != '')

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="cliente"
                                                    class="block text-sm font-medium text-gray-900">Cliente</label>
                                                <select autofocus name="cliente" wire:model="cliente"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-blue-300 rounded-md form-select mt-1 block w-full">
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
                                                <input type="number" wire:model="compra"
                                                    placeholder="{{$carteraEdit->compra}}"
                                                    value="{{$carteraEdit->compra}}" name="compra" autofocus
                                                    autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm 300 rounded-md">
                                            </div>
                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="pago"
                                                    class="block text-sm font-medium text-gray-900">Pago</label>
                                                <input type="number" wire:model="pago"
                                                    placeholder="{{$carteraEdit->pago}}" value="{{$carteraEdit->pago}}"
                                                    name="pago" autofocus autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm 300 rounded-md">
                                            </div>
                                            @else
                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="cliente"
                                                    class="block text-sm font-medium text-gray-900">Cliente<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <select autofocus name="cliente" wire:model="cliente"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-blue-300 rounded-md form-select mt-1 block w-full">
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
                                                    autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>
                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="pago"
                                                    class="block text-sm font-medium text-gray-900">Pago<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="pago" name="pago" autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="px-4 py-3 bg-blue-300 text-right sm:px-6 border-t-2 border-black">
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
                                class="bi bi-plus m-3 cursor-pointer float-right inline-flex justify-center  py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400"></i>
                            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Cartera</h1>

                            <div class="flex bg-blue-300 border-b-2 border-black px-4 py-3 sm:px-6">
                                <input wire:model="search" type="text"
                                    placeholder="Buscar Un Miembro Por : Compra - Pago"
                                    class="text-gray-900 bg-green-200 focus:bg-green-300 m-3 form-input rounded-md shadow-sm mt-1 block w-full focus:ring-blue-500 focus:border-blue-500">
                                <div class="m-3 form-input shadow-sm mt-1 block">
                                    <select name="perPage" wire:model="perPage"
                                        class="bg-green-200 focus:bg-green-300 rounded-md focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-900">
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
                                <button wire:click.prevent="limpiarBusqueda()"
                                    class="m-3 form-input rounded-md shadow-sm mt-1 block w-16 text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                                    <i class="bi bi-x"></i>
                                </button>
                                @endif
                            </div>

                            @if($mensajeSuccess != '')
                            <strong class="font-bold text-green-700 pl-2">{{$mensajeSuccess}}</strong>
                            @elseif($mensajeError != '')
                            <strong class="font-bold text-red-700 pl-2">{{$mensajeError}}</strong>
                            @endif
                            <table class="min-w-full divide-y divide-black">
                                <thead class="bg-gray-50">
                                    <tr class="text-center text-xs text-white uppercase border-2 border-pink-400">
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-pink-300 border-r-2 border-pink-400 tracking-wider">
                                            Cliente
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-pink-300 border-r-2 border-pink-400  tracking-wider">
                                            Compra
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-pink-300 border-r-2 border-pink-400  tracking-wider">
                                            Pago
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-pink-300 border-r-2 border-pink-400  tracking-wider">
                                            Saldo
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-pink-300 border-r-2 border-pink-400  tracking-wider">
                                            Estado
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-pink-300 border-r-2 border-pink-400  tracking-wider">
                                            Editar
                                        </th>
                                        <th scope="col" class="px-6 py-3 font-medium bg-pink-300 tracking-wider">
                                            Borrar
                                        </th>
                                    </tr>
                                </thead>
                                @foreach($cartera as $car)
                                <tbody class="bg-pink-300 text-center">
                                    <tr class="border-2 border-pink-400">
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            @foreach($clientes as $cli)
                                            @if($cli->id == $car->cliente_id)
                                            {{$cli->nombre}}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            {{number_format($car->compra)}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            {{number_format($car->pago)}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            {{number_format($car->compra-$car->pago)}}
                                        </td>
                                        @if($car->compra-$car->pago <= 0)
                                        <td
                                            class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400 text-white bg-blue-400 text-center">
                                            {{ __('Al dia') }}
                                        </td>
                                        @else
                                        <td
                                            class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400 text-white bg-red-400 text-center">
                                            {{ __('Pendiente') }}
                                        </td>
                                        @endif
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            <a href="" wire:click.prevent="editar({{$car->id}})"><i
                                                    class="bi bi-pen bg-blue-400 hover:bg-blue-300 rounded text-lg text-white p-3"></i></a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            <a href="" wire:click.prevent="borrar({{$car->id}})"><i
                                                    class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="bg-blue-300 px-4 py-3 sm:px-6">
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