<x-slot name="header">
    <h2 class="font-semibold text-xl text-white leading-tight">
        Cacfe's - Facturación de costos
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

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-gray-100 overflow-hidden shadow-xl rounded-lg">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden sm:rounded-lg">
                            @if($crear == 'true' || $productoEdit != '')
                            @if($productoEdit != '')
                            <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">Editar
                                facturación de costo - {{$productoEdit->cliente}}</h1>
                            @else
                            <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">Añadir
                                nueva facturación de costo</h1>
                            @endif

                            <form>
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-gray-100 sm:p-6">
                                        <div class="grid grid-cols-12 gap-6">
                                            @csrf
                                            @if($productoEdit != '')
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="item"
                                                    class="block text-sm font-medium text-gray-700">Item</label>
                                                <select name="item" wire:model="item"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
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
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
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
                                                    class="block text-sm font-medium text-gray-700">Unidad de
                                                    medida</label>
                                                <input value="{{$productoEdit->unidad_medida}}"
                                                    placeholder="{{$productoEdit->unidad_medida}}" type="text"
                                                    wire:model="udMedida" name="udMedida" autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="proveedor"
                                                    class="block text-sm font-medium text-gray-700">Proveedor</label>
                                                <select name="proveedor" wire:model="proveedor"
                                                    class="fbg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                                    @foreach($proveedores as $prov)
                                                    @if($prov->id == $productoEdit->proveedor_id)
                                                    <option value="{{$prov->id}}" selected>{{$prov->nombre}}</option>
                                                    @endif
                                                    @endforeach
                                                    @foreach($proveedores as $prov)
                                                    @if($prov->id != $productoEdit->proveedor_id)
                                                    <option value="{{$prov->id}}">{{$prov->nombre}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="cliente"
                                                    class="block text-sm font-medium text-gray-700">Cliente</label>
                                                <select name="cliente" wire:model="cliente"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                                    @foreach($clientes as $cli)
                                                    @if($cli == $productoEdit->cliente_id)
                                                    <option value="{{$cli->id}}">{{$cli->nombre}} selected</option>
                                                    @endif
                                                    @endforeach
                                                    @foreach($clientes as $cli)
                                                    @if($cli != $productoEdit->cliente_id)
                                                    <option value="{{$cli->id}}">{{$cli->nombre}}</option>
                                                    @endif
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
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="valUnitario"
                                                    class="block text-sm font-medium text-gray-700">Valor
                                                    unitario</label>
                                                <input type="number" wire:model="valUnitario"
                                                    placeholder="{{$productoEdit->valor_unitario}}"
                                                    value="{{$productoEdit->valor_unitario}}" name="valor_unitario"
                                                    id="valor_unitario" autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="descuento"
                                                    class="block text-sm font-medium text-gray-700">Descuento</label>
                                                <input type="number" wire:model="descuento"
                                                    placeholder="{{$productoEdit->descuento}}%"
                                                    value="{{$productoEdit->descuento}}" name="descuento" id="descuento"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                                    maxlength="3">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="direccion"
                                                    class="block text-sm font-medium text-gray-700">Dirección</label>
                                                <input type="text" wire:model="direccion"
                                                    placeholder="{{$productoEdit->direccion}}"
                                                    value="{{$productoEdit->direccion}}" name="direccion" id="direccion"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fecha"
                                                    class="block text-sm font-medium text-gray-700">Fecha</label>
                                                <input type="date" wire:model="fecha" name="fecha" id="fecha"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="descripcion"
                                                    class="block text-sm font-medium text-gray-700">Descripcion</label>
                                                <textarea wire:model="descripcion"
                                                    placeholder="{{$productoEdit->descripcion}}"
                                                    value="{{$productoEdit->descripcion}}"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                                    name="observaciones" id="observaciones" cols="60"
                                                    rows="1"></textarea>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="observaciones"
                                                    class="block text-sm font-medium text-gray-700">Observaciones</label>
                                                <textarea wire:model="observaciones"
                                                    placeholder="{{$productoEdit->observaciones}}"
                                                    value="{{$productoEdit->observaciones}}"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                                    name="observaciones" id="observaciones" cols="60"
                                                    rows="1"></textarea>
                                            </div>

                                            @else

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="item"
                                                    class="block text-sm font-medium text-gray-700">Item<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <select name="item" wire:model="item" autofocus
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
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
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                                    <option selected>Seleccione la categoria</option>
                                                    @foreach($categorias as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="udMedida"
                                                    class="block text-sm font-medium text-gray-700">Unidad de
                                                    medida</label>
                                                <input type="text" wire:model="udMedida" name="udMedida"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="proveedor"
                                                    class="block text-sm font-medium text-gray-700">Proveedor<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <select name="proveedor" wire:model="proveedor"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
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
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
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
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="valUnitario"
                                                    class="block text-sm font-medium text-gray-700">Valor unitario<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="valUnitario" name="valUnitario"
                                                    id="valUnitario" autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="descuento"
                                                    class="block text-sm font-medium text-gray-700">Descuento</label>
                                                <input type="number" wire:model="descuento" name="descuento"
                                                    id="descuento" autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                                    maxlength="3">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="direccion"
                                                    class="block text-sm font-medium text-gray-700">Dirección<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="direccion" name="direccion"
                                                    id="direccion" autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="fecha"
                                                    class="block text-sm font-medium text-gray-700">Fecha<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="date" wire:model="fecha" name="fecha" id="fecha"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="descripcion"
                                                    class="block text-sm font-medium text-gray-700">Descripcion</label>
                                                <textarea wire:model="descripcion"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                                    name="observaciones" id="observaciones" cols="60"
                                                    rows="1"></textarea>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="observaciones"
                                                    class="block text-sm font-medium text-gray-700">Observaciones</label>
                                                <textarea wire:model="observaciones"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                                    name="observaciones" id="observaciones" cols="60"
                                                    rows="1"></textarea>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-200 border-t-2 border-black text-right sm:px-6">
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
                    <i wire:click.prevent="crear()" title="agregar elemento"
                        class="bi bi-bag-plus-fill m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-non"></i>
                    <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Facturación de costos</h1>
                    <div class="flex bg-gray-200 border-b-2 border-black px-4 py-3 sm:px-6 pr-">
                        <input wire:model="search" type="text"
                            placeholder="Buscar Costo Por : Direccion - Cantidad - Valor Unitario"
                            class="bg-white focus:bg-gray-100 m-3 border-gray-700 form-input mt-1 block w-full focus:border-2 block focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                        <div class="m-3 form-input shadow-sm mt-1 block">
                            <select name="perPage" wire:model="perPage"
                                class="bg-white focus:bg-gray-100 border-gray-700 focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
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
                        <button wire:click.prevent="limpiarBusqueda()" title="eliminar filtros de busqueda"
                            class="m-3 form-input rounded-md shadow-sm mt-1 block w-16 text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                            <i class="bi bi-x"></i>
                        </button>
                        @endif
                    </div>
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
                        <thead class="bg-gray-500">
                            <tr
                                class="text-center text-xs text-gray-900 uppercase border-l-2 border-r-2 border-b-2 border-gray-900">
                                <th scope="col"
                                    class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                    Dirección
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                    Cantidad
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                    Val. Unitario
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                    Val. Sin Desc.
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                    Descuento
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                    Val. Desc.
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
                        @foreach($productos as $pro)
                        <tbody class="bg-gray-200 text-center">
                                    <tr class="border-2 border-gray-900">
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                    {{ $pro->direccion }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                    {{ number_format($pro->cantidad) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                    ${{ number_format($pro->valor_unitario) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                    ${{ __(number_format($pro->valor_unitario*$pro->cantidad)) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                    {{ $pro->descuento }}%
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                    $@if($pro->descuento >= 100)
                                    {{ __(0)}}
                                    @elseif($pro->descuento < 100 && $pro->descuento >= 1)
                                        {{ __(number_format(round((($pro->valor_unitario*$pro->cantidad)*$pro->descuento)/100))) }}
                                        @elseif($pro->descuento == 0)
                                        {{ __(number_format($pro->valor_unitario*$pro->cantidad)) }}
                                        @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                    <a href="" wire:click.prevent="editar({{$pro->id}})"><i
                                            class="bi bi-pen bg-blue-400 hover:bg-blue-300 rounded text-lg text-white p-3"></i></a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="" wire:click.prevent="eliminar({{$pro->id}})"><i
                                            class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    <div class="bg-gray-100 px-4 py-3 sm:px-6">
                        {{ $productos->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<head>
    <title>{{ config('app.name') }} - Costos</title>
</head>