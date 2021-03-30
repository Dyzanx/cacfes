<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cacfes - Facturación De Costos') }}
        </h2>
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        @if($crear == 'true' || $productoEdit != '')
                        @if($productoEdit != '')
                        <h1 class="font-bold text-black p-3 text-3xl">Editar Facturación De Costo - {{$productoEdit->cliente}}</h1>
                        @else
                        <h1 class="font-bold text-black p-3 text-3xl">Añadir Nueva Facturación De Costo</h1>
                        @endif
                        <hr>

                        <form @if($productoEdit) 
                        wire:submit.prevent="update({{$productoEdit->id}})"
                        @else wire:submit.prevent="save()" @endif>
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-11 gap-6">
                                        @csrf
                                        @if($productoEdit != '') 
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="item" class="block text-sm font-medium text-gray-700">Item</label>
                                            <select name="item" wire:model="item" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                <option value="{{$pEditItem->id}}" selected>{{$pEditItem->nombre}}</option>
                                                @foreach($items as $item)
                                                    @if($pEditItem->nombre != $item->nombre)
                                                        <option value="{{$item->id}}">{{$item->nombre}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria</label>
                                            <select name="categoria" wire:model="categoria" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                <option value="{{$pEditCat->id}}" selected>{{$pEditCat->nombre}}</option>
                                                @foreach($categorias as $cat)
                                                    @if($pEditCat->nombre != $cat->nombre)
                                                        <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="udMedida" class="block text-sm font-medium text-gray-700">Unidad De Medida</label>
                                            <select name="udMedida" wire:model="udMedida" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                @if($productoEdit->unidad_medida)
                                                    <option value="{{$productoEdit->unidad_medida}}" selected>{{$productoEdit->unidad_medida}}</option>
                                                @else
                                                    <option selected>Seleccione la unidad de medida</option>
                                                @endif
                                                <option value="GR">GR</option>
                                                <option value="HR">HR</option>
                                                <option value="KL">KL</option>
                                                <option value="M Lineal">M Lineal</option>
                                                <option value="M.O">M.O</option>
                                                <option value="Min">Min</option>
                                                <option value="MT">MT</option>
                                                <option value="MT L">MT L</option>
                                                <option value="Paño">Paño</option>
                                                <option value="Par">Par</option>
                                                <option value="PQ">PQ</option>
                                                <option value="Tubo">Tubo</option>
                                                <option value="UD">UD</option>
                                                <option value="UN">UN</option>
                                                <option value="YD">YD</option>
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="proveedor" class="block text-sm font-medium text-gray-700">Proveedor</label>
                                            <select name="proveedor" wire:model="proveedor" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                <option selected>Seleccione el proveedor</option>
                                                @foreach($proveedores as $prov)
                                                    <option value="{{$prov->id}}">{{$prov->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="cliente" class="block text-sm font-medium text-gray-700">Cliente</label>
                                            <select name="cliente" wire:model="cliente" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                <option selected>Seleccione el cliente</option>
                                                @foreach($clientes as $cli)
                                                    <option value="{{$cli->id}}">{{$cli->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
                                            <input type="number" wire:model="cantidad" placeholder="{{$productoEdit->cantidad}}" value="{{$productoEdit->cantidad}}" name="cantidad" id="cantidad" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="valUnitario" class="block text-sm font-medium text-gray-700">Valor Unitario</label>
                                            <input type="number" wire:model="valUnitario" placeholder="{{$productoEdit->valUnitario}}" value="{{$productoEdit->valUnitario}}" name="valUnitario" id="valUnitario" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="descuento" class="block text-sm font-medium text-gray-700">Descuento</label>
                                            <input type="number" wire:model="descuento" placeholder="{{$productoEdit->descuento}}%" value="{{$productoEdit->descuento}}" name="descuento" id="descuento" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" maxlength="3">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                                            <input type="text" wire:model="direccion" placeholder="{{$productoEdit->direccion}}" value="{{$productoEdit->direccion}}" name="direccion" id="direccion" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                                            <input type="date" wire:model="fecha" name="fecha" id="fecha" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripcion</label>
                                            <textarea wire:model="descripcion" placeholder="{{$productoEdit->descripcion}}" value="{{$productoEdit->descripcion}}" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="observaciones" id="observaciones" cols="60" rows="8"></textarea>
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="observaciones" class="block text-sm font-medium text-gray-700">Observaciones</label>
                                            <textarea wire:model="observaciones" placeholder="{{$productoEdit->observaciones}}" value="{{$productoEdit->observaciones}}" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="observaciones" id="observaciones" cols="60" rows="8"></textarea>
                                        </div>


                                        @else
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="item" class="block text-sm font-medium text-gray-700">Tipo De Costo<span class="text-red-400 font-bold"> *</span></label>
                                            <select name="item" wire:model="item" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                <option selected>Seleccione el tipo de costo</option>
                                                @foreach($items as $item)
                                                    <option value="{{$item->id}}">{{$item->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="categoria" class="block text-sm font-medium text-gray-700">Categoria<span class="text-red-400 font-bold"> *</span></label>
                                            <select name="categoria" wire:model="categoria" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                <option selected>Seleccione la categoria</option>
                                                @foreach($categorias as $cat)
                                                    <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="udMedida" class="block text-sm font-medium text-gray-700">Unidad De Medida</label>
                                            <select name="udMedida" wire:model="udMedida" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                <option selected>Seleccione la unidad de medida</option>
                                                <option value="GR">GR</option>
                                                <option value="HR">HR</option>
                                                <option value="KL">KL</option>
                                                <option value="M Lineal">M Lineal</option>
                                                <option value="M.O">M.O</option>
                                                <option value="Min">Min</option>
                                                <option value="MT">MT</option>
                                                <option value="MT L">MT L</option>
                                                <option value="Paño">Paño</option>
                                                <option value="Par">Par</option>
                                                <option value="PQ">PQ</option>
                                                <option value="Tubo">Tubo</option>
                                                <option value="UD">UD</option>
                                                <option value="UN">UN</option>
                                                <option value="YD">YD</option>
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="proveedor" class="block text-sm font-medium text-gray-700">Proveedor<span class="text-red-400 font-bold"> *</span></label>
                                            <select name="proveedor" wire:model="proveedor" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                <option selected>Seleccione el proveedor</option>
                                                @foreach($proveedores as $prov)
                                                    <option value="{{$prov->id}}">{{$prov->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="cliente" class="block text-sm font-medium text-gray-700">Cliente<span class="text-red-400 font-bold"> *</span></label>
                                            <select name="cliente" wire:model="cliente" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full">
                                                <option selected>Seleccione el cliente</option>
                                                @foreach($clientes as $cli)
                                                    <option value="{{$cli->id}}">{{$cli->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad<span class="text-red-400 font-bold"> *</span></label>
                                            <input type="number" wire:model="cantidad" name="cantidad" id="cantidad" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="valUnitario" class="block text-sm font-medium text-gray-700">Valor Unitario<span class="text-red-400 font-bold"> *</span></label>
                                            <input type="number" wire:model="valUnitario" name="valUnitario" id="valUnitario" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="descuento" class="block text-sm font-medium text-gray-700">Descuento</label>
                                            <input type="number" wire:model="descuento" name="descuento" id="descuento" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" maxlength="3">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección<span class="text-red-400 font-bold"> *</span></label>
                                            <input type="text" wire:model="direccion" name="direccion" id="direccion" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha<span class="text-red-400 font-bold"> *</span></label>
                                            <input type="date" wire:model="fecha" name="fecha" id="fecha" autocomplete="off" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripcion</label>
                                            <textarea wire:model="descripcion" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="observaciones" id="observaciones" cols="60" rows="8"></textarea>
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <label for="observaciones" class="block text-sm font-medium text-gray-700">Observaciones</label>
                                            <textarea wire:model="observaciones" class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="observaciones" id="observaciones" cols="60" rows="8"></textarea>
                                        </div>
                                        
                                        <div class="col-span-6 sm:col-span-3 bg-grey-lighter">
                                            <label class="w-64 flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-pink-400 cursor-pointer hover:bg-pink-400 hover:text-white">
                                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                                </svg>
                                                <span class="mt-2 text-base leading-normal">Selecciona La Foto </span>
                                                <input type='file' wire:model="image_path" class="hidden" />
                                            </label>
                                        </div>
                                        @endif
                                    </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    @if($descuento != '' || $cantidad != '' || $valUnitario != '' || $direccion != '')
                                    <a href="" wire:click.prevent="limpiar()" class="mr-2 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-400 hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400">
                                        Limpiar Campos
                                    </a>
                                    @endif
                                    <a href="" wire:click.prevent="cancelar()" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400">
                                        Cancelar
                                    </a>
                                    @if($productoEdit != '')
                                    <button type="submit" wire:click.prevent="update({{$productoEdit->id}})" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400">
                                        Actualizar
                                    </button>
                                    @else
                                    <button wire:click.prevent="save()" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400">
                                        Crear
                                    </button>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                        @else 
                        <i wire:click.prevent="crear()" class="bi bi-bag-plus-fill m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400"></i>
                        <h1 class="font-bold text-black p-3 text-3xl">Facturación De Costos</h1>
                        <hr>
                        <div class="flex bg-white px-4 py-3 border-t border-gray-200 sm:px-6 pr-">
                            <input wire:model="search" type="text" 
                            placeholder="Buscar Un Producto Por : Direccion - Cantidad - Valor Unitario - Descuento" 
                            class="m-3 form-input rounded-md shadow-sm mt-1 block w-full focus:ring-green-400 focus:border-green-400">
                            <div class="m-3 form-input shadow-sm mt-1 block">
                                <select name="perPage" wire:model="perPage" class="rounded-md focus:ring-green-400 focus:border-green-400 outline-none text-gray-500">
                                    <option value="10">10 productos por pagina</option>
                                    <option value="15">15 productos por pagina</option>
                                    <option value="20">20 productos por pagina</option>
                                    <option value="30">30 productos por pagina</option>
                                    <option value="50">50 productos por pagina</option>
                                    <option value="60">60 productos por pagina</option>
                                    <option value="100">100 productos por pagina</option>
                                </select>
                            </div>
                            @if($search != '' || $perPage != 10)
                            <button wire:click.prevent="limpiarBusqueda()" class="m-3 form-input rounded-md shadow-sm mt-1 block w-16 text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400">
                                <i class="bi bi-x"></i>
                            </button>
                            @endif
                        </div>
                        @if($mensajeSuccess != '')
                            <hr>
                            <strong class="font-bold text-green-700 pl-2">{{$mensajeSuccess}}</strong>
                        @elseif($mensajeError != '')
                            <hr>
                            <strong class="font-bold text-red-700 pl-2">{{$mensajeError}}</strong>
                        @endif
                        <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Dirección
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Cantidad
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Valor Unitario
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Valor Sin Descuento
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Descuento
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Valor Con Descuento
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Editar
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Borrar
                            </th>
                            </tr>
                        </thead>
                        @foreach($productos as $pro)
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{$pro->id}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $pro->direccion }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ number_format($pro->cantidad) }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        $ {{ number_format($pro->valor_unitario) }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        $ {{ __(number_format($pro->valor_unitario*$pro->cantidad)) }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $pro->descuento }}%
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        @if($pro->descuento >= 100)
                                            $ {{ __(0)}}
                                        @else
                                            $ {{ __(number_format(round((($pro->valor_unitario*$pro->cantidad)*$pro->descuento)/100))) }}
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="" wire:click.prevent="editar({{$pro->id}})"><i class="bi bi-pen bg-blue-400 hover:bg-blue-300 rounded text-lg text-white p-3"></i></a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                            <a href="" wire:click.prevent="borrar({{$pro->id}})"><i class="bi bi-trash bg-red-400 hover:bg-red-300 rounded text-lg text-white p-3"></i></a>
                            </td>
                            </tr>
                        </tbody>
                        @endforeach
                            </table>
                            @endif
                            <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                {{ $productos->links() }}
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>