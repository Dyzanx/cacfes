<x-slot name="header">
    <h2 class="font-semibold text-xl text-white leading-tight">Cacfe's - Inicio</h2>
</x-slot>

@if(!empty($ventana))
<div class="font-bolder lg:p-8 h-max h-full w-full">
    <div class="py-4">
        <div class="mx-auto lg:px-6">
            <div class="bg-gray-100 overflow-hidden shadow-xl lg:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto lg:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full lg:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 rounded-lg lg:rounded-lg">
                                <i wire:click.prevent="cerrarVentana()" title="cerrar esta ventana"
                                    class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400"></i>
                                <h1
                                    class="text-center lg:text-left font-bold text-black p-3 text-xl lg:text-3xl border-b-2 border-black">
                                    Diseños personalizados</h1>
                                <p class="p-3">Aquí en nuestra compañia fabricamos los diseños que quieras & como los
                                    quieras, seguimos el proceso de fabricación de tu ropa de acuerdo a tus gustos & a
                                    tus requerimientos, para empezar a hablarnos a cerca de tu propio diseño
                                    personalizado contacta con nuestro diseñador de modas al <a target="_blank"
                                        href="https://api.whatsapp.com/send?phone=573044796496&text=Hola Carlos, quiero hablar sobre un diseño personalizado"
                                        class="text-green-400 underline ">+57 304 4796496</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if(!empty($crear))
<div class="font-bolder lg:p-8 h-max h-full w-full">
    <div class="py-4">
        <div class="mx-auto lg:px-6">
            <div class="bg-gray-100 overflow-hidden shadow-xl lg:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto lg:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full lg:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 rounded-lg lg:rounded-lg">
                                <i wire:click.prevent="cancelar()" title="cerrar esta ventana"
                                    class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400"></i>
                                <h1
                                    class="text-center lg:text-left font-bold text-black p-3 text-xl lg:text-3xl border-b-2 border-black">
                                    Agregar nuevo diseño</h1>
                                <form>
                                    <div class="shadow overflow-hidden lg:rounded-md w-full">
                                        <div class="px-4 py-5 bg-gray-100 lg:p-6">
                                            <div class="grid grid-cols-10 lg:grid-cols-10 gap-2 lg:gap-6">

                                                <div class="col-span-10 lg:col-span-2">
                                                    <label for="direccion"
                                                        class="block text-sm font-medium text-gray-900">Nombre<span
                                                            class="text-red-400 font-bold"> *</span></label>
                                                    <input type="text" wire:model="nombre" autocomplete="off" autofocus
                                                        class="bg-white focus:bg-gray-100 border-gray-700 w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                                </div>

                                                <div class="col-span-10 lg:col-span-2">
                                                    <label for="direccion"
                                                        class="block text-lg font-medium text-gray-900">Stock<span
                                                            class="text-red-400 font-bold"> *</span></label>
                                                    <input type="number" wire:model="stock" autocomplete="off" min="1"
                                                        class="bg-white focus:bg-gray-100 border-gray-700 w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                                </div>

                                                <div class="col-span-10 lg:col-span-2">
                                                    <label for="direccion"
                                                        class="block text-sm font-medium text-gray-900">Precio<span
                                                            class="text-red-400 font-bold"> *</span></label>
                                                    <input type="number" wire:model="precio" autocomplete="off" min="1"
                                                        class="bg-white focus:bg-gray-100 border-gray-700 w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                                </div>

                                                <div class="col-span-10 lg:col-span-2">
                                                    <label for="direccion"
                                                        class="block text-sm font-medium text-gray-900">Talla<span
                                                            class="text-red-400 font-bold"> *</span></label>
                                                    <select wire:model="talla"
                                                        class="bg-white focus:bg-gray-100 border-gray-700 w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                                        <option selected>Seleccione la talla...</option>
                                                        @foreach($tallas as $ta)
                                                        <option value="{{ $ta->nombre }}">{{ $ta->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-span-10 lg:col-span-2">
                                                    <div
                                                        class="overflow-hidden w-full text-center relative w-64 mt-4 mb-4">
                                                        <button type="button"
                                                            class="focus:outline-none bg-white hover:bg-gray-100 text-black font-bold py-2 px-4 w-full inline-flex items-center rounded-md mt-2">
                                                            <svg fill="#000000" height="18" viewBox="0 0 24 24"
                                                                width="18" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z" />
                                                            </svg>
                                                            <input wire:change="$emit('fileChoosen')" id="imagen"
                                                                accept="image/*"
                                                                class="absolute block opacity-0 pin-r pin-t" type="file"
                                                                name="vacancyImageFiles" @change="fileName" multiple>
                                                            <span class="ml-2 cursor-pointer">Cargar Imagen</span>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div
                                                    class="col-span-10 @if(!empty($image_path)) lg:col-span-6 @else lg:col-span-12 @endif">
                                                    <label for="descripcion"
                                                        class="block text-sm font-medium text-gray-900">Descripción<span
                                                            class="text-red-400 font-bold"> *</span></label>
                                                    <textarea wire:model="descripcion" autocomplete="off" cols="30"
                                                        rows="1"
                                                        class="bg-white focus:bg-gray-100 border-gray-700 w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md">
                                                    </textarea>
                                                </div>

                                                @if(!empty($image_path))
                                                <div class="col-span-10 lg:col-span-5">
                                                    <img src="{{$image_path}}" alt="Diseño Imagen Cacfec's">
                                                </div>

                                                <div class="col-span-10 lg:col-span-10">
                                                    <a href="" wire:click.prevent="borrarImagen()"
                                                        class="inline-flex justify-center lg:mx-3 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-pink-700 hover:bg-pink-800 focus:outline-none focus:ring-2 focus:ring-pink-900 float-right">
                                                        Eliminar Imagen
                                                    </a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="bg-gray-200 block w-full text-right p-5 border-t-2 border-black">
                                    @if(!empty($nombre || $precio || $stock || $descripcion))
                                    <a href="" wire:click.prevent="limpiarCampos()"
                                        class="inline-flex justify-center mx-3 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                                        Limpiar Campos
                                    </a>
                                    @endif
                                    <a href="" wire:click.prevent="cancelar()"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                                        Cancelar
                                    </a>
                                    <a wire:click.prevent="save()" href=""
                                        class="inline-flex justify-center mx-1 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400">
                                        Añadir
                                    </a>
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

@if(!empty($editar))
<div class="font-bolder lg:p-8 h-max h-full w-full">
    <div class="py-4">
        <div class="mx-auto lg:px-6">
            <div class="bg-gray-100 overflow-hidden shadow-xl lg:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto lg:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full lg:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 rounded-lg lg:rounded-lg">
                                <i wire:click.prevent="cancelar()"
                                    class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400"></i>
                                <h1
                                    class="text-center lg:text-left font-bold text-black p-3 text-xl lg:text-3xl border-b-2 border-black">
                                    Editar diseño : {{ $editar->nombre }}</h1>

                                <form>
                                    <div class="shadow overflow-hidden lg:rounded-md w-full">
                                        <div class="px-4 py-5 bg-blue-300 lg:p-6">
                                            <div class="grid grid-cols-12 lg:grid-cols-10 gap-2 lg:gap-6">

                                                <div class="col-span-12 lg:col-span-3">
                                                    <label for="direccion"
                                                        class="block text-sm font-medium text-gray-900">Nombre</label>
                                                    <input type="text" wire:model="nombre" autocomplete="off" autofocus
                                                        value="{{ $editar->nombre }}"
                                                        placeholder="{{ $editar->nombre }}"
                                                        class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm lg:text-sm rounded-md">
                                                </div>

                                                <div class="col-span-12 lg:col-span-3">
                                                    <label for="direccion"
                                                        class="block text-sm font-medium text-gray-900">Stock</label>
                                                    <input type="number" wire:model="stock" autocomplete="off"
                                                        value="{{ $editar->stock }}" placeholder="{{ $editar->stock }}"
                                                        class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm lg:text-sm rounded-md">
                                                </div>


                                                <div class="col-span-12 lg:col-span-3">
                                                    <label for="direccion"
                                                        class="block text-sm font-medium text-gray-900">Precio</label>
                                                    <input type="number" wire:model="precio" autocomplete="off"
                                                        value="{{ $editar->precio }}"
                                                        placeholder="{{ $editar->precio }}"
                                                        class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm lg:text-sm rounded-md">
                                                </div>

                                                <div class="col-span-12 lg:col-span-3">
                                                    <label for="direccion"
                                                        class="block text-sm font-medium text-gray-900">Talla</label>
                                                    <select wire:model="talla"
                                                        class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm lg:text-sm rounded-md">
                                                        <option value="{{ $editar->talla }}" selected>
                                                            {{ $editar->talla }}</option>
                                                        @foreach($tallas as $ta)
                                                        @if($ta->nombre != $editar->talla)
                                                        <option value="{{$ta->nombre}}">{{$ta->nombre}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-span-12 lg:col-span-3">
                                                    <div
                                                        class="overflow-hidden w-full text-center relative w-64 mt-4 mb-4">
                                                        <button type="button"
                                                            class="focus:outline-none bg-pink-300 hover:bg-pink-400 text-white font-bold py-2 px-4 w-full inline-flex items-center rounded-md mt-2">
                                                            <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z" />
                                                            </svg>
                                                            <input wire:change="$emit('fileChoosen')" id="imagen"
                                                                accept="image/*"
                                                                class="absolute block opacity-0 pin-r pin-t" type="file"
                                                                name="vacancyImageFiles" @change="fileName" multiple>
                                                            <span class="ml-2 cursor-pointer">Cargar Imagen</span>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div
                                                    class="col-span-12 @if(!empty($image_path)) lg:col-span-6 @else lg:col-span-12 @endif">
                                                    <label for="descripcion"
                                                        class="block text-sm font-medium text-gray-900">Descripción</label>
                                                    <textarea wire:model="descripcion" autocomplete="off" cols="30"
                                                        rows="1" value="{{ $editar->descripcion }}"
                                                        placeholder="{{ $editar->descripcion }}"
                                                        class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm lg:text-sm rounded-md">
                                                    </textarea>
                                                </div>

                                                @if(!empty($image_path))
                                                <div class="col-span-12 lg:col-span-6">
                                                    <img src="{{$image_path}}" alt="Diseño Imagen Cacfec's">
                                                </div>

                                                <div class="col-span-12 lg:col-span-12">
                                                    <a href="" wire:click.prevent="borrarImagen()"
                                                        class="inline-flex justify-center lg:mx-3 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-pink-700 hover:bg-pink-800 focus:outline-none focus:ring-2 focus:ring-pink-900 float-right">
                                                        Eliminar Imagen
                                                    </a>
                                                </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="bg-blue-300 block w-full text-right p-5 border-t-2 border-black">
                                    @if(!empty($nombre || $precio || $stock || $descripcion))
                                    <a href="" wire:click.prevent="limpiarCampos()"
                                        class="inline-flex justify-center mx-3 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                                        Limpiar Campos
                                    </a>
                                    @endif
                                    <a href="" wire:click.prevent="cancelar()"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                                        Cancelar
                                    </a>
                                    <a wire:click.prevent="update({{$editar->id}})" href=""
                                        class="inline-flex justify-center mx-1 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400">
                                        Actualizar
                                    </a>
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

@if(!empty($detalles))
<div class="font-bolder lg:p-8 h-max h-full w-full">
    <div class="py-4">
        <div class="mx-auto lg:px-6">
            <div class="bg-gray-100 overflow-hidden shadow-xl lg:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto lg:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full lg:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 rounded-lg lg:rounded-lg">
                                <i wire:click.prevent="cancelar()"
                                    class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400"></i>

                                @if(Auth::user() && Auth::user()->type == 'admin')
                                <i wire:click.prevent="editar({{$detalles->id}})"
                                    class="bi bi-pencil-square m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"></i>

                                <i wire:click.prevent="borrar({{$detalles->id}})"
                                    class="bi bi-trash m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400"></i>
                                @endif

                                <h1 class="font-bold text-black p-3 text-2xl lg:text-3xl border-b-2 border-black">
                                    {{ mb_substr($detalles->nombre, 0, 20) }}... </h1>
                                <div class="p-5 font-bold w-full grid grid-cols-12 gap-2 lg:gap-4">

                                    <div class="col-span-12 lg:col-span-6">
                                        <img src="{{ $detalles->image_path }}" alt="{{ $detalles->nombre }}">
                                    </div>

                                    <div class="col-span-12 lg:col-span-6 text-center">
                                        <h1
                                            class="font-bold text-black text-xl text-center lg:text-3xl border-b-2 border-black">
                                            Diseño - {{ mb_substr($detalles->nombre, 0, 15) }}...</h1>
                                        <div class="grid grid-cols-12 gap-4 mt-5">
                                            <div
                                                class="col-span-12 lg:col-span-6 border-b-2 border-black mb-4 lg:border-transparent">
                                                <p class="text-xl"><i class="bi bi-list-task mr-2 lg:mr-2"></i>
                                                    Disponibles : {{ number_format($detalles->stock) }}</p>
                                            </div>
                                            <div
                                                class="col-span-12 lg:col-span-6 border-b-2 border-black mb-4 lg:border-transparent">
                                                <p class="text-xl"><i class="bi bi-wallet2 mr-2 lg:mr-2"></i>Precio :
                                                    $ {{ number_format($detalles->precio) }}</p>
                                            </div>
                                            <div
                                                class="col-span-12 lg:col-span-6 border-b-2 border-black mb-4 lg:border-transparent">
                                                <p class="text-xl"><i class="bi bi-handbag-fill mr-2 lg:mr-2"></i>Talla
                                                    : <span class="uppercase">{{ $detalles->talla }}</span></p>
                                            </div>
                                            <div class="col-span-12 lg:col-span-6">
                                                <p class="text-xl w-full text-center"><i
                                                        class="bi bi-info-circle mr-2 lg:mr-2"></i>{{ $detalles->descripcion }}
                                                </p>
                                            </div>
                                            <div class="col-span-12 lg:col-span-12">
                                                <a target="_blank"
                                                    href="https://api.whatsapp.com/send?phone=573126656455&text=Hola Carlos, quiero saber algo sobre tu producto, {{ $detalles->nombre }} de la talla: {{ $detalles->talla }} @if(Auth::user()), Soy {{ Auth::user()->name }} @endif"
                                                    class="focus:outline-none py-2 px-3 m-2 px-6 text-white bg-pink-800 hover:bg-pink-900 block rounded">Ponerse
                                                    en contacto</a>
                                            </div>
                                        </div>

                                    </div>

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

@if(!empty($agregarPancarta))
<div class="font-bolder lg:p-8 h-max h-full w-full">
    <div class="py-4">
        <div class="mx-auto lg:px-6">
            <div class="bg-gray-100 overflow-hidden shadow-xl lg:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto lg:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full lg:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 rounded-lg lg:rounded-lg">
                                <i wire:click.prevent="cancelar()"
                                    class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400"></i>
                                <h1
                                    class="text-center lg:text-left font-bold text-black p-3 text-xl lg:text-3xl border-b-2 border-black">
                                    Agregar foto al carrusel/pancarta</h1>
                                <form>
                                    <div class="shadow overflow-hidden lg:rounded-md w-full">
                                        <div class="px-4 py-5 bg-blue-300 lg:p-6">
                                            <div class="grid grid-cols-12 lg:grid-cols-10 gap-2 lg:gap-6">

                                                <div class="col-span-12 lg:col-span-2">
                                                    <div
                                                        class="overflow-hidden w-full text-center relative w-64 mt-4 mb-4">
                                                        <button type="button"
                                                            class="focus:outline-none bg-pink-300 hover:bg-pink-400 text-white font-bold py-2 px-4 w-full inline-flex items-center rounded-md mt-2">
                                                            <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z" />
                                                            </svg>
                                                            <input wire:change="$emit('fileChoosen')" id="imagen"
                                                                class="absolute block opacity-0 pin-r pin-t" type="file"
                                                                name="vacancyImageFiles" @change="fileName" multiple>
                                                            <span class="ml-2 cursor-pointer">Cargar Imagen</span>
                                                        </button>
                                                    </div>
                                                </div>

                                                @if(!empty($image_path))
                                                <div class="col-span-12 lg:col-span-6">
                                                    <img src="{{$image_path}}" alt="Diseño Imagen Cacfec's">
                                                </div>
                                                <div class="col-span-12 lg:col-span-12">
                                                    <a href="" wire:click.prevent="borrarImagen()"
                                                        class="inline-flex justify-center lg:mx-3 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-pink-700 hover:bg-pink-800 focus:outline-none focus:ring-2 focus:ring-pink-900 float-right">
                                                        Eliminar Imagen
                                                    </a>
                                                </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="bg-gray-300 block w-full text-right p-5 border-t-2 border-black">
                                    <a href="" wire:click.prevent="cancelar()"
                                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400">
                                        Cancelar
                                    </a>
                                    <a wire:click.prevent="saveWelcome()" href=""
                                        class="inline-flex justify-center mx-1 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400">
                                        Añadir
                                    </a>
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

@if(empty($ventana))
<div class="lg:rounded-md bg-gray-600 text-white lg:mx-5 my-5 py-1 px-3">
    <span class="font-bold">Quieres tener tus propios diseños personalizados?</span><span>, no hay problema, solo
        contacta con nuestro diseñador de modas al </span><a
        href="https://api.whatsapp.com/send?phone=573044796496&text=Hola Carlos, quiero hablar sobre un diseño personalizado"
        target="_blank" class="text-green-400 underline ">+57 304 4796496</a>
</div>
@endif

<div class="flex">
    <div class="lg:rounded-md bg-gray-100 lg:mx-5 my-5 overflow-hidden sm:w-full lg:w-2/3 md:col-span-12 h-auto">
        <div class="swiper-container h-auto">
            <div class="swiper-wrapper">
                @foreach($diseños as $di)
                <div class="swiper-slide max-h-56 md:max-h-72 lg:max-h-72"><img src="{{ $di->image_path }}" alt="Cacfe's - {{$di->nombre}}"
                        class="block w-auto h-60 lg:h-auto lg:w-2/3 m-auto"></div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev focus:outline-none"></div>
            <div class="swiper-button-next focus:outline-none"></div>
        </div>
    </div>
    <div class="lg:w-1/3 lg:my-5 lg:rounded-md bg-gray-100 overflow-hidden tablet-hidden lg:mx-3 border border-gray-200">    
    </div>
</div>

<div class="lg:rounded-md bg-gray-600 text-white lg:mx-5 my-5 py-1 px-3">
    siguenos en nuestras redes sociales para no perderte de ofertas y de nuestro nuevo contenido!
    <a title="facebook" href="https://www.facebook.com/profile.php?id=100070751622851" target="_blank" class="mx-2 text-xl text-blue-400 hover:text-blue-500"><i class="bi bi-facebook"></i></a>
    <a title="instagram" href="https://www.instagram.com/cacfes/" target="_blank" class="mx-2 text-xl text-pink-400 hover:text-pink-500"><i class="bi bi-instagram"></i></a>
</div>

<div class="rounded-md bg-gray-100 lg:mx-5 my-5 py-1">
    @if(Auth::user() && Auth::user()->type != 'user')
    <span class="lg:float-right sm:w-5/6 sm:text-center lg:w-auto">
        <a href="" wire:click.prevent="agregarDiseño()">
            <i title="agregar nuevo diseño"
                class="bi bi-bag-plus-fill my-1 md:ml-16 ml-8 lg:ml-3 lg:my-3 lg:m-3 w-5/6 lg:w-auto inline-flex justify-center py-1 px-3 py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-500"></i>
        </a>
        <a href="" wire:click.prevent="agregarPancarta()">
            <i title="agregar nuevo diseño para la pancarta"
                class="bi bi-calendar-plus my-1 md:ml-16 ml-8 lg:ml-3 lg:my-3 lg:m-3 w-5/6 lg:w-auto inline-flex justify-center py-1 px-3 py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-gray-700 hover:bg-gray-500"></i><br>
        </a>
    </span>
    @endif
    <h1 class="font-bold text-black text-md p-3 lg:text-3xl border-b-2 border-black text-center lg:text-left">Ultimos
        diseños añadidos</h1>

    @if($mensajeSuccess != '')
    <i wire:click.prevent="hideMessage()" title="Eliminar mensaje"
        class="bi bi-x text-red-500 hover:text-red-300 text-2xl float-right cursor-pointer"></i>
    <strong class="font-bold text-green-700 pl-2 text-xl">{{$mensajeSuccess}}</strong>
    @elseif($mensajeError != '')
    <i wire:click.prevent="hideMessage()" title="Eliminar mensaje"
        class="bi bi-x text-red-500 hover:text-red-300 text-2xl float-right cursor-pointer"></i>
    <strong class="font-bold text-red-700 pl-2 text-xl">{{$mensajeError}}</strong>
    @endif

    <div class="m-4 grid grid-cols-12 lg:grid-cols-12 gap-4">
        @foreach($diseños as $di)
        <div class="rounded-md bg-gray-200 overflow-hidden col-span-6 lg:col-span-3 md:col-span-4 text-center border border-gray-300">
            <img wire:click.prevent="detallesM({{ $di->id }})" src="{{ $di->image_path }}"
                class="imagen-welcome-diseños h-full block object-cover w-full cursor-pointer">
        </div>
        @endforeach
    </div>
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
const swiper = new Swiper('.swiper-container', {
  direction: 'horizontal',
  loop: true,
  pagination: {
    el: '.swiper-pagination',
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  }
});
</script>
<script>
window.livewire.on('fileChoosen', pistId => {
    let inputField = document.getElementById('imagen');
    let file = inputField.files[0];

    let reader = new FileReader();
    reader.onload = () => {
        window.livewire.emit('fileUpload', reader.result);
    }
    
    reader.readAsDataURL(file);
});
</script>
<header>
    <title>{{env('APP_NAME')}} - Inicio</title>
</header>