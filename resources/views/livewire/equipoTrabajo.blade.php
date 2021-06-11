<head>
   <title>{{ config('app.name') }} - Equipo de Trabajo</title>
</head>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-900 leading-tight">
        Cacfe's - Equipo De Trabajo
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-blue-300 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden sm:rounded-lg">
                            @if($crear == 'true' || $miembroEdit != '')
                            @if($miembroEdit != '')
                            <h1 class="font-bold text-black p-3 text-xl sm:text-3xl border-b-2 border-black">Editar Datos Del
                                Miembro - #{{$miembroEdit->id}}</h1>
                            @else
                            <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">Añadir Nuevo Miebro
                            </h1>
                            @endif

                            <form>
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-blue-300 sm:p-6">
                                        <div class="grid grid-cols-12 gap-6">
                                            @if($miembroEdit != '')
                                            <div class="col-span-12 sm:col-span-3">
                                                <label for="nombre"
                                                    class="block text-sm font-medium text-gray-700">Nombre</label>
                                                <input type="text" wire:model="nombre" value="{{$miembroEdit->nombre}}"
                                                    placeholder="{{$miembroEdit->nombre}}" name="nombre"
                                                    autocomplete="off"
                                                    class="mt-1 focus:ring-blue-400 bg-pink-200 focus:bg-pink-300 focus:border-blue-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-3">
                                                <label for="apellidos"
                                                    class="block text-sm font-medium text-gray-700">Apellido</label>
                                                <input type="text" wire:model="apellido"
                                                    value="{{$miembroEdit->apellido}}"
                                                    placeholder="{{$miembroEdit->apellido}}" name="apellidos"
                                                    autocomplete="off"
                                                    class="mt-1 focus:ring-blue-400 bg-pink-200 focus:bg-pink-300 focus:border-blue-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-3">
                                                <label for="telefono"
                                                    class="block text-sm font-medium text-gray-700">Telefono</label>
                                                <input type="number" wire:model="telefono"
                                                    value="{{$miembroEdit->telefono}}"
                                                    placeholder="{{$miembroEdit->telefono}}" name="telefono"
                                                    autocomplete="off"
                                                    class="mt-1 focus:ring-blue-400 bg-pink-200 focus:bg-pink-300 focus:border-blue-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-3">
                                                <label for="fechaNacimiento"
                                                    class="block text-sm font-medium text-gray-700">Fecha De
                                                    Nacimiento</label>
                                                <input type="date" wire:model="fechaNacimiento"
                                                    value="{{$miembroEdit->fecha_nacimiento}}"
                                                    placeholder="{{$miembroEdit->fecha_nacimiento}}"
                                                    name="fechaNacimiento" autocomplete="off"
                                                    class="mt-1 focus:ring-blue-400 bg-pink-200 focus:bg-pink-300 focus:border-blue-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-4">
                                                <label for="mes" class="block text-sm font-medium text-gray-700">Mes De
                                                    Cumpleaños</label>
                                                <input type="text" wire:model="mes"
                                                    value="{{$miembroEdit->mes_cumpleaños}}"
                                                    placeholder="{{$miembroEdit->mes_cumpleaños}}" name="mes"
                                                    autocomplete="off"
                                                    class="mt-1 focus:ring-blue-400 bg-pink-200 focus:bg-pink-300 focus:border-blue-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-4">
                                                <label for="dia" class="block text-sm font-medium text-gray-700">Dia De
                                                    Cumpleaños</label>
                                                <input type="number" wire:model="dia"
                                                    value="{{$miembroEdit->dia_cumpleaños}}"
                                                    placeholder="{{$miembroEdit->dia_cumpleaños}}" name="dia"
                                                    autocomplete="off"
                                                    class="mt-1 focus:ring-blue-400 bg-pink-200 focus:bg-pink-300 focus:border-blue-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-4">
                                                <label for="inicioLabor"
                                                    class="block text-sm font-medium text-gray-700">Inicio De
                                                    Labor</label>
                                                <input type="date" wire:model="inicioLabor"
                                                    value="{{$miembroEdit->inicio_labores}}"
                                                    placeholder="{{$miembroEdit->inicio_labores}}" name="inicioLabor"
                                                    autocomplete="off"
                                                    class="mt-1 focus:ring-blue-400 bg-pink-200 focus:bg-pink-300 focus:border-blue-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            @else
                                            <div class="col-span-12 sm:col-span-3">
                                                <label for="nombre"
                                                    class="block text-sm font-medium text-gray-700">Nombre<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input autofocus type="text" wire:model="nombre" name="nombre"
                                                    autocomplete="off"
                                                    class="mt-1 focus:ring-blue-400 bg-pink-200 focus:bg-pink-300 focus:border-blue-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-3">
                                                <label for="apellidos"
                                                    class="block text-sm font-medium text-gray-700">Apellido<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="apellido" name="apellidos"
                                                    autocomplete="off"
                                                    class="mt-1 focus:ring-blue-400 bg-pink-200 focus:bg-pink-300 focus:border-blue-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-3">
                                                <label for="telefono"
                                                    class="block text-sm font-medium text-gray-700">Telefono<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="telefono" name="telefono"
                                                    autocomplete="off"
                                                    class="mt-1 focus:ring-blue-400 bg-pink-200 focus:bg-pink-300 focus:border-blue-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-3">
                                                <label for="fechaNacimiento"
                                                    class="block text-sm font-medium text-gray-700">Fecha De
                                                    Nacimiento</label>
                                                <input type="date" wire:model="fechaNacimiento" name="fechaNacimiento"
                                                    autocomplete="off"
                                                    class="mt-1 focus:ring-blue-400 bg-pink-200 focus:bg-pink-300 focus:border-blue-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-4">
                                                <label for="mes" class="block text-sm font-medium text-gray-700">Mes De
                                                    Cumpleaños<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="mes" name="mes" autocomplete="off"
                                                    class="mt-1 focus:ring-blue-400 bg-pink-200 focus:bg-pink-300 focus:border-blue-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-4">
                                                <label for="dia" class="block text-sm font-medium text-gray-700">Dia De
                                                    Cumpleaños<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="dia" name="dia" autocomplete="off"
                                                    class="mt-1 focus:ring-blue-400 bg-pink-200 focus:bg-pink-300 focus:border-blue-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-4">
                                                <label for="inicioLabor"
                                                    class="block text-sm font-medium text-gray-700">Inicio De Labor<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="date" wire:model="inicioLabor" name="inicioLabor"
                                                    autocomplete="off"
                                                    class="mt-1 focus:ring-blue-400 bg-pink-200 focus:bg-pink-300 focus:border-blue-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-blue-300 border-t-2 border-black text-right sm:px-6">
                                        <a href="" wire:click.prevent="cancelar()"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                                            Cancelar
                                        </a>
                                        @if($miembroEdit != '')
                                        <button type="submit" wire:click.prevent="update({{$miembroEdit->id}})"
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
                                class="bi bi-plus m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400"></i>
                            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Miebros</h1>
                            <div class="flex bg-blue-300 border-b-2 border-black px-4 py-3 sm:px-6 pr-">
                                <input wire:model="search" type="text"
                                    placeholder="Buscar Un Miembro Por : Nombre - Apellido - Telefono"
                                    class="bg-green-200 focus:bg-green-300 m-3 form-input rounded-md shadow-sm mt-1 block w-full focus:ring-blue-500 focus:border-blue-500">
                                <div class="m-3 form-input shadow-sm mt-1 block">
                                    <select name="perPage" wire:model="perPage"
                                        class="bg-green-200 focus:bg-green-300 rounded-md focus:ring-blue-500 focus:border-blue-500 outline-none text-gray-500">
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
                                    <tr class="text-center text-xs text-white uppercase border-2 border-pink-400">
                                        <th scope="col"
                                            class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider">
                                            Nombre
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider">
                                            Apellido
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider">
                                            Telefono
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider">
                                            Mes
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider">
                                            Dia
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider">
                                            Edad
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider">
                                            Dias Labor
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium border-r-2 border-pink-400 tracking-wider">
                                            Editar
                                        </th>
                                        <th scope="col" class="px-6 py-3 font-medium tracking-wider">
                                            Borrar
                                        </th>
                                    </tr>
                                </thead>
                                @foreach($miembros as $mi)
                                <tbody class="bg-pink-300 divide-y divide-gray-200 text-center">
                                    <tr class="border-2 border-pink-400">
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            {{ $mi->nombre }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            {{ $mi->apellido }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            {{ $mi->telefono }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            {{ $mi->mes_cumpleaños }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            {{ $mi->dia_cumpleaños }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            <?php $tmpFechaNacimiento = new \Carbon\Carbon($mi->fecha_nacimiento) ?>
                                            <?php $tmpHoyNacimiento = new \Carbon\Carbon(date('Y-m-d')) ?>
                                            {{ number_format($tmpFechaNacimiento->diffInYears($tmpHoyNacimiento)) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            <?php $tmpInicioLabores = new \Carbon\Carbon($mi->inicio_labores) ?>
                                            <?php $tmpHoyLabor = new \Carbon\Carbon(date('Y-m-d')) ?>
                                            {{ number_format($tmpInicioLabores->diffInDays($tmpHoyLabor)) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-pink-400">
                                            <a href="" wire:click.prevent="editar({{$mi->id}})"><i
                                                    class="bi bi-pen bg-blue-400 hover:bg-blue-300 rounded text-lg text-white p-3"></i></a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="" wire:click.prevent="borrar({{$mi->id}})"><i
                                                    class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="bg-blue-300 px-4 py-3 sm:px-6">
                                {{$miembros->links()}}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>