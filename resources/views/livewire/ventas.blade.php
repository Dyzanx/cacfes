    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cacfes - Ventas') }}
        </h2>
    </x-slot>

    @if($ventaDetalle && $pagoDetalle && $obDetalle || $obDetalle)
        <div class="modal-container font-bolder p-8 h-max absolute h-full w-full">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <i wire:click.prevent="cancelarDetalles()" class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400"></i>
                                        @if($ventaDetalle && $pagoDetalle && $obDetalle)
                                            <h1 class="font-bold text-black p-3 text-3xl">Detalles de la factura : {{$ventaDetalle->factura}}</h1>
                                        @elseif($obDetalle)
                                            <h1 class="font-bold text-black p-3 text-3xl">Observación de la factura : {{$obDetalle->factura}}</h1>
                                        @endif
                                        <hr>
                                        @if($ventaDetalle && $pagoDetalle && $obDetalle)
                                        <ul class="p-5">
                                            <li>Cliente : @foreach($clientes as $cli) @if($cli->id == $ventaDetalle->cliente_id)
                                                {{$cli->nombre}}
                                             @endif @endforeach</li>
                                            <li>Categoria : @foreach($categorias as $cat) @if($cat->id == $ventaDetalle->categoria_id)
                                                {{$cli->nombre}}
                                             @endif @endforeach</li>
                                            <li>Cantidad : {{number_format($ventaDetalle->cantidad)}}</li>
                                            <li>Precio : {{number_format($ventaDetalle->precio)}}</li>
                                            <li>Valor : {{number_format($ventaDetalle->precio*$ventaDetalle->cantidad)}}</li>
                                            <li>Fecha De Venta : {{$ventaDetalle->fecha_venta}}</li>
                                            <li>Fecha De Pago : {{$pagoDetalle->fecha_pago}}</li>
                                            <li>Pago Del Cliente : {{$ventaDetalle->pago_cliente}}</li>
                                            <li>Iva : {{$general->iva}}%</li>
                                            <li>Valor Iva : {{number_format(($ventaDetalle->precio*$ventaDetalle->cantidad)*$general->iva/100)}}</li>
                                            @if(!empty($obDetalle->nota))
                                                <li>Observacion : {{$obDetalle->nota}}</li>
                                            @else
                                                <li>Observacion : .....</li>
                                            @endif
                                        </ul>
                                        @elseif($obDetalle)
                                            <form class="p-6">
                                                <textarea wire:model="notaDetalle" name="notaOb" cols="30" rows="6" placeholder="{{$obDetalle->nota}}" value="{{$obDetalle->nota}}"
                                                class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>

                                                <div class="px-4 py-3 text-right sm:px-6">
                                                    <a href="" wire:click.prevent="cancelarDetalles()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400">
                                                        Cancelar</a>
                                                    <button wire:click.prevent="saveDetalleNota('{{$obDetalle->factura}}')" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400">
                                                        Cambiar</button>
                                                </div>
                                            </form>
                                        @endif
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
                    @if($ventaEdit != '' || $crear == 'true')
                        @if($crear != '')
                            <h1 class="font-bold text-black p-3 text-3xl">Crear Nueva Venta</h1>
                        @elseif($ventaEdit != '')
                            <h1 class="font-bold text-black p-3 text-3xl">Editar Venta - </h1>
                        @endif
                        <hr>
                        <form>  
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-12 gap-6">
                                        @if($ventaEdit != '')
                                        <div class="col-span-6 sm:col-span-3">
                                                <label for="cliente" class="block text-sm font-medium text-gray-700">Cliente<span class="text-red-400 font-bold"> *</span></label>
                                                <select name="cliente" wire:model="cliente" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                    <option selected>Seleccione el cliente</option>
                                                    @foreach($clientes as $cli)
                                                        <option value="{{$cli->id}}">{{$cli->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria<span class="text-red-400 font-bold"> *</span></label>
                                                <select name="categoria" wire:model="categoria" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                    <option selected>Seleccione La Categoria</option>
                                                    @foreach($categorias as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha De Venta<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="date" wire:model="fecha" name="fecha" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fechaPago" class="block text-sm font-medium text-gray-700">Fecha De Pago<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="date" wire:model="fechaPago" name="fechaPago" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="factura" class="block text-sm font-medium text-gray-700">Factura<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="factura" name="factura" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="cantidad" name="cantidad" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="precio" class="block text-sm font-medium text-gray-700">Precio<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="precio" name="precio" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="pagoCliente" class="block text-sm font-medium text-gray-700">Pago Del Cliente<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="pagoCliente" name="pagoCliente" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-12 sm:col-span-12">
                                                <label for="notaOb" class="block text-sm font-medium text-gray-700">Observación</label>
                                                <textarea wire:model="notaOb" name="notaOb" cols="30" rows="6" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                            </div>
                                        @else
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cliente" class="block text-sm font-medium text-gray-700">Cliente<span class="text-red-400 font-bold"> *</span></label>
                                                <select name="cliente" wire:model="cliente" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                    <option selected>Seleccione el cliente</option>
                                                    @foreach($clientes as $cli)
                                                        <option value="{{$cli->id}}">{{$cli->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria<span class="text-red-400 font-bold"> *</span></label>
                                                <select name="categoria" wire:model="categoria" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                    <option selected>Seleccione La Categoria</option>
                                                    @foreach($categorias as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha De Venta<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="date" wire:model="fecha" name="fecha" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fechaPago" class="block text-sm font-medium text-gray-700">Fecha De Pago<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="date" wire:model="fechaPago" name="fechaPago" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="factura" class="block text-sm font-medium text-gray-700">Factura<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="factura" name="factura" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="cantidad" name="cantidad" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="precio" class="block text-sm font-medium text-gray-700">Precio<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="precio" name="precio" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="pagoCliente" class="block text-sm font-medium text-gray-700">Pago Del Cliente<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="pagoCliente" name="pagoCliente" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>

                                            <div class="col-span-12 sm:col-span-12">
                                                <label for="notaOb" class="block text-sm font-medium text-gray-700">Observación</label>
                                                <textarea wire:model="notaOb" name="notaOb" cols="30" rows="6" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <a href="" wire:click.prevent="cancelar()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400">
                                        Cancelar
                                    </a>
                                    @if($ventaEdit != '')
                                    <button type="submit" wire:click.prevent="update({{$ventaEdit->factura}})" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400">
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
                        <i wire:click.prevent="crear()" class="bi bi-wallet2 m-3 cursor-pointer float-right inline-flex justify-center  py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400"></i>
                        <h1 class="font-bold text-black p-3 text-3xl">Ventas</h1>
                        <hr>
                        <div class="flex bg-white px-4 py-3 border-t border-gray-200 sm:px-6 pr-">
                            <input wire:model="search" type="text" 
                            placeholder="Busqueda De Venta Por Factura" class="m-3 form-input rounded-md shadow-sm mt-1 block w-full focus:ring-green-400 focus:border-green-400">
                            <div class="m-3 form-input shadow-sm mt-1 block">
                                <select name="perPage" wire:model="perPage" class="rounded-md focus:ring-green-400 focus:border-green-400 outline-none text-gray-500">
                                    <option value="10">10 Ventas por pagina</option>
                                    <option value="15">15 Ventas por pagina</option>
                                    <option value="20">20 Ventas por pagina</option>
                                    <option value="30">30 Ventas por pagina</option>
                                    <option value="50">50 Ventas por pagina</option>
                                    <option value="60">60 Ventas por pagina</option>
                                    <option value="100">100 Ventas por pagina</option>
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
                            <hr>
                        @elseif($mensajeError != '')
                            <strong class="font-bold text-red-700 pl-2">{{$mensajeError}}</strong>
                            <hr>
                        @endif
                        <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Factura
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Cliente
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Categoria
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Valor
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tardanza
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Iva
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Editar
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Detalles
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nota
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Borrar
                                </th>
                            </tr>
                        </thead>
                        @foreach($ventas as $venta)
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$venta->factura}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @foreach($clientes as $cli)    
                                    @if($cli->id == $venta->cliente_id)
                                        {{$cli->nombre}}
                                    @endif
                                @endforeach
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @foreach($categorias as $cat)    
                                    @if($cat->id == $venta->categoria_id)
                                        {{$cat->nombre}}
                                    @endif
                                @endforeach
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{substr(number_format($venta->precio*$venta->cantidad), 0, 7)}}...$
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{date_diff($venta->fecha_venta, date()))}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{substr(number_format(($venta->precio*$venta->cantidad)*$general->iva/100), 0, 7)}}...$
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="" wire:click.prevent="editar('{{$venta->factura}}')">
                                    <i class="bi bi-pen bg-blue-500 hover:bg-blue-400 rounded text-lg text-white p-3"></i>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="" wire:click.prevent="detalles('{{$venta->factura}}')">
                                    <i class="bi bi-box-arrow-up-right bg-purple-600 hover:bg-purple-400 rounded text-lg text-white p-3"></i>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="">
                                    <i wire:click.prevent="detallesNota('{{$venta->factura}}')"  class="bi bi-card-checklist bg-yellow-400 hover:bg-yellow-200 rounded text-lg text-white p-3"></i>
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="" wire:click.prevent="borrar('{{$venta->factura}}')"><i class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                            </td>
                            </tr>
                        </tbody>
                        @endforeach
                            </table>
                    @endif
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            {{$ventas->links()}}
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>