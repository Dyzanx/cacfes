<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cacfes - Equipo De Trabajo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    @if($crear == 'true' || $miembroEdit != '')
                        @if($miembroEdit != '')
                        <h1 class="font-bold text-black p-3 text-3xl">Editar Miembro - {{$miembroEdit->nombre}}</h1>
                        @else
                        <h1 class="font-bold text-black p-3 text-3xl">Añadir Nuevo Miebro</h1>
                        @endif

                        <form>
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-12 gap-6">
                                        @if($miembroEdit != '')
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                                                <input type="text" wire:model="nombre" value="{{$miembroEdit->nombre}}" placeholder="{{$miembroEdit->nombre}}" name="nombre" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellido</label>
                                                <input type="text" wire:model="apellido" value="{{$miembroEdit->apellido}}" placeholder="{{$miembroEdit->apellido}}" name="apellidos" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="telefono" class="block text-sm font-medium text-gray-700">Telefono</label>
                                                <input type="number" wire:model="telefono" value="{{$miembroEdit->telefono}}" placeholder="{{$miembroEdit->telefono}}" name="telefono" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="fechaNacimiento" class="block text-sm font-medium text-gray-700">Fecha De Nacimiento</label>
                                                <input type="date" wire:model="fechaNacimiento" value="{{$miembroEdit->fecha_nacimiento}}" placeholder="{{$miembroEdit->fecha_nacimiento}}" name="fechaNacimiento" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="mes" class="block text-sm font-medium text-gray-700">Mes De Cumpleaños</label>
                                                <input type="text" wire:model="mes" value="{{$miembroEdit->mes_cumpleaños}}" placeholder="{{$miembroEdit->mes_cumpleaños}}" name="mes" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="dia" class="block text-sm font-medium text-gray-700">Dia De Cumpleaños</label>
                                                <input type="text" wire:model="dia" value="{{$miembroEdit->dia_cumpleaños}}" placeholder="{{$miembroEdit->dia_cumpleaños}}" name="dia" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="inicioLabor" class="block text-sm font-medium text-gray-700">Inicio De Labor</label>
                                                <input type="date" wire:model="inicioLabor" value="{{$miembroEdit->inicio_labores}}" placeholder="{{$miembroEdit->inicio_labores}}" name="inicioLabor" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="edad" class="block text-sm font-medium text-gray-700">Edad</label>
                                                <input type="number" wire:model="edad" value="{{$miembroEdit->edad}}" placeholder="{{$miembroEdit->edad}}" name="edad" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="dias" class="block text-sm font-medium text-gray-700">Dias</label>
                                                <input type="number" wire:model="dias" value="{{$miembroEdit->dias}}" placeholder="{{$miembroEdit->dias}}" name="dias" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                        @else
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="nombre" name="nombre" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellido<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="apellido" name="apellidos" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="telefono" class="block text-sm font-medium text-gray-700">Telefono<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="telefono" name="telefono" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="fechaNacimiento" class="block text-sm font-medium text-gray-700">Fecha De Nacimiento</label>
                                                <input type="date" wire:model="fechaNacimiento" name="fechaNacimiento" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="mes" class="block text-sm font-medium text-gray-700">Mes De Cumpleaños<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="mes" name="mes" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="dia" class="block text-sm font-medium text-gray-700">Dia De Cumpleaños<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="dia" name="dia" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="inicioLabor" class="block text-sm font-medium text-gray-700">Inicio De Labor<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="date" wire:model="inicioLabor" name="inicioLabor" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="edad" class="block text-sm font-medium text-gray-700">Edad<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="edad" name="edad" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-3 sm:col-span-3">
                                                <label for="dias" class="block text-sm font-medium text-gray-700">Dias</label>
                                                <input type="number" wire:model="dias" name="dias" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <a href="" wire:click.prevent="cancelar()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400">
                                        Cancelar
                                    </a>
                                    @if($miembroEdit != '')
                                        <button type="submit" wire:click.prevent="update({{$miembroEdit->id}})" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400">
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
                        <h1 class="font-bold text-black p-3 text-3xl">Miebros</h1>
                        <hr>
                        <div class="flex bg-white px-4 py-3 border-t border-gray-200 sm:px-6 pr-">
                            <input wire:model="search" type="text" 
                            placeholder="Buscar Un Miembro Por : Nombre - Apellido - Edad - Telefono" 
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
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Apellido
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Telefono
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Mes
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Dia
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Edad
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Dias De Labor
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Editar
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Borrar
                                    </th>
                                </tr>
                            </thead>
                            @foreach($miembros as $mi)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{$mi->id}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $mi->nombre }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $mi->apellido }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $mi->telefono }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $mi->mes_cumpleaños }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $mi->dia_cumpleaños }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $mi->edad }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $mi->dias }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="" wire:click.prevent="editar({{$mi->id}})"><i class="bi bi-pen bg-blue-400 hover:bg-blue-300 rounded text-lg text-white p-3"></i></a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="" wire:click.prevent="borrar({{$mi->id}})"><i class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                        </table>
                    @endif
                    <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>