<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cacfes - Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    @if($crear == 'true' || $clienteEdit != '')
                    @if($clienteEdit)
                        <h1 class="font-bold text-black p-3 text-3xl">Editar Cliente - {{$clienteEdit->nombre}} | {{$clienteEdit->id}}</h1>
                    @else
                        <h1 class="font-bold text-black p-3 text-3xl">Añadir Nuevo Cliente</h1>
                    @endif
                    <hr>
                    <form @if($clienteEdit) 
                    wire:submit.prevent="update({{$clienteEdit->id}})"
                      @else wire:submit.prevent="save()" @endif>
                        @csrf
                        <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-9 gap-6">
                            @if($clienteEdit)
                            <div class="col-span-6 sm:col-span-3">
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                                <input type="text" wire:model="nombre" value="{{$clienteEdit->nombre}}" name="nombre" id="nombre" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" autofocus autocomplete="off">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="celular" class="block text-sm font-medium text-gray-700">Celular</label>
                                <input type="text" wire:model="celular" value="{{$clienteEdit->celular}}" name="celular" id="celular" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" maxlength="10">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono Fijo</label>
                                <input type="text" wire:model="telefono" value="{{$clienteEdit->telefono}}" name="telefono" id="telefono" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" maxlength="8">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="contacto" class="block text-sm font-medium text-gray-700">Contacto</label>
                                <input type="text" wire:model="contacto" value="{{$clienteEdit->contacto}}" name="contacto" id="contacto" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            @if($clienteEdit->tipoBoleteria == 'Papel Térmico')
                            <div class="col-span-6 sm:col-span-3">
                                <label for="tipoBoleta" class="text-sm font-medium text-gray-700">Papel Térmico</label>
                                <input wire:model="tipoBoleta" type="checkbox" id="tipoBoleta" name="tipoBoleta" value="Papel Térmico" class="mt-1 focus:ring-green-400 focus:border-green-400 shadow-sm sm:text-sm border-gray-300 rounded-md" checked>
                            </div>
                            @else
                            <div class="col-span-6 sm:col-span-3">
                                <label for="tipoBoleta" class="text-sm font-medium text-gray-700">Papel Térmico</label>
                                <input wire:model="tipoBoleta" type="checkbox" id="tipoBoleta" name="tipoBoleta" value="Papel Térmico" class="mt-1 focus:ring-green-400 focus:border-green-400 shadow-sm sm:text-sm border-gray-300 rounded-md">                                                                
                            </div>
                            @endif

                            <div class="col-span-6 sm:col-span-4">
                                <label for="direccionEntrega" class="block text-sm font-medium text-gray-700">Direccion De Entrega</label>
                                <textarea wire:model="direccionEntrega" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="direccionEntrega" id="direccionEntrega" cols="60" rows="8">
                                    {{$clienteEdit->direccionEntrega}}
                                </textarea>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="observaciones" class="block text-sm font-medium text-gray-700">Observaciones</label>
                                <textarea wire:model="observaciones" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="observaciones" id="observaciones" cols="60" rows="8">
                                    {{$clienteEdit->observaciones}}
                                </textarea>
                            </div>
                            @else
                            <div class="col-span-6 sm:col-span-3">
                                <label for="tipoCliente" class="block text-sm font-medium text-gray-700">Tipo de Cliente<span class="text-red-400 font-bold"> *</span></label>
                                <select name="tipoCliente" wire:model="tipoCliente" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full" autofocus>
                                    <option selected>Selecciona El Tipo De Cliente</option>
                                    <option value="cliente">Cliente</option>
                                    <option value="proveedor">Proveedor</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="tipoDoc" class="block text-sm font-medium text-gray-700">Tipo de Documento</label>
                                <select name="tipoDoc" wire:model="tipoDoc" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
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

                            <div class="col-span-6 sm:col-span-3">
                                <label for="numDoc" class="block text-sm font-medium text-gray-700">Numero de Documento</label>
                                <input type="text" wire:model="numDoc" name="numDoc" id="numDoc" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre Completo<span class="text-red-400 font-bold"> *</span></label>
                                <input type="text" wire:model="nombre" name="nombre" id="nombre" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="celular" class="block text-sm font-medium text-gray-700">Celular<span class="text-red-400 font-bold"> *</span></label>
                                <input type="number" wire:model="celular" name="celular" id="celular" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" maxlength="10">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono Fijo</label>
                                <input type="text" wire:model="telefono" name="telefono" id="telefono" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" maxlength="8">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="contacto" class="block text-sm font-medium text-gray-700">Contacto</label>
                                <input type="text" wire:model="contacto" name="contacto" id="contacto" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="tipoBoleta" class="text-sm font-medium text-gray-700">Papel Térmico</label>
                                <input wire:model="tipoBoleta" type="checkbox" id="tipoBoleta" name="tipoBoleta" value="Papel Térmico" class="mt-1 focus:ring-green-400 focus:border-green-400 shadow-sm sm:text-sm border-gray-300 rounded-md">                                                                
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="direccionEntrega" class="block text-sm font-medium text-gray-700">Direccion De Entrega<span class="text-red-400 font-bold"> *</span></label>
                                <textarea wire:model="direccionEntrega" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="direccionEntrega" id="direccionEntrega" cols="60" rows="8"></textarea>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="observaciones" class="block text-sm font-medium text-gray-700">Observaciones</label>
                                <textarea wire:model="observaciones" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="observaciones" id="observaciones" cols="60" rows="8"></textarea>
                            </div>
                            @endif
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <a href="" wire:click.prevent="cancelar()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400">
                                Cancelar
                            </a>
                            @if($clienteEdit)
                            <button type="submit" wire:submit.prevent="update({{$clienteEdit->id}})" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400">
                                Actualizar
                            </button>
                            @else
                            <button type="submit" wire:submit.prevent="save()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400">
                                Añadir
                            </button>
                            @endif
                        </div>
                        </div>
                    </form>
                    @else
                    <i wire:click.prevent="crear()" class="bi bi-person-plus m-3 cursor-pointer float-right inline-flex justify-center  py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400"></i>
                    <h1 class="font-bold text-black p-3 text-3xl">Clientes</h1>
                    <hr>
                    <div class="flex bg-white px-4 py-3 border-t border-gray-200 sm:px-6 pr-">
                            <input wire:model="search" type="text" 
                            placeholder="Buscar Un Cliente Por : Celular - Telefono - Numero Documento - Dirección De Entrega" 
                            class="m-3 form-input rounded-md shadow-sm mt-1 block w-full focus:ring-green-400 focus:border-green-400">
                            <div class="m-3 form-input shadow-sm mt-1 block">
                                <select name="PerTipo" wire:model="perTipo" class="rounded-md focus:ring-green-400 focus:border-green-400 outline-none text-gray-500">
                                    <option>Todo</option>
                                    <option value="cliente">Clientes</option>
                                    <option value="proveedor">Proveedores</option>
                                </select>
                            </div>
                            <div class="m-3 form-input shadow-sm mt-1 block">
                                <select name="perPage" wire:model="perPage" class="rounded-md focus:ring-green-400 focus:border-green-400 outline-none text-gray-500">
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
                            <button wire:click.prevent="limpiarBusqueda()" class="m-3 form-input rounded-md shadow-sm mt-1 block w-16 text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400">
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
                    <thead class="bg-gray-50">
                        <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Celular
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tipo Doc.
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Num Doc.
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tipo Cliente
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Direccion Entrega
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Detalles
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Borrar
                        </th>
                        </tr>
                    </thead>
                    @foreach($clientes as $cli)
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{$cli->id}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{$cli->nombre}}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                <?php echo '('.substr($cli->celular, 0, 3).')-'.substr($cli->celular, 3, 3).'-'.
                                 substr($cli->celular, 6, 2).'-'.substr($cli->celular, 8, 2)?>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                            @if($cli->tipoDocumento)
                                {{$cli->tipoDocumento}} 
                            @else
                                {{ __('Sin Este Dato') }}
                            @endif</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                            @if($cli->numeroDocumento)
                                {{$cli->numeroDocumento}}
                            @else
                                {{ __('Sin Este Dato') }}
                            @endif</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{$cli->tipoCliente}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{$cli->direccion_entrega}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="" wire:click.prevent="editar({{$cli->id}})"><i class="bi bi-pen bg-blue-400 hover:bg-blue-300 rounded text-lg text-white p-3"></i></a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="" wire:click.prevent="borrar({{$cli->id}})"><i class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                        </td>
                        </tr>
                    </tbody>
                    @endforeach
                        </table>
                        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            
                        </div>
                      </div>
                    </div>
                    @endif
                </div>
            </div>
            </div>
        </div>
    </div>