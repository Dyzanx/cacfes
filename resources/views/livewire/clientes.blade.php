<x-slot name="header">
    <h2 class="font-semibold text-xl text-white leading-tight">
        Cacfe's - Clientes
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
                                <i wire:click.prevent="cancelar()" title="salir de esta ventana"
                                    class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400"></i>
                                <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Estas seguro de
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
        <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden sm:rounded-lg">
                            @if($crear == 'true' || $clienteEdit != '')
                            @if($clienteEdit)
                            <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">Editar cliente -
                                {{substr($clienteEdit->nombre, 0, 8)}}...</h1>
                            @else
                            <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">Añadir nuevo cliente
                            </h1>
                            @endif
                            <form>
                                @csrf
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-gray-100 sm:p-6">
                                        <div class="grid grid-cols-9 gap-6">
                                            @if($clienteEdit)
                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="tipoCliente"
                                                    class="block text-sm font-medium text-gray-700">Tipo de cliente<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <select name="tipoCliente" wire:model="tipoCliente" autofocus
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                                    autofocus>
                                                    @if($clienteEdit->tipoCliente == 'cliente')
                                                        <option value="cliente" selected>Cliente</option>
                                                        <option value="proveedor">Proveedor</option>
                                                    @else
                                                        <option value="proveedor" selected>Proveedor</option>
                                                        <option value="cliente">Cliente</option>
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="nombre"
                                                    class="block text-sm font-medium text-gray-700">Nombre
                                                    completo</label>
                                                <input type="text" wire:model="nombre" value="{{$clienteEdit->nombre}}"
                                                    placeholder="{{$clienteEdit->nombre}}" autocomplete="off"
                                                    name="nombre" id="nombre"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                                    autofocus>
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="celular"
                                                    class="block text-sm font-medium text-gray-700">Celular</label>
                                                <input type="text" wire:model="celular"
                                                    value="{{$clienteEdit->celular}}"
                                                    placeholder="{{$clienteEdit->celular}}" autocomplete="off"
                                                    name="celular" id="celular"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                                    minlength="10" maxlength="10">
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="tipoDoc"
                                                    class="block text-sm font-medium text-gray-700">Tipo de
                                                    documento</label>
                                                <select name="tipoDoc" wire:model="tipoDoc"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                                    @if(!empty($clienteEdit->tipoDocumento))
                                                        <option value="{{ $clienteEdit->tipoDocumento }}" selected>{{ $clienteEdit->tipoDocumento }}</option>
                                                    @else
                                                        <option selected>No hay nada seleccionado</option>
                                                    @endif
                                                    @if($clienteEdit->tipoDocumento != 'cédula de ciudadanía')
                                                        <option value="cédula de ciudadanía">Cédula de Ciudadanía</option>
                                                    @endif
                                                    @if($clienteEdit->tipoDocumento != 'cédula de extrangería')
                                                        <option value="cédula de extrangería">Cédula de Extrangería</option>
                                                    @endif
                                                    @if($clienteEdit->tipoDocumento != 'tarjeta de identidad')
                                                        <option value="tarjeta de identidad">Tarjeta de Identidad</option>
                                                    @endif
                                                    @if($clienteEdit->tipoDocumento != 'registro civil')
                                                        <option value="registro civil">Reistro Civil</option>
                                                    @endif
                                                    @if($clienteEdit->tipoDocumento != 'pasaporte')
                                                        <option value="pasaporte">Pasaporte</option>
                                                    @endif
                                                    @if($clienteEdit->tipoDocumento != 'PEP')
                                                        <option value="PEP">PEP</option>
                                                    @endif
                                                    @if($clienteEdit->tipoDocumento != 'NIT')
                                                        <option value="NIT">NIT</option>
                                                    @endif
                                                </select>
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="telefono"
                                                    class="block text-sm font-medium text-gray-700">Teléfono
                                                    fijo</label>
                                                <input type="text" wire:model="telefono"
                                                    value="{{$clienteEdit->telefono}}"
                                                    placeholder="{{$clienteEdit->telefono}}" autocomplete="off"
                                                    name="telefono" id="telefono"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                                    minlength="8" maxlength="8">
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="numDoc"
                                                    class="block text-sm font-medium text-gray-700">Numero de
                                                    documento</label>
                                                <input type="text" wire:model="numDoc" name="numDoc" id="numDoc"
                                                    autocomplete="off" value="{{ $clienteEdit->numeroDocumento }}" placeholder="{{ $clienteEdit->numeroDocumento }}"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="contacto"
                                                    class="block text-sm font-medium text-gray-700">Contacto</label>
                                                <input type="text" wire:model="contacto"
                                                    value="{{$clienteEdit->contacto}}"
                                                    placeholder="{{$clienteEdit->contacto}}" autocomplete="off"
                                                    name="contacto" id="contacto"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            @if($clienteEdit->tipoBoleteria == 'Papel Térmico')
                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="tipoBoleta" class="text-sm font-medium text-gray-700">Papel
                                                    térmico</label>
                                                <input wire:model="tipoBoleta" type="checkbox" id="tipoBoleta"
                                                    name="tipoBoleta" value="Papel Térmico"
                                                    class="bg-white focus:bg-gray-100 border-gray-700 focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md" checked>
                                            </div>
                                            @else
                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="tipoBoleta" class="text-sm font-medium text-gray-700">Papel
                                                    térmico</label>
                                                <input wire:model="tipoBoleta" type="checkbox" id="tipoBoleta"
                                                    name="tipoBoleta" class="bg-white focus:bg-gray-100 border-gray-700 focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            @endif

                                            <div class="col-span-9 sm:col-span-4">
                                                <label for="direccionEntrega"
                                                    class="block text-sm font-medium text-gray-700">Direccion De
                                                    entrega</label>
                                                <textarea wire:model="direccionEntrega"
                                                    value="{{$clienteEdit->direccion_entrega}}"
                                                    placeholder="{{$clienteEdit->direccion_entrega}}"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                                    name="direccionEntrega" id="direccionEntrega" cols="60" rows="4">
                                                </textarea>
                                            </div>

                                            <div class="col-span-9 sm:col-span-4">
                                                <label for="observaciones"
                                                    class="block text-sm font-medium text-gray-700">Observaciones</label>
                                                <textarea wire:model="observaciones"
                                                    value="{{$clienteEdit->observaciones}}"
                                                    placeholder="{{$clienteEdit->observaciones}}"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                                    name="observaciones" id="observaciones" cols="60" rows="4">
                                                </textarea>
                                            </div>
                                            @else
                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="tipoCliente"
                                                    class="block text-sm font-medium text-gray-700">Tipo de cliente<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <select name="tipoCliente" wire:model="tipoCliente" autofocus
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                                    autofocus>
                                                    <option selected>Selecciona El Tipo De Cliente</option>
                                                    <option value="cliente">Cliente</option>
                                                    <option value="proveedor">Proveedor</option>
                                                </select>
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="nombre"
                                                    class="block text-sm font-medium text-gray-700">Nombre completo<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="nombre" name="nombre" id="nombre"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="celular"
                                                    class="block text-sm font-medium text-gray-700">Celular<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="celular" name="celular" id="celular"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                                    minlength="10" maxlength="10">
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="tipoDoc"
                                                    class="block text-sm font-medium text-gray-700">Tipo de
                                                    documento</label>
                                                <select name="tipoDoc" wire:model="tipoDoc"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                                    <option selected>Seleccione el tipo de documento</option>
                                                    <option value="cédula de ciudadanía">Cédula de Ciudadanía</option>
                                                    <option value="cédula de extrangería">Cédula de Extrangería</option>
                                                    <option value="tarjeta de identidad">Tarjeta de Identidad</option>
                                                    <option value="registro civil">Reistro Civil</option>
                                                    <option value="pasaporte">Pasaporte</option>
                                                    <option value="PEP">PEP</option>
                                                    <option value="NIT">NIT</option>
                                                </select>
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="numDoc"
                                                    class="block text-sm font-medium text-gray-700">Numero de
                                                    documento</label>
                                                <input type="text" wire:model="numDoc" name="numDoc" id="numDoc"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="telefono"
                                                    class="block text-sm font-medium text-gray-700">Teléfono
                                                    fijo</label>
                                                <input type="text" wire:model="telefono" name="telefono" id="telefono"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                                    minlength="8" maxlength="8">
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="contacto"
                                                    class="block text-sm font-medium text-gray-700">Contacto</label>
                                                <input type="text" wire:model="contacto" name="contacto" id="contacto"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="tipoBoleta" class="text-sm font-medium text-gray-700">Papel
                                                    térmico</label>
                                                <input wire:model="tipoBoleta" type="checkbox" id="tipoBoleta"
                                                    name="tipoBoleta" value="Papel Térmico"
                                                    class="bg-white focus:bg-gray-100 border-gray-700 focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>

                                            <div class="col-span-9 sm:col-span-4">
                                                <label for="direccionEntrega"
                                                    class="block text-sm font-medium text-gray-700">Direccion de
                                                    entrega<span class="text-red-400 font-bold"> *</span></label>
                                                <textarea wire:model="direccionEntrega"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                                    name="direccionEntrega" id="direccionEntrega" cols="60"
                                                    rows="4"></textarea>
                                            </div>

                                            <div class="col-span-9 sm:col-span-4">
                                                <label for="observaciones"
                                                    class="block text-sm font-medium text-gray-700">Observaciones</label>
                                                <textarea wire:model="observaciones"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                                    name="observaciones" id="observaciones" cols="60"
                                                    rows="4"></textarea>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-200 border-t-2 border-black text-right sm:px-6">
                                        <a href="" wire:click.prevent="cancelar()"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                                            Cancelar
                                        </a>
                                        @if($clienteEdit)
                                        <button type="submit" wire:click.prevent="update({{$clienteEdit->id}})"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400">
                                            Actualizar
                                        </button>
                                        @else
                                        <button type="submit" wire:click.prevent="save()"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400">
                                            Añadir
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            @else
                            <i wire:click.prevent="crear()" title="agregar elemento"
                                class="bi bi-person-plus m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400"></i>
                            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Clientes & proveedores</h1>
                            <div class="flex bg-gray-100 border-b-2 border-black px-4 py-3 sm:px-6 pr-">
                                <input wire:model="search" type="text"
                                    placeholder="Buscar Un Cliente Por : Celular - Telefono - Numero Documento - Dirección De Entrega"
                                    class="bg-white focus:bg-gray-100 m-3 border-gray-700 form-input mt-1 block w-full focus:border-2 block focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                <div class="m-3 form-input shadow-sm mt-1 block">
                                    <select name="perPage" wire:model="perPage"
                                        class="bg-white focus:bg-gray-100 border-gray-700 focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                        <option value="10">10 clientes por pagina</option>
                                        <option value="15">15 clientes por pagina</option>
                                        <option value="20">20 clientes por pagina</option>
                                        <option value="30">30 clientes por pagina</option>
                                        <option value="50">50 clientes por pagina</option>
                                        <option value="60">60 clientes por pagina</option>
                                        <option value="100">100 clientes por pagina</option>
                                    </select>
                                </div>
                                @if($search != '' || $perPage != 10)
                                <button wire:click.prevent="limpiarBusqueda()" title="eliminar filtros de busqueda"
                                    class="m-3 form-input rounded-md shadow-sm mt-1 block w-16 text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400">
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
                                    <tr class="text-center text-xs text-gray-900 uppercase border-l-2 border-r-2 border-b-2 border-gray-900">
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Nombre
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Celular
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Tipo Doc.
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Num Doc.
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Tipo Cliente
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Direccion Entrega
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Editar
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 tracking-wider">
                                            Borrar
                                        </th>
                                    </tr>
                                </thead>
                                @foreach($clientes as $cli)
                                <tbody class="bg-gray-200 text-center">
                                    <tr class="border-2 border-gray-900">
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            {{substr($cli->nombre, 0, 10)}}...
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            {{ '('.substr($cli->celular, 0, 3).')-'.substr($cli->celular, 3, 3).'-'.
                                                substr($cli->celular, 6, 2).'-'.substr($cli->celular, 8, 2)}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            @if($cli->tipoDocumento)
                                            {{ substr($cli->tipoDocumento, 0, 7)}}...
                                            @else
                                            {{ __('N/A') }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            @if($cli->numeroDocumento)
                                            {{substr($cli->numeroDocumento, 0, 6)}}...
                                            @else
                                            {{ __('N/A') }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            {{$cli->tipoCliente}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            {{substr($cli->direccion_entrega, 0, 10)}}...
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            <a href="" wire:click.prevent="editar({{$cli->id}})" id="openModal"><i
                                                    class="bi bi-pen bg-blue-400 hover:bg-blue-300 rounded text-lg text-white p-3"></i></a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="" wire:click.prevent="eliminar({{$cli->id}})"><i
                                                    class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="bg-gray-100 px-4 py-3 sm:px-6">
                                {{$clientes->links()}}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<head>
   <title>{{ config('app.name') }} - Clientes</title>
</head>
