<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-900 leading-tight">
        Cacfe's - Clientes
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-blue-300 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden sm:rounded-lg">
                            @if($crear == 'true' || $clienteEdit != '')
                            @if($clienteEdit)
                            <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">Editar Cliente -
                                {{substr($clienteEdit->nombre, 0, 8)}}...</h1>
                            @else
                            <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">Añadir Nuevo Cliente
                            </h1>
                            @endif
                            <form @if($clienteEdit) wire:submit.prevent="update({{$clienteEdit->id}})" @else
                                wire:submit.prevent="save()" @endif>
                                @csrf
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-blue-300 sm:p-6">
                                        <div class="grid grid-cols-9 gap-6">
                                            @if($clienteEdit)
                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="tipoCliente"
                                                    class="block text-sm font-medium text-gray-700">Tipo de Cliente<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <select name="tipoCliente" wire:model="tipoCliente" autofocus
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-blue-300 rounded-md form-select mt-1 block w-full"
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
                                                    Completo</label>
                                                <input type="text" wire:model="nombre" value="{{$clienteEdit->nombre}}"
                                                    placeholder="{{$clienteEdit->nombre}}" autocomplete="off"
                                                    name="nombre" id="nombre"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md"
                                                    autofocus>
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="celular"
                                                    class="block text-sm font-medium text-gray-700">Celular</label>
                                                <input type="text" wire:model="celular"
                                                    value="{{$clienteEdit->celular}}"
                                                    placeholder="{{$clienteEdit->celular}}" autocomplete="off"
                                                    name="celular" id="celular"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md"
                                                    maxlength="10">
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="tipoDoc"
                                                    class="block text-sm font-medium text-gray-700">Tipo de
                                                    Documento</label>
                                                <select name="tipoDoc" wire:model="tipoDoc"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-blue-300 rounded-md form-select mt-1 block w-full">
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
                                                    Fijo</label>
                                                <input type="text" wire:model="telefono"
                                                    value="{{$clienteEdit->telefono}}"
                                                    placeholder="{{$clienteEdit->telefono}}" autocomplete="off"
                                                    name="telefono" id="telefono"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md"
                                                    maxlength="8">
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="numDoc"
                                                    class="block text-sm font-medium text-gray-700">Numero de
                                                    Documento</label>
                                                <input type="text" wire:model="numDoc" name="numDoc" id="numDoc"
                                                    autocomplete="off" value="{{ $clienteEdit->numeroDocumento }}" placeholder="{{ $clienteEdit->numeroDocumento }}"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="contacto"
                                                    class="block text-sm font-medium text-gray-700">Contacto</label>
                                                <input type="text" wire:model="contacto"
                                                    value="{{$clienteEdit->contacto}}"
                                                    placeholder="{{$clienteEdit->contacto}}" autocomplete="off"
                                                    name="contacto" id="contacto"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            @if($clienteEdit->tipoBoleteria == 'Papel Térmico')
                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="tipoBoleta" class="text-sm font-medium text-gray-700">Papel
                                                    Térmico</label>
                                                <input wire:model="tipoBoleta" type="checkbox" id="tipoBoleta"
                                                    name="tipoBoleta" value="Papel Térmico"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block shadow-sm sm:text-sm rounded-md" checked>
                                            </div>
                                            @else
                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="tipoBoleta" class="text-sm font-medium text-gray-700">Papel
                                                    Térmico</label>
                                                <input wire:model="tipoBoleta" type="checkbox" id="tipoBoleta"
                                                    name="tipoBoleta" class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block shadow-sm sm:text-sm rounded-md">
                                            </div>
                                            @endif

                                            <div class="col-span-9 sm:col-span-4">
                                                <label for="direccionEntrega"
                                                    class="block text-sm font-medium text-gray-700">Direccion De
                                                    Entrega</label>
                                                <textarea wire:model="direccionEntrega"
                                                    value="{{$clienteEdit->direccion_entrega}}"
                                                    placeholder="{{$clienteEdit->direccion_entrega}}"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md"
                                                    name="direccionEntrega" id="direccionEntrega" cols="60" rows="4">
                                                </textarea>
                                            </div>

                                            <div class="col-span-9 sm:col-span-4">
                                                <label for="observaciones"
                                                    class="block text-sm font-medium text-gray-700">Observaciones</label>
                                                <textarea wire:model="observaciones"
                                                    value="{{$clienteEdit->observaciones}}"
                                                    placeholder="{{$clienteEdit->observaciones}}"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md"
                                                    name="observaciones" id="observaciones" cols="60" rows="4">
                                                </textarea>
                                            </div>
                                            <!-- TODO: else -->
                                            @else

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="tipoCliente"
                                                    class="block text-sm font-medium text-gray-700">Tipo de Cliente<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <select name="tipoCliente" wire:model="tipoCliente" autofocus
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-blue-300 rounded-md form-select mt-1 block w-full"
                                                    autofocus>
                                                    <option selected>Selecciona El Tipo De Cliente</option>
                                                    <option value="cliente">Cliente</option>
                                                    <option value="proveedor">Proveedor</option>
                                                </select>
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="nombre"
                                                    class="block text-sm font-medium text-gray-700">Nombre Completo<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="nombre" name="nombre" id="nombre"
                                                    autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="celular"
                                                    class="block text-sm font-medium text-gray-700">Celular<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="celular" name="celular" id="celular"
                                                    autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md"
                                                    maxlength="10">
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="tipoDoc"
                                                    class="block text-sm font-medium text-gray-700">Tipo de
                                                    Documento</label>
                                                <select name="tipoDoc" wire:model="tipoDoc"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-blue-300 rounded-md form-select mt-1 block w-full">
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
                                                    Documento</label>
                                                <input type="text" wire:model="numDoc" name="numDoc" id="numDoc"
                                                    autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="telefono"
                                                    class="block text-sm font-medium text-gray-700">Teléfono
                                                    Fijo</label>
                                                <input type="text" wire:model="telefono" name="telefono" id="telefono"
                                                    autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md"
                                                    maxlength="8">
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="contacto"
                                                    class="block text-sm font-medium text-gray-700">Contacto</label>
                                                <input type="text" wire:model="contacto" name="contacto" id="contacto"
                                                    autocomplete="off"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-9 sm:col-span-3">
                                                <label for="tipoBoleta" class="text-sm font-medium text-gray-700">Papel
                                                    Térmico</label>
                                                <input wire:model="tipoBoleta" type="checkbox" id="tipoBoleta"
                                                    name="tipoBoleta" value="Papel Térmico"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block shadow-sm sm:text-sm rounded-md">
                                            </div>

                                            <div class="col-span-9 sm:col-span-4">
                                                <label for="direccionEntrega"
                                                    class="block text-sm font-medium text-gray-700">Direccion De
                                                    Entrega<span class="text-red-400 font-bold"> *</span></label>
                                                <textarea wire:model="direccionEntrega"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md"
                                                    name="direccionEntrega" id="direccionEntrega" cols="60"
                                                    rows="4"></textarea>
                                            </div>

                                            <div class="col-span-9 sm:col-span-4">
                                                <label for="observaciones"
                                                    class="block text-sm font-medium text-gray-700">Observaciones</label>
                                                <textarea wire:model="observaciones"
                                                    class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md"
                                                    name="observaciones" id="observaciones" cols="60"
                                                    rows="4"></textarea>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-blue-300 border-t-2 border-black text-right sm:px-6">
                                        <a href="" wire:click.prevent="cancelar()"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                                            Cancelar
                                        </a>
                                        @if($clienteEdit)
                                        <button type="submit" wire:submit.prevent="update({{$clienteEdit->id}})"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400">
                                            Actualizar
                                        </button>
                                        @else
                                        <button type="submit" wire:submit.prevent="save()"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400">
                                            Añadir
                                        </button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            @else
                            <i wire:click.prevent="crear()"
                                class="bi bi-person-plus m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400"></i>
                            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Clientes & Proveedores
                            </h1>
                            <div class="flex bg-blue-300 px-4 py-3 sm:px-6 pr-">
                                <input wire:model="search" type="text"
                                    placeholder="Buscar Un Cliente Por : Celular - Telefono - Numero Documento - Dirección De Entrega"
                                    class="text-gray-900 bg-green-300 focus:bg-green-400 m-3 form-input rounded-md shadow-sm mt-1 block w-full focus:ring-blue-500 focus:border-blue-500">
                                <div class="m-3 form-input shadow-sm mt-1 block">
                                    <select name="perPage" wire:model="perPage"
                                        class="bg-green-300 focus:bg-green-400 rounded-md focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-900">
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
                                <button wire:click.prevent="limpiarBusqueda()"
                                    class="m-3 form-input rounded-md shadow-sm mt-1 block w-16 text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400">
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
                                            Nombre
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                            Celular
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                            Tipo Doc.
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                            Num Doc.
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                            Tipo Cliente
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider text-xs">
                                            Direccion Entrega
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
                                @foreach($clientes as $cli)
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr class="text-center bg-pink-300 border-2 border-pink-400">
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            {{substr($cli->nombre, 0, 10)}}...
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            {{ '('.substr($cli->celular, 0, 3).')-'.substr($cli->celular, 3, 3).'-'.
                                                substr($cli->celular, 6, 2).'-'.substr($cli->celular, 8, 2)}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            @if($cli->tipoDocumento)
                                            {{ substr($cli->tipoDocumento, 0, 7)}}...
                                            @else
                                            {{ __('N/A') }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            @if($cli->numeroDocumento)
                                            {{substr($cli->numeroDocumento, 0, 6)}}...
                                            @else
                                            {{ __('N/A') }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            {{$cli->tipoCliente}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            {{substr($cli->direccion_entrega, 0, 10)}}...
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            <a href="" wire:click.prevent="editar({{$cli->id}})" id="openModal"><i
                                                    class="bi bi-pen bg-blue-400 hover:bg-blue-300 rounded text-lg text-white p-3"></i></a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            <a href="" wire:click.prevent="borrar({{$cli->id}})"><i
                                                    class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="bg-blue-300 px-4 py-3 sm:px-6">
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