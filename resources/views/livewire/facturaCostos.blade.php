<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Cacfes - Facturación De Costos
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-blue-300 overflow-hidden shadow-xl rounded-lg">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden sm:rounded-lg">
                            @if($crear == 'true' || $productoEdit != '')
                            @if($productoEdit != '')
                            <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">Editar Facturación De
                                Costo -
                                {{$productoEdit->cliente}}</h1>
                            @else
                            <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">Añadir Nueva
                                Facturación De Costo</h1>
                            @endif

                            <form>
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-blue-300 sm:p-6">
                                        <div class="grid grid-cols-12 gap-6">
                                            @csrf
                                            @if($productoEdit != '')
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="item"
                                                    class="block text-sm font-medium text-gray-700">Item</label>
                                                <select name="item" wire:model="item"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-blue-300 rounded-md form-select mt-1 block w-full">
                                                    <option value="{{$pEditItem->id}}" selected>{{$pEditItem->nombre}}
                                                    </option>
                                                    @foreach($items as $item)
                                                    @if($pEditItem->nombre != $item->nombre)
                                                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="categoria"
                                                    class="block text-sm font-medium text-gray-700">Categoria</label>
                                                <select name="categoria" wire:model="categoria"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-blue-300 rounded-md form-select mt-1 block w-full">
                                                    <option value="{{$pEditCat->id}}" selected>{{$pEditCat->nombre}}
                                                    </option>
                                                    @foreach($categorias as $cat)
                                                    @if($pEditCat->nombre != $cat->nombre)
                                                    <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="udMedida"
                                                    class="block text-sm font-medium text-gray-700">Unidad De
                                                    Medida</label>
                                                <input value="{{$productoEdit->unidad_medida}}"
                                                    placeholder="{{$productoEdit->unidad_medida}}" type="text"
                                                    wire:model="udMedida" name="udMedida" autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="proveedor"
                                                    class="block text-sm font-medium text-gray-700">Proveedor</label>
                                                <select name="proveedor" wire:model="proveedor"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-blue-300 rounded-md form-select mt-1 block w-full">
                                                    <option selected>Seleccione el proveedor</option>
                                                    @foreach($proveedores as $prov)
                                                    <option value="{{$prov->id}}">{{$prov->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cliente"
                                                    class="block text-sm font-medium text-gray-700">Cliente</label>
                                                <select name="cliente" wire:model="cliente"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-blue-300 rounded-md form-select mt-1 block w-full">
                                                    <option selected>Seleccione el cliente</option>
                                                    @foreach($clientes as $cli)
                                                    <option value="{{$cli->id}}">{{$cli->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cantidad"
                                                    class="block text-sm font-medium text-gray-700">Cantidad</label>
                                                <input type="number" wire:model="cantidad"
                                                    placeholder="{{$productoEdit->cantidad}}"
                                                    value="{{$productoEdit->cantidad}}" name="cantidad" id="cantidad"
                                                    autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="valUnitario"
                                                    class="block text-sm font-medium text-gray-700">Valor
                                                    Unitario</label>
                                                <input type="number" wire:model="valUnitario"
                                                    placeholder="{{$productoEdit->valUnitario}}"
                                                    value="{{$productoEdit->valUnitario}}" name="valUnitario"
                                                    id="valUnitario" autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="descuento"
                                                    class="block text-sm font-medium text-gray-700">Descuento</label>
                                                <input type="number" wire:model="descuento"
                                                    placeholder="{{$productoEdit->descuento}}%"
                                                    value="{{$productoEdit->descuento}}" name="descuento" id="descuento"
                                                    autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md"
                                                    maxlength="3">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="direccion"
                                                    class="block text-sm font-medium text-gray-700">Dirección</label>
                                                <input type="text" wire:model="direccion"
                                                    placeholder="{{$productoEdit->direccion}}"
                                                    value="{{$productoEdit->direccion}}" name="direccion" id="direccion"
                                                    autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fecha"
                                                    class="block text-sm font-medium text-gray-700">Fecha</label>
                                                <input type="date" wire:model="fecha" name="fecha" id="fecha"
                                                    autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="descripcion"
                                                    class="block text-sm font-medium text-gray-700">Descripcion</label>
                                                <textarea wire:model="descripcion"
                                                    placeholder="{{$productoEdit->descripcion}}"
                                                    value="{{$productoEdit->descripcion}}"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md"
                                                    name="observaciones" id="observaciones" cols="60"
                                                    rows="1"></textarea>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="observaciones"
                                                    class="block text-sm font-medium text-gray-700">Observaciones</label>
                                                <textarea wire:model="observaciones"
                                                    placeholder="{{$productoEdit->observaciones}}"
                                                    value="{{$productoEdit->observaciones}}"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md"
                                                    name="observaciones" id="observaciones" cols="60"
                                                    rows="1"></textarea>
                                            </div>

                                            @else

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="item" class="block text-sm font-medium text-gray-700">Tipo
                                                    De Costo<span class="text-red-400 font-bold"> *</span></label>
                                                <select name="item" wire:model="item" autofocus
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-blue-300 rounded-md form-select mt-1 block w-full">
                                                    <option selected>Seleccione el tipo de costo</option>
                                                    @foreach($items as $item)
                                                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="categoria"
                                                    class="block text-sm font-medium text-gray-700">Categoria<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <select name="categoria" wire:model="categoria"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-blue-300 rounded-md form-select mt-1 block w-full">
                                                    <option selected>Seleccione la categoria</option>
                                                    @foreach($categorias as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="udMedida"
                                                    class="block text-sm font-medium text-gray-700">Unidad De
                                                    Medida</label>
                                                <input type="text" wire:model="udMedida" name="udMedida"
                                                    autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="proveedor"
                                                    class="block text-sm font-medium text-gray-700">Proveedor<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <select name="proveedor" wire:model="proveedor"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-blue-300 rounded-md form-select mt-1 block w-full">
                                                    <option selected>Seleccione el proveedor</option>
                                                    @foreach($proveedores as $prov)
                                                    <option value="{{$prov->id}}">{{$prov->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cliente"
                                                    class="block text-sm font-medium text-gray-700">Cliente<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <select name="cliente" wire:model="cliente"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-blue-300 rounded-md form-select mt-1 block w-full">
                                                    <option selected>Seleccione el cliente</option>
                                                    @foreach($clientes as $cli)
                                                    <option value="{{$cli->id}}">{{$cli->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cantidad"
                                                    class="block text-sm font-medium text-gray-700">Cantidad<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="cantidad" name="cantidad" id="cantidad"
                                                    autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="valUnitario"
                                                    class="block text-sm font-medium text-gray-700">Valor Unitario<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="valUnitario" name="valUnitario"
                                                    id="valUnitario" autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="descuento"
                                                    class="block text-sm font-medium text-gray-700">Descuento</label>
                                                <input type="number" wire:model="descuento" name="descuento"
                                                    id="descuento" autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md"
                                                    maxlength="3">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="direccion"
                                                    class="block text-sm font-medium text-gray-700">Dirección<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="direccion" name="direccion"
                                                    id="direccion" autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fecha"
                                                    class="block text-sm font-medium text-gray-700">Fecha<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="date" wire:model="fecha" name="fecha" id="fecha"
                                                    autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="descripcion"
                                                    class="block text-sm font-medium text-gray-700">Descripcion</label>
                                                <textarea wire:model="descripcion"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md"
                                                    name="observaciones" id="observaciones" cols="60"
                                                    rows="1"></textarea>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="observaciones"
                                                    class="block text-sm font-medium text-gray-700">Observaciones</label>
                                                <textarea wire:model="observaciones"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md"
                                                    name="observaciones" id="observaciones" cols="60"
                                                    rows="1"></textarea>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-blue-300 border-t-2 border-black text-right sm:px-6">
                                    @if($descuento != '' || $cantidad != '' || $valUnitario != '' || $direccion != '' ||
                                    $udMedida)
                                    <a href="" wire:click.prevent="limpiar()"
                                        class="mr-2 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                        Limpiar Campos
                                    </a>
                                    @endif
                                    <a href="" wire:click.prevent="cancelar()"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                                        Cancelar
                                    </a>
                                    @if($productoEdit != '')
                                    <button type="submit" wire:click.prevent="update({{$productoEdit->id}})"
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
                    </div>
                    </form>
                    @else
                    <i wire:click.prevent="crear()"
                        class="bi bi-bag-plus-fill m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-non"></i>
                    <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Facturación De Costos</h1>
                    <div class="flex bg-blue-300 px-4 py-3 sm:px-6 pr-">
                        <input wire:model="search" type="text"
                            placeholder="Buscar Costo Por : Direccion - Cantidad - Valor Unitario"
                            class="bg-green-200 focus:bg-green-300 m-3 form-input rounded-md shadow-sm mt-1 block w-full focus:ring-blue-500 focus:border-blue-500">
                        <div class="m-3 form-input shadow-sm mt-1 block">
                            <select name="perPage" wire:model="perPage"
                                class="bg-green-200 focus:bg-green-300 rounded-md focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-500">
                                <option value="10">10 costos por pagina</option>
                                <option value="15">15 costos por pagina</option>
                                <option value="20">20 costos por pagina</option>
                                <option value="30">30 costos por pagina</option>
                                <option value="50">50 costos por pagina</option>
                                <option value="60">60 costos por pagina</option>
                                <option value="100">100 costos por pagina</option>
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
                                    Dirección
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                    Cantidad
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                    Val. Unitario
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                    Val. Sin Desc.
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                    Descuento
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                    Val. Desc.
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
                        @foreach($productos as $pro)
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="text-center bg-pink-300 border-2 border-pink-400">
                                <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $pro->direccion }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ number_format($pro->cantidad) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                    <div class="text-sm font-medium text-gray-900">
                                        $ {{ number_format($pro->valor_unitario) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            $ {{ __(number_format($pro->valor_unitario*$pro->cantidad)) }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $pro->descuento }}%
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                    <div class="text-sm font-medium text-gray-900">
                                        $@if($pro->descuento >= 100)
                                        {{ __(0)}}
                                        @elseif($pro->descuento < 100 && $pro->descuento >= 1)
                                            {{ __(number_format(round((($pro->valor_unitario*$pro->cantidad)*$pro->descuento)/100))) }}
                                            @elseif($pro->descuento == 0)
                                            {{ __(number_format($pro->valor_unitario*$pro->cantidad)) }}
                                            @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                    <a href="" wire:click.prevent="editar({{$pro->id}})"><i
                                            class="bi bi-pen bg-blue-400 hover:bg-blue-300 rounded text-lg text-white p-3"></i></a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                    <a href="" wire:click.prevent="borrar({{$pro->id}})"><i
                                            class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <div class="bg-blue-300 px-4 py-3 sm:px-6">
                        {{ $productos->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>