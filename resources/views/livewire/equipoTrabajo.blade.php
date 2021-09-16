<x-slot name="header">
    <h2 class="font-semibold text-xl text-white leading-tight">
        Cacfe's - Equipo de trabajo
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
                            <div class="shadow overflow-hidden border-b border-gray-200 rounded-lg sm:rounded-lg">
                                <i wire:click.prevent="cancelar()" title="salir de esta ventana"
                                    class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400"></i>
                                <h1 class="font-bold text-black p-3 text-xl sm:text-3xl border-b-2 border-black">Estas
                                    seguro de eliminar este elemento?</h1>
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
                            @if($crear == 'true' || $miembroEdit != '')
                            @if($miembroEdit != '')
                            <h1 class="font-bold text-black p-3 text-xl sm:text-3xl border-b-2 border-black">Editar
                                datos del
                                miembro - #{{$miembroEdit->id}}</h1>
                            @else
                            <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">Añadir
                                nuevo miebro</h1>
                            @endif

                            <form>
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-gray-100 sm:p-6">
                                        <div class="grid grid-cols-12 gap-6">
                                            @if($miembroEdit != '')
                                            <div class="col-span-12 sm:col-span-3 md:col-span-4">
                                                <label for="nombre"
                                                    class="block text-sm font-medium text-gray-700">Nombre</label>
                                                <input type="text" wire:model="nombre" value="{{$miembroEdit->nombre}}"
                                                    placeholder="{{$miembroEdit->nombre}}" name="nombre"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-3 md:col-span-4">
                                                <label for="apellidos"
                                                    class="block text-sm font-medium text-gray-700">Apellido</label>
                                                <input type="text" wire:model="apellido"
                                                    value="{{$miembroEdit->apellido}}"
                                                    placeholder="{{$miembroEdit->apellido}}" name="apellidos"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-3 md:col-span-4">
                                                <label for="telefono"
                                                    class="block text-sm font-medium text-gray-700">Telefono</label>
                                                <input type="number" wire:model="telefono"
                                                    value="{{$miembroEdit->telefono}}"
                                                    placeholder="{{$miembroEdit->telefono}}" name="telefono"
                                                    autocomplete="off"
                                                    class="mbg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-3 md:col-span-4">
                                                <label for="fechaNacimiento"
                                                    class="block text-sm font-medium text-gray-700">Fecha de
                                                    nacimiento</label>
                                                <input type="date" wire:model="fechaNacimiento"
                                                    value="{{$miembroEdit->fecha_nacimiento}}"
                                                    placeholder="{{$miembroEdit->fecha_nacimiento}}"
                                                    name="fechaNacimiento" autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-4 md:col-span-4">
                                                <label for="mes" class="block text-sm font-medium text-gray-700">Mes de
                                                    cumpleaños</label>
                                                <input type="text" wire:model="mes"
                                                    value="{{$miembroEdit->mes_cumpleaños}}"
                                                    placeholder="{{$miembroEdit->mes_cumpleaños}}" name="mes"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-4 md:col-span-4">
                                                <label for="dia" class="block text-sm font-medium text-gray-700">Dia de
                                                    cumpleaños</label>
                                                <input type="number" wire:model="dia"
                                                    value="{{$miembroEdit->dia_cumpleaños}}"
                                                    placeholder="{{$miembroEdit->dia_cumpleaños}}" name="dia"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-4 md:col-span-12">
                                                <label for="inicioLabor"
                                                    class="block text-sm font-medium text-gray-700">Inicio de
                                                    labor</label>
                                                <input type="date" wire:model="inicioLabor"
                                                    value="{{$miembroEdit->inicio_labores}}"
                                                    placeholder="{{$miembroEdit->inicio_labores}}" name="inicioLabor"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            @else
                                            <div class="col-span-12 sm:col-span-3 md:col-span-4">
                                                <label for="nombre"
                                                    class="block text-sm font-medium text-gray-700">Nombre<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input autofocus type="text" wire:model="nombre" name="nombre"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-3 md:col-span-4">
                                                <label for="apellidos"
                                                    class="block text-sm font-medium text-gray-700">Apellido<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="apellido" name="apellidos"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-3 md:col-span-4">
                                                <label for="telefono"
                                                    class="block text-sm font-medium text-gray-700">Telefono<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="telefono" name="telefono"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-3 md:col-span-4">
                                                <label for="fechaNacimiento"
                                                    class="block text-sm font-medium text-gray-700">Fecha de
                                                    nacimiento</label>
                                                <input type="date" wire:model="fechaNacimiento" name="fechaNacimiento"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-4 md:col-span-4">
                                                <label for="mes" class="block text-sm font-medium text-gray-700">Mes de
                                                    cumpleaños<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="text" wire:model="mes" name="mes" autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-4 md:col-span-4">
                                                <label for="dia" class="block text-sm font-medium text-gray-700">Dia de
                                                    cumpleaños<span class="text-red-400 font-bold"> *</span></label>
                                                <input type="number" wire:model="dia" name="dia" autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            <div class="col-span-12 sm:col-span-4 md:col-span-12">
                                                <label for="inicioLabor"
                                                    class="block text-sm font-medium text-gray-700">Inicio de labor<span
                                                        class="text-red-400 font-bold"> *</span></label>
                                                <input type="date" wire:model="inicioLabor" name="inicioLabor"
                                                    autocomplete="off"
                                                    class="bg-white focus:bg-gray-100 border-gray-700  w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-200 border-t-2 border-black text-right sm:px-6">
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
                            <i wire:click.prevent="crear()" title="agregar elemento"
                                class="bi bi-plus m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400"></i>
                            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Miebros de la empresa
                            </h1>
                            <div class="flex bg-gray-100 border-b-2 border-black px-4 py-3 sm:px-6 pr-">
                                <input wire:model="search" type="text"
                                    placeholder="Buscar Un Miembro Por : Nombre - Apellido - Telefono"
                                    class="bg-white focus:bg-gray-100 m-3 border-gray-700 form-input mt-1 block w-full focus:border-2 block focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                <div class="m-3 form-input shadow-sm mt-1 block">
                                    <select name="perPage" wire:model="perPage"
                                        class="bg-white focus:bg-gray-100 border-gray-700 focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
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
                                <button wire:click.prevent="limpiarBusqueda()" title="borrar filtros de busqueda"
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
                                <thead class="bg-gray-50">
                                    <tr
                                        class="text-center text-xs text-gray-900 uppercase border-l-2 border-r-2 border-b-2 border-gray-900">
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Nombres
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Apellidos
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Telefono
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Mes
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Dia
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Edad
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 font-medium bg-gray-300 border-r-2 border-gray-900 tracking-wider">
                                            Dias Labor
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
                                @foreach($miembros as $mi)
                                <tbody class="bg-gray-200 text-center">
                                    <tr class="border-2 border-gray-900">
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            {{ $mi->nombre }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            {{ $mi->apellido }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            {{ $mi->telefono }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            {{ $mi->mes_cumpleaños }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            {{ $mi->dia_cumpleaños }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            @php $tmpFechaNacimiento = new \Carbon\Carbon($mi->fecha_nacimiento) @endphp
                                            @php $tmpHoyNacimiento = new \Carbon\Carbon(date('Y-m-d')) @endphp
                                            {{ number_format($tmpFechaNacimiento->diffInYears($tmpHoyNacimiento)) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            @php $tmpInicioLabores = new \Carbon\Carbon($mi->inicio_labores) @endphp
                                            @php $tmpHoyLabor = new \Carbon\Carbon(date('Y-m-d')) @endphp
                                            {{ number_format($tmpInicioLabores->diffInDays($tmpHoyLabor)) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap border-r-2 border-gray-900">
                                            <a href="" wire:click.prevent="editar({{$mi->id}})"><i
                                                    class="bi bi-pen bg-blue-400 hover:bg-blue-300 rounded text-lg text-white p-3"></i></a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="" wire:click.prevent="eliminar({{$mi->id}})"><i
                                                    class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <div class="bg-gray-100 px-4 py-3 sm:px-6">
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

<head>
    <title>{{ config('app.name') }} - Equipo de trabajo</title>
</head>