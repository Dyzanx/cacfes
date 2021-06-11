<head>
    <title>{{ config('app.name') }} - Ventas</title>
</head>



<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Cacfe's - Ventas
    </h2>
</x-slot>

@if($ventaDetalle && $pagoDetalle && $obDetalle || $obDetalle)
<div class="modal-container font-bolder p-8 h-max absolute h-full w-full">
    <div class="py-4 sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-300 overflow-hidden shadow-xl rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden sm:rounded-lg font-bold">
                                <i wire:click.prevent="cancelarDetalles()"
                                    class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400"></i>
                                <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Detalles de la
                                    venta, Factura :
                                    {{$ventaDetalle->factura}}</h1>
                                <ul class="p-5">
                                    <li>Factura : {{ $ventaDetalle->factura }}</li>
                                    <li>Cliente : @foreach($clientes as $cli) @if($cli->id ==
                                        $ventaDetalle->cliente_id)
                                        {{$cli->nombre}}
                                        @endif @endforeach</li>
                                    <li>Categoria : @foreach($categorias as $cat) @if($cat->id ==
                                        $ventaDetalle->categoria_id)
                                        {{$cli->nombre}}
                                        @endif @endforeach</li>
                                    <li>Cantidad : {{number_format($ventaDetalle->cantidad)}}</li>
                                    <li>Precio : {{number_format($ventaDetalle->precio)}}</li>
                                    <li>Valor : {{number_format($ventaDetalle->precio*$ventaDetalle->cantidad)}}
                                    </li>
                                    <li>Fecha De Venta : {{$ventaDetalle->fecha_venta}}</li>
                                    <li>Fecha De Pago : {{$pagoDetalle->fecha_pago}}</li>
                                    <li>Pago Del Cliente : {{number_format($pagoDetalle->pago_cliente)}}</li>
                                    <li>Iva : {{$general->iva}}%</li>
                                    <li>Valor Iva :
                                        {{number_format(($ventaDetalle->precio*$ventaDetalle->cantidad)*$general->iva/100)}}
                                    </li>
                                    @if(!empty($obDetalle->nota))
                                    <li>Observacion : {{$obDetalle->nota}}</li>
                                    @else
                                    <li>Observacion : .....</li>
                                    @endif
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
                            @if($ventaEdit != '' || $crear == 'true')
                            @if($ventaEdit != '')
                            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Editar Venta -
                                Factura: {{$ventaEdit->factura}}</h1>
                            @elseif($crear != '')
                            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Crear Nueva Venta</h1>
                            @endif
                            <form>
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-blue-300 sm:p-6">
                                        <div class="grid grid-cols-12 gap-6">
                                            @if($ventaEdit != '')
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cliente"
                                                    class="block text-sm font-medium text-gray-900">Cliente<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <select name="cliente" wire:model="cliente"
                                                    class="text-gray-900 bg-pink-300 focus:bg-pink-400 m-3 form-input rounded-md shadow-sm mt-1 block w-full focus:ring-blue-500 focus:border-blue-500">
                                                    @foreach($clientes as $cli)
                                                    @if($cli->id == $ventaEdit->categoria_id)
                                                    <option seleceted value="{{$cli->id}}">{{$cli->nombre}}</option>
                                                    @endif
                                                    @endforeach
                                                    @foreach($clientes as $cli)
                                                    @if($cli->id != $ventaEdit->categoria_id)
                                                    <option value="{{$cli->id}}">{{$cli->nombre}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="categoria"
                                                    class="block text-sm font-medium text-gray-900">Categoria<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <select name="categoria" wire:model="categoria"
                                                    class="text-gray-900 bg-pink-300 focus:bg-pink-400 m-3 form-input rounded-md shadow-sm mt-1 block w-full focus:ring-blue-500 focus:border-blue-500">
                                                    @foreach($categorias as $cat)
                                                    @if($cat->id == $ventaEdit->categoria_id)
                                                    <option seleted value="{{$cat->id}}">{{$cat->nombre}}</option>
                                                    @endif
                                                    @endforeach
                                                    @foreach($categorias as $cat)
                                                    @if($cat->id != $ventaEdit->categoria_id)
                                                    <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fecha" class="block text-sm font-medium text-gray-900">Fecha
                                                    De
                                                    Venta<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="date" wire:model="fecha" name="fecha" autocomplete="off"
                                                    value="{{$ventaEdit->fecha_venta}}"
                                                    placeholder="{{$ventaEdit->fecha_venta}}"
                                                    class="bg-pink-300 focus:bg-pink-400 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fechaPago"
                                                    class="block text-sm font-medium text-gray-900">Fecha De
                                                    Pago<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="date" wire:model="fechaPago" name="fechaPago"
                                                    autocomplete="off" value="{{$pagoEdit->fecha_pago}}"
                                                    placeholder="{{$pagoEdit->fecha_pago}}"
                                                    class="bg-pink-300 focus:bg-pink-400 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="factura"
                                                    class="block text-sm font-medium text-gray-900">Factura<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="newfactura" name="factura"
                                                    autocomplete="off" value="{{$ventaEdit->factura}}"
                                                    placeholder="{{$ventaEdit->factura}}"
                                                    class="bg-pink-300 focus:bg-pink-400 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cantidad"
                                                    class="block text-sm font-medium text-gray-900">Cantidad<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="cantidad" name="cantidad"
                                                    autocomplete="off" value="{{$ventaEdit->cantidad}}"
                                                    placeholder="{{$ventaEdit->cantidad}}"
                                                    class="bg-pink-300 focus:bg-pink-400 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="precio"
                                                    class="block text-sm font-medium text-gray-900">Precio<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="precio" name="precio"
                                                    autocomplete="off" value="{{$ventaEdit->precio}}"
                                                    placeholder="{{$ventaEdit->precio}}"
                                                    class="bg-pink-300 focus:bg-pink-400 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="pagoCliente"
                                                    class="block text-sm font-medium text-gray-900">Pago Del
                                                    Cliente<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="pagoCliente" name="pagoCliente"
                                                    autocomplete="off" value="{{$pagoEdit->pago_cliente}}"
                                                    placeholder="{{$pagoEdit->pago_cliente}}"
                                                    class="bg-pink-300 focus:bg-pink-400 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-12 sm:col-span-12">
                                                <label for="notaOb"
                                                    class="block text-sm font-medium text-gray-900">Observación</label>
                                                <textarea wire:model="notaOb" name="notaOb" cols="30" rows="6"
                                                    value="{{$obEdit->nota}}" placeholder="{{$obEdit->nota}}"
                                                    class="bg-pink-300 focus:bg-pink-400 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md"></textarea>
                                            </div>
                                            @else
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cliente"
                                                    class="block text-sm font-medium text-gray-900">Cliente<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <select name="cliente" wire:model="cliente"
                                                    class="text-gray-900 bg-pink-300 focus:bg-pink-400 m-3 form-input rounded-md shadow-sm mt-1 block w-full focus:ring-blue-500 focus:border-blue-500">
                                                    <option selected>Seleccione el cliente</option>
                                                    @foreach($clientes as $cli)
                                                    <option value="{{$cli->id}}">{{$cli->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="categoria"
                                                    class="block text-sm font-medium text-gray-900">Categoria<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <select name="categoria" wire:model="categoria"
                                                    class="text-gray-900 bg-pink-300 focus:bg-pink-400 m-3 form-input rounded-md shadow-sm mt-1 block w-full focus:ring-blue-500 focus:border-blue-500">
                                                    <option selected>Seleccione La Categoria</option>
                                                    @foreach($categorias as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fecha" class="block text-sm font-medium text-gray-900">Fecha
                                                    De
                                                    Venta<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="date" wire:model="fecha" name="fecha" autocomplete="off"
                                                    class="bg-pink-300 focus:bg-pink-400 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fechaPago"
                                                    class="block text-sm font-medium text-gray-900">Fecha De
                                                    Pago<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="date" wire:model="fechaPago" name="fechaPago"
                                                    autocomplete="off"
                                                    class="bg-pink-300 focus:bg-pink-400 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="factura"
                                                    class="block text-sm font-medium text-gray-900">Factura<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="factura" name="factura"
                                                    autocomplete="off"
                                                    class="bg-pink-300 focus:bg-pink-400 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cantidad"
                                                    class="block text-sm font-medium text-gray-900">Cantidad<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="cantidad" name="cantidad"
                                                    autocomplete="off"
                                                    class="bg-pink-300 focus:bg-pink-400 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="precio"
                                                    class="block text-sm font-medium text-gray-900">Precio<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="precio" name="precio"
                                                    autocomplete="off"
                                                    class="bg-pink-300 focus:bg-pink-400 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="pagoCliente"
                                                    class="block text-sm font-medium text-gray-900">Pago Del
                                                    Cliente<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="pagoCliente" name="pagoCliente"
                                                    autocomplete="off"
                                                    class="bg-pink-300 focus:bg-pink-400 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-12 sm:col-span-12">
                                                <label for="notaOb"
                                                    class="block text-sm font-medium text-gray-900">Observación</label>
                                                <textarea wire:model="notaOb" name="notaOb" cols="30" rows="6"
                                                    class="bg-pink-300 focus:bg-pink-400 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm rounded-md"></textarea>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-blue-300 border-t-2 border-black text-right sm:px-6">
                                    <a href="" wire:click.prevent="cancelar()"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                                        Cancelar
                                    </a>
                                    @if($ventaEdit != '')
                                    <button type="submit" wire:click.prevent="update('{{$ventaEdit->factura}}')"
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
                            class="bi bi-wallet2 m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-300 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400"></i>
                        <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Ventas</h1>
                        <div class="flex bg-blue-300 border-b-2 border-black px-4 py-3 sm:px-6 pr-">
                            <input wire:model="search" type="text" placeholder="Busqueda De Venta Por Factura"
                                class="bg-green-200 focus:bg-green-300 m-3 form-input rounded-md shadow-sm mt-1 block w-full focus:ring-blue-500 focus:border-blue-500">
                            <div class="m-3 form-input shadow-sm mt-1 block">
                                <select name="perPage" wire:model="perPage"
                                    class="rounded-md bg-green-200 focus:bg-green-300 focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-900">
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
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-pink-300">
                                <tr class="text-center text-white uppercase border-2 border-pink-400">
                                    <th scope="col"
                                        class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                        Factura
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                        Cliente
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                        Categoria
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                        Valor
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                        Tardanza
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                        Iva
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                        Editar
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                        Detalles
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                        Borrar
                                    </th>
                                </tr>
                            </thead>
                            @foreach($ventas as $venta)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr class="text-center bg-pink-300 border-2 border-pink-400">
                                    <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                        {{$venta->factura}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                        @foreach($clientes as $cli)
                                        @if($cli->id == $venta->cliente_id)
                                        {{$cli->nombre}}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                        @foreach($categorias as $cat)
                                        @if($cat->id == $venta->categoria_id)
                                        {{$cat->nombre}}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                        {{substr(number_format($venta->precio*$venta->cantidad), 0, 7)}}...$
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                        @foreach($pagos as $pa)
                                        @if($pa->factura == $venta->factura)
                                        <?php $tempFechaPago = new \Carbon\Carbon($pa->fecha_pago) ?>
                                        <?php $tempFechaVenta = new \Carbon\Carbon($venta->fecha_venta) ?>
                                        {{ number_format($tempFechaPago->diffInDays($tempFechaVenta)) }}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                        {{substr(number_format(($venta->precio*$venta->cantidad)*$general->iva/100), 0, 7)}}...$
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                        <i wire:click.prevent="editar('{{$venta->factura}}')"
                                            class="cursor-pointer bi bi-pen bg-blue-500 hover:bg-blue-400 rounded text-lg text-white p-3"></i>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                        <a href="" wire:click.prevent="detalles('{{$venta->factura}}')">
                                            <i
                                                class="bi bi-box-arrow-up-right bg-purple-600 hover:bg-purple-400 rounded text-lg text-white p-3"></i>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                        <a href="" wire:click.prevent="borrar('{{$venta->factura}}')"><i
                                                class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                        <div class="bg-blue-300 px-4 py-3 sm:px-6">
                            {{$ventas->links()}}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>