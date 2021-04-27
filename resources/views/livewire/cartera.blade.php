<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cacfes - Cartera') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    @if($crear == 'true' || $carteraEdit != '')
                    @if($carteraEdit != '')
                    <h1 class="font-bold text-black p-3 text-3xl">Editar Elemento - #{{$carteraEdit->id}}</h1>
                    @else
                    <h1 class="font-bold text-black p-3 text-3xl">Añadir Elemento A La Cartera</h1>
                    @endif

                    <form>
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-9 gap-6">
                                        @if($carteraEdit != '')
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cliente" class="block text-sm font-medium text-gray-700">Cliente</label>
                                                <select autofocus name="cliente" wire:model="cliente" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                    <option selected value="{{$carteraEdit->cliente_id}}">
                                                        @foreach($clientes as $cli) @if($cli->id == $carteraEdit->cliente_id)
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
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="compra" class="block text-sm font-medium text-gray-700">Compra</label>
                                                <input type="number" wire:model="compra" placeholder="{{$carteraEdit->compra}}" value="{{$carteraEdit->compra}}" name="compra" autofocus autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="pago" class="block text-sm font-medium text-gray-700">Pago</label>
                                                <input type="number" wire:model="pago" placeholder="{{$carteraEdit->pago}}" value="{{$carteraEdit->pago}}" name="pago" autofocus autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="saldo" class="block text-sm font-medium text-gray-700">Saldo</label>
                                                <input type="number" wire:model="saldo" placeholder="{{$carteraEdit->saldo}}" value="{{$carteraEdit->saldo}}" name="saldo" autofocus autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
                                                <select name="estado" wire:model="estado" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                    <option selected>{{$carteraEdit->estado}}</option>
                                                    @if($carteraEdit->estado == "al dia")
                                                        <option value="Pendiente">Pendiente</option>
                                                    @elseif($carteraEdit->estado == "Pendiente")
                                                        <option value="al dia">Al Dia</option>
                                                    @endif
                                                </select>
                                            </div>
                                        @else
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cliente" class="block text-sm font-medium text-gray-700">Cliente<span class="text-red-400 font-bold"> *</span></label>
                                                <select autofocus name="cliente" wire:model="cliente" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                    <option selected>Seleccione el cliente</option>
                                                    @foreach($clientes as $cli)
                                                        <option value="{{$cli->id}}">{{$cli->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="compra" class="block text-sm font-medium text-gray-700">Compra<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="compra" name="compra" autofocus autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="pago" class="block text-sm font-medium text-gray-700">Pago<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="pago" name="pago" autofocus autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="saldo" class="block text-sm font-medium text-gray-700">Saldo<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="saldo" name="saldo" autofocus autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="estado" class="block text-sm font-medium text-gray-700">Estado<span class="text-red-400 font-bold"> *</span></label>
                                                <select name="estado" wire:model="estado" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                    <option selected>Seleccione el estado</option>
                                                    <option value="Pendiente">Pendiente</option>
                                                    <option value="al dia">Al Dia</option>
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                <a href="" wire:click.prevent="cancelar()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400">
                                    Cancelar
                                </a>
                                @if($carteraEdit != '')
                                    <button type="submit" wire:click.prevent="update({{$carteraEdit->id}})" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400">
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
                    <i wire:click.prevent="crear()" class="bi bi-plus m-3 cursor-pointer float-right inline-flex justify-center  py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400"></i>
                    <h1 class="font-bold text-black p-3 text-3xl">Cartera</h1>
                    <hr>
                    <div class="flex bg-white px-4 py-3 border-t border-gray-200 sm:px-6 pr-">
                        <input wire:model="search" type="text" 
                        placeholder="Buscar Un Miembro Por : Compra - Pago - Saldo" 
                        class="m-3 form-input rounded-md shadow-sm mt-1 block w-full focus:ring-green-400 focus:border-green-400">
                            <div class="m-3 form-input shadow-sm mt-1 block">
                                <select name="perPage" wire:model="perPage" class="rounded-md focus:ring-green-400 focus:border-green-400 outline-none text-gray-500">
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
                            <button wire:click.prevent="limpiarBusqueda()" class="m-3 form-input rounded-md shadow-sm mt-1 block w-16 text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400">
                                <i class="bi bi-x"></i>
                            </button>
                            @endif
                        </div>
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
                                    Cliente
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Compra
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pago
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Saldo
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Estado
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Editar
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Borrar
                                </th>
                            </tr>
                        </thead>
                        @foreach($cartera as $car)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{$car->id}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @foreach($clientes as $cli)
                                            @if($cli->id == $car->cliente_id)
                                                {{$cli->nombre}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{$car->compra}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{$car->pago}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{$car->saldo}}
                                    </td>
                                    @if($car->estado == 'Pendiente')
                                    <td class="px-6 py-4 whitespace-nowrap text-white bg-red-400 text-center">
                                        {{$car->estado}}
                                    </td>
                                    @elseif($car->estado == 'al dia')
                                    <td class="px-6 py-4 whitespace-nowrap text-white bg-blue-400 text-center">
                                        {{$car->estado}}
                                    </td>
                                    @endif
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="" wire:click.prevent="editar({{$car->id}})"><i class="bi bi-pen bg-blue-400 hover:bg-blue-300 rounded text-lg text-white p-3"></i></a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="" wire:click.prevent="borrar({{$car->id}})"><i class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                        @endif
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            {{$cartera->links()}}
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>