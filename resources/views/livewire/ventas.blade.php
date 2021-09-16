<x-slot name="header">
    <h2 class="font-semibold text-xl text-white leading-tight">
        Cacfe's - Ventas
    </h2>
</x-slot>

@if(!empty($eliminar))
<div class="font-bolder sm:p-8 h-max h-full w-full">
    <div class="py-12">
        <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <i wire:click.prevent="cancelar()" title="salir de esta ventana"
                                    class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400"></i>
                                <h1 class="font-bold text-black p-3 text-xl sm:text-3xl border-b-2 border-black">Estas seguro de
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

@if($ventaDetalle && $pagoDetalle && $obDetalle || $obDetalle)
<div class="font-bolder sm:p-8 h-max h-full w-full">
    <div class="py-12">
        <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="bg-gray-100 rounded-lg overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <i wire:click.prevent="cancelarDetalles()" title="salir de esta ventana"
                                    class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400"></i>
                                <h1 class="font-bold text-black p-3 text-xl sm:text-3xl border-b-2 border-black">Detalles de la
                                    factura : {{$ventaDetalle->factura}}</h1>
                                <ul class="p-5">
                                    <li><span class="font-bold">Factura :</span> {{ $ventaDetalle->factura }}</li>
                                    <li><span class="font-bold">Cliente :</span> @foreach($clientes as $cli)
                                        @if($cli->id ==
                                        $ventaDetalle->cliente_id)
                                        {{$cli->nombre}}
                                        @endif @endforeach</li>
                                    <li><span class="font-bold">Categoria :</span> @foreach($categorias as $cat)
                                        @if($cat->id ==
                                        $ventaDetalle->categoria_id)
                                        {{$cli->nombre}}
                                        @endif @endforeach</li>
                                    <li><span class="font-bold">Cantidad :</span>
                                        {{number_format($ventaDetalle->cantidad)}}</li>
                                    <li><span class="font-bold">Precio :</span> {{number_format($ventaDetalle->precio)}}
                                    </li>
                                    <li><span class="font-bold">Valor :</span>
                                        {{number_format($ventaDetalle->precio*$ventaDetalle->cantidad)}}
                                    </li>
                                    <li><span class="font-bold">Fecha de venta :</span> {{$ventaDetalle->fecha_venta}}
                                    </li>
                                    <li><span class="font-bold">Fecha de pago :</span> {{$pagoDetalle->fecha_pago}}</li>
                                    <li><span class="font-bold">Pago del cliente :</span>
                                        {{number_format($pagoDetalle->pago_cliente)}}</li>
                                    <li><span class="font-bold">Iva :</span> {{$general->iva}}%</li>
                                    <li><span class="font-bold">Valor iva :</span>
                                        {{number_format(($ventaDetalle->precio*$ventaDetalle->cantidad)*$general->iva/100)}}
                                    </li>
                                    @if(!empty($obDetalle->nota))
                                    <li><span class="font-bold">Observacion :</span> {{$obDetalle->nota}}</li>
                                    @else
                                    <li class="font-bold">Observacion : ...</li>
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
        <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden sm:rounded-lg">
                            @if($ventaEdit != '' || $crear == 'true')
                            @if($ventaEdit != '')
                            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Editar venta, factura:
                                {{$ventaEdit->factura}}</h1>
                            @elseif($crear != '')
                            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Crear nueva venta</h1>
                            @endif

                            <!-- formularios de agregar y editar el registro-->
                            <form>
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-gray-100 sm:p-6">
                                        <div class="grid grid-cols-12 gap-6">
                                            @if($ventaEdit != '')
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cliente"
                                                    class="block text-sm font-medium text-gray-900">Cliente<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <select name="cliente" wire:model="cliente"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
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
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
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
                                                    de
                                                    venta<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="date" wire:model="fecha" name="fecha" autocomplete="off"
                                                    value="{{$ventaEdit->fecha_venta}}"
                                                    placeholder="{{$ventaEdit->fecha_venta}}"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fechaPago"
                                                    class="block text-sm font-medium text-gray-900">Fecha de
                                                    pago<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="date" wire:model="fechaPago" name="fechaPago"
                                                    autocomplete="off" value="{{$pagoEdit->fecha_pago}}"
                                                    placeholder="{{$pagoEdit->fecha_pago}}"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="factura"
                                                    class="block text-sm font-medium text-gray-900">Factura<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="newfactura" name="factura"
                                                    autocomplete="off" value="{{$ventaEdit->factura}}"
                                                    placeholder="{{$ventaEdit->factura}}"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cantidad"
                                                    class="block text-sm font-medium text-gray-900">Cantidad<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="cantidad" name="cantidad"
                                                    autocomplete="off" value="{{$ventaEdit->cantidad}}"
                                                    placeholder="{{$ventaEdit->cantidad}}"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="precio"
                                                    class="block text-sm font-medium text-gray-900">Precio<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="precio" name="precio"
                                                    autocomplete="off" value="{{$ventaEdit->precio}}"
                                                    placeholder="{{$ventaEdit->precio}}"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="pagoCliente"
                                                    class="block text-sm font-medium text-gray-900">Pago del
                                                    cliente<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="pagoCliente" name="pagoCliente"
                                                    autocomplete="off" value="{{$pagoEdit->pago_cliente}}"
                                                    placeholder="{{$pagoEdit->pago_cliente}}"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-12 sm:col-span-12">
                                                <label for="notaOb"
                                                    class="block text-sm font-medium text-gray-900">Observación</label>
                                                <textarea wire:model="notaOb" name="notaOb" cols="30" rows="6"
                                                    @if($notaOb) value="{{$obEdit->nota}}" placeholder="{{$obEdit->nota}}" @endif
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"></textarea>
                                            </div>
                                            @else
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cliente"
                                                    class="block text-sm font-medium text-gray-900">Cliente<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <select name="cliente" wire:model="cliente"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
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
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                                    <option selected>Seleccione La Categoria</option>
                                                    @foreach($categorias as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fecha" class="block text-sm font-medium text-gray-900">Fecha
                                                    de venta<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="date" wire:model="fecha" name="fecha" autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fechaPago"
                                                    class="block text-sm font-medium text-gray-900">Fecha de
                                                    pago<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="date" wire:model="fechaPago" name="fechaPago"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="factura"
                                                    class="block text-sm font-medium text-gray-900">Factura<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="factura" name="factura"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cantidad"
                                                    class="block text-sm font-medium text-gray-900">Cantidad<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="cantidad" name="cantidad"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="precio"
                                                    class="block text-sm font-medium text-gray-900">Precio<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="precio" name="precio"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="pagoCliente"
                                                    class="block text-sm font-medium text-gray-900">Pago del
                                                    cliente<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="pagoCliente" name="pagoCliente"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-12 sm:col-span-12">
                                                <label for="notaOb"
                                                    class="block text-sm font-medium text-gray-900">Observación</label>
                                                <textarea wire:model="notaOb" name="notaOb" cols="30" rows="6"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"></textarea>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-200 border-t-2 border-black text-right sm:px-6">
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
                            </form>
                            @else

                            <!-- menu de filtracion de la informacion de la tabla -->
                            <i wire:click.prevent="crear()" title="agregar elemento"
                                class="bi bi-wallet2 m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-300 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400"></i>
                            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Informacion de las ventas</h1>
                            <div class="flex bg-gray-100 border-b-2 border-black px-4 py-3 sm:px-6 pr-">
                                <input wire:model="search" type="text" placeholder="Busqueda De Venta Por Factura"
                                    class="bg-white focus:bg-gray-100 m-3 border-gray-700 form-input mt-1 block w-full focus:border-2 block focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                <div class="m-3 form-input shadow-sm mt-1 block">
                                    <select name="perPage" wire:model="perPage"
                                        class="bg-white focus:bg-gray-100 border-gray-700 focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
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
                                <button wire:click.prevent="limpiarBusqueda()" title="borrar filtros de busqueda"
                                    class="m-3 form-input rounded-md shadow-sm mt-1 block w-16 text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                                    <i class="bi bi-x"></i>
                                </button>
                                @endif
                            </div>

                            <!-- mensajes de alerta -->
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

                                <!-- cabecera de la tabla -->
                                <thead class="bg-gray-500">
                                    <tr
                                        class="text-center text-xs text-gray-900 uppercase border-l-2 border-r-2 border-b-2 border-gray-900">
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider"">
                                        Factura
                                    </th>
                                    <th scope=" col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider"">
                                        Cliente
                                    </th>
                                    <th scope=" col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider"">
                                        Categoria
                                    </th>
                                    <th scope=" col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider"">
                                        Valor
                                    </th>
                                    <th scope=" col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider"">
                                        Tardanza
                                    </th>
                                    <th scope=" col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider"">
                                        Iva
                                    </th>
                                    <th scope=" col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider"">
                                        Editar
                                    </th>
                                    <th scope=" col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider"">
                                        Detalles
                                    </th>
                                    <th scope=" col" class="px-6 py-3 font-medium bg-gray-300 tracking-wider"">
                                        Borrar
                                    </th>
                                </tr>
                            </thead>
                            @foreach($ventas as $venta)
                            <!-- informacion de la tabla -->
                            <tbody class="bg-gray-200 text-center">
                                    <tr class="border-2 border-gray-900">
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            {{$venta->factura}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            @foreach($clientes as $cli)
                                            @if($cli->id == $venta->cliente_id)
                                            {{$cli->nombre}}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            @foreach($categorias as $cat)
                                            @if($cat->id == $venta->categoria_id)
                                            {{$cat->nombre}}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            {{substr(number_format($venta->total), 0, 7)}}...$
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            @foreach($pagos as $pa)
                                            @if($pa->factura == $venta->factura)
                                                @php 
                                                    $tempFechaPago = new \Carbon\Carbon($pa->fecha_pago);
                                                    $tempFechaVenta = new \Carbon\Carbon($venta->fecha_venta);
                                                    $diferenciaDeFechas = $tempFechaPago->diffInDays($tempFechaVenta);
                                                @endphp
                                                {{ number_format($tempFechaPago->diffInDays($tempFechaVenta)) }}
                                            @endif
                                            @endforeach
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            {{substr(number_format(($venta->precio*$venta->cantidad)*$general->iva/100), 0, 7)}}...$
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            <i wire:click.prevent="editar('{{$venta->factura}}')"
                                                class="cursor-pointer bi bi-pen bg-blue-500 hover:bg-blue-400 rounded text-lg text-white p-3"></i>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            <a href="" wire:click.prevent="detalles('{{$venta->factura}}')">
                                                <i
                                                    class="bi bi-box-arrow-up-right bg-purple-600 hover:bg-purple-400 rounded text-lg text-white p-3"></i>
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="" wire:click.prevent="eliminar('{{$venta->factura}}')"><i
                                                    class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                    @endforeach
                            </table>
                            <!-- popup eliminar registro -->
                            <div class="bg-gray-100 px-4 py-3 sm:px-6">
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

<head>
    <title>{{ config('app.name') }} - Ventas</title>
</head>