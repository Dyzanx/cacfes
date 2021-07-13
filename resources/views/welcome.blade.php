<x-slot name="header">
    <h2 class="font-semibold text-xl text-white leading-tight">
        Cacfe's - Inicio
    </h2>
</x-slot>

@if(!empty($crear))
<div class="modal-container font-bolder p-8 h-max absolute h-full w-full">
    <div class="py-4 sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-300 rounded-lg overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 rounded-lg sm:rounded-lg">

                                <i wire:click.prevent="cancelar()"
                                    class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400"></i>
                                <h1
                                    class="text-center sm:text-left font-bold text-black p-3 text-xl sm:text-3xl border-b-2 border-black">
                                    Agregar Nuevo
                                    Diseño</h1>

                                <form>
                                    <div class="shadow overflow-hidden sm:rounded-md w-full">
                                        <div class="px-4 py-5 bg-blue-300 sm:p-6">
                                            <div class="grid grid-cols-12 sm:grid-cols-10 gap-2 sm:gap-6">

                                                <div class="col-span-12 sm:col-span-2">
                                                    <label for="direccion"
                                                        class="block text-sm font-medium text-gray-900">Nombre<span
                                                            class="text-red-400 font-bold"> *</span></label>
                                                    <input type="text" wire:model="nombre" autocomplete="off" autofocus
                                                        class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                                </div>

                                                <div class="col-span-12 sm:col-span-2">
                                                    <label for="direccion"
                                                        class="block text-sm font-medium text-gray-900">Stock<span
                                                            class="text-red-400 font-bold"> *</span></label>
                                                    <input type="number" wire:model="stock" autocomplete="off"
                                                        class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                                </div>

                                                <div class="col-span-12 sm:col-span-2">
                                                    <label for="direccion"
                                                        class="block text-sm font-medium text-gray-900">Precio<span
                                                            class="text-red-400 font-bold"> *</span></label>
                                                    <input type="number" wire:model="precio" autocomplete="off"
                                                        class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                                </div>

                                                <div class="col-span-12 sm:col-span-2">
                                                    <label for="direccion"
                                                        class="block text-sm font-medium text-gray-900">Talla<span
                                                            class="text-red-400 font-bold"> *</span></label>
                                                    <select wire:model="talla" class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                                        <option selected>Seleccione la talla...</option>
                                                        @foreach($tallas as $ta)
                                                        <option value="{{ $ta->nombre }}">{{ $ta->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-span-12 sm:col-span-2">
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

                                                <div
                                                    class="col-span-12 @if(!empty($image_path)) sm:col-span-6 @else sm:col-span-12 @endif">
                                                    <label for="descripcion"
                                                        class="block text-sm font-medium text-gray-900">Descripción<span
                                                            class="text-red-400 font-bold"> *</span></label>
                                                    <textarea wire:model="descripcion" autocomplete="off" cols="30"
                                                        rows="1"
                                                        class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                                    </textarea>
                                                </div>

                                                @if(!empty($image_path))
                                                <div class="col-span-12 sm:col-span-6">
                                                    <img src="{{$image_path}}" alt="Diseño Imagen Cacfec's">
                                                </div>

                                                <div class="col-span-12 sm:col-span-12">
                                                    <a href="" wire:click.prevent="borrarImagen()"
                                                        class="inline-flex justify-center sm:mx-3 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-pink-700 hover:bg-pink-800 focus:outline-none focus:ring-2 focus:ring-pink-900 float-right">
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
<div class="modal-container font-bolder p-8 h-max absolute h-full w-full">
    <div class="py-4 sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-300 rounded-lg overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 rounded-lg sm:rounded-lg">

                                <i wire:click.prevent="cancelar()"
                                    class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400"></i>
                                <h1
                                    class="text-center sm:text-left font-bold text-black p-3 text-xl sm:text-3xl border-b-2 border-black">
                                    Editar Diseño : {{ $editar->nombre }}</h1>

                                <form>
                                    <div class="shadow overflow-hidden sm:rounded-md w-full">
                                        <div class="px-4 py-5 bg-blue-300 sm:p-6">
                                            <div class="grid grid-cols-12 sm:grid-cols-10 gap-2 sm:gap-6">

                                                <div class="col-span-12 sm:col-span-3">
                                                    <label for="direccion"
                                                        class="block text-sm font-medium text-gray-900">Nombre</label>
                                                    <input type="text" wire:model="nombre" autocomplete="off" autofocus value="{{ $editar->nombre }}" placeholder="{{ $editar->nombre }}"
                                                        class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                                </div>

                                                <div class="col-span-12 sm:col-span-3">
                                                    <label for="direccion"
                                                        class="block text-sm font-medium text-gray-900">Stock</label>
                                                    <input type="number" wire:model="stock" autocomplete="off" value="{{ $editar->stock }}" placeholder="{{ $editar->stock }}"
                                                        class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                                </div>


                                                <div class="col-span-12 sm:col-span-3">
                                                    <label for="direccion"
                                                        class="block text-sm font-medium text-gray-900">Precio</label>
                                                    <input type="number" wire:model="precio" autocomplete="off" value="{{ $editar->precio }}" placeholder="{{ $editar->precio }}"
                                                        class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                                </div>

                                                <div class="col-span-12 sm:col-span-3">
                                                    <label for="direccion"
                                                        class="block text-sm font-medium text-gray-900">Talla</label>
                                                    <select wire:model="talla" class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                                        <option value="{{ $editar->talla }}" selected>{{ $editar->talla }}</option>
                                                        @foreach($tallas as $ta)
                                                            @if($ta->nombre != $editar->talla)
                                                            <option value="{{$ta->nombre}}">{{$ta->nombre}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-span-12 sm:col-span-3">
                                                    <div
                                                        class="overflow-hidden w-full text-center relative w-64 mt-4 mb-4">
                                                        <button type="button"
                                                            class="focus:outline-none bg-pink-300 hover:bg-pink-400 text-white font-bold py-2 px-4 w-full inline-flex items-center rounded-md mt-2">
                                                            <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M0 0h24v24H0z" fill="none" />
                                                                <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z" />
                                                            </svg>
                                                            <input wire:change="$emit('fileChoosen')" id="imagen" accept="image/*"
                                                                class="absolute block opacity-0 pin-r pin-t" type="file"
                                                                name="vacancyImageFiles" @change="fileName" multiple>
                                                            <span class="ml-2 cursor-pointer">Cargar Imagen</span>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div
                                                    class="col-span-12 @if(!empty($image_path)) sm:col-span-6 @else sm:col-span-12 @endif">
                                                    <label for="descripcion"
                                                        class="block text-sm font-medium text-gray-900">Descripción</label>
                                                    <textarea wire:model="descripcion" autocomplete="off" cols="30"
                                                        rows="1" value="{{ $editar->descripcion }}" placeholder="{{ $editar->descripcion }}"
                                                        class="focus:bg-pink-300 bg-pink-200 mt-1 focus:ring-blue-400 focus:border-blue-400 block w-full shadow-sm sm:text-sm rounded-md">
                                                    </textarea>
                                                </div>

                                                @if(!empty($image_path))
                                                <div class="col-span-12 sm:col-span-6">
                                                    <img src="{{$image_path}}" alt="Diseño Imagen Cacfec's">
                                                </div>

                                                <div class="col-span-12 sm:col-span-12">
                                                    <a href="" wire:click.prevent="borrarImagen()"
                                                        class="inline-flex justify-center sm:mx-3 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-pink-700 hover:bg-pink-800 focus:outline-none focus:ring-2 focus:ring-pink-900 float-right">
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
<div class="modal-containe font-bolder p-8 h-max absolute h-full w-full">
    <div class="py-4 sm:py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-300 overflow-hidden shadow-xl rounded-lg sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden sm:rounded-lg">

                                <i wire:click.prevent="cancelar()"
                                    class="bi bi-x m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-red-400 hover:bg-red-500 focus:outline-none focus:ring-2 focus:ring-red-400"></i>

                                @if(Auth::user() && Auth::user()->type == 'admin')
                                <i wire:click.prevent="editar({{$detalles->id}})"
                                    class="bi bi-pencil-square m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"></i>
                                    
                                <i wire:click.prevent="borrar({{$detalles->id}})"
                                    class="bi bi-trash m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-400"></i>
                                @endif

                                <h1 class="font-bold text-black p-3 text-2xl sm:text-3xl border-b-2 border-black">
                                    Detalles de:
                                    {{ mb_substr($detalles->nombre, 0, 20) }}... </h1>
                                <div class="p-5 font-bold w-full grid grid-cols-12 gap-2 sm:gap-4">

                                    <div class="col-span-12 sm:col-span-6">
                                        <img src="{{ $detalles->image_path }}" alt="{{ $detalles->nombre }}">
                                    </div>

                                    <div class="col-span-12 sm:col-span-6 text-center">
                                        <h1
                                            class="font-bold text-black text-xl text-center sm:text-3xl border-b-2 border-black">
                                            Diseño -
                                            {{ mb_substr($detalles->nombre, 0, 15) }}...</h1>
                                        <div class="grid grid-cols-12 gap-4 mt-5">
                                            <div
                                                class="col-span-12 sm:col-span-6 border-b-2 border-black mb-4 sm:border-transparent">
                                                <p class="text-xl"><i class="bi bi-list-task mr-2 sm:mr-2"></i>
                                                    Disponibles : {{ number_format($detalles->stock) }}</p>
                                            </div>
                                            <div
                                                class="col-span-12 sm:col-span-6 border-b-2 border-black mb-4 sm:border-transparent">
                                                <p class="text-xl"><i class="bi bi-wallet2 mr-2 sm:mr-2"></i>Precio :
                                                    {{ number_format($detalles->precio) }}$</p>
                                            </div>
                                            <div
                                                class="col-span-12 sm:col-span-6 border-b-2 border-black mb-4 sm:border-transparent">
                                                <p class="text-xl"><i class="bi bi-handbag-fill mr-2 sm:mr-2"></i>Talla :
                                                    {{ $detalles->talla }}</p>
                                            </div>
                                            <div class="col-span-12 sm:col-span-6">
                                                <p class="text-xl w-full text-center"><i
                                                        class="bi bi-info-circle mr-2 sm:mr-2"></i>{{ $detalles->descripcion }}
                                                </p>
                                            </div>
                                            <div class="col-span-12 sm:col-span-12">
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

<div class="rounded-md bg-gray-100 mx-5 my-5 overflow-hidden sm:w-1/2">
    <div class="carousel">
        <div class="carousel-contenedor">
            <div class="carousel-lista">
            @foreach($diseños as $di)
                <img class="carousel-elemento max-h-72" src="{{$di->image_path}}" alt="Diseño - {{$di->nombre}}">
            @endforeach
            </div>
            <div class="buttons-container w-full mx-auto bg-gray-600 text-center p-2">
                <button aria-label="Anterior" class="carousel-anterior focus:outline-none text-center bg-white hover:text-white hover:bg-gray-500 rounded-full p-2 w-10 mx-4 transition"><i class="bi bi-chevron-left"></i></button>
                <button aria-label="Siguiente" class="carousel-siguiente focus:outline-none text-center bg-white hover:text-white hover:bg-gray-500 rounded-full p-2 w-10 mx-4 transition"><i class="bi bi-chevron-right"></i></button>
            </div>
        </div>
        <div role="tablist" class="carousel-indicadores w-full bg-gray-600 border-t border-gray-400"></div>
    </div>
</div>

<div class="rounded-md bg-gray-100 mx-5 my-5 pb-1">
    @if(Auth::user() && Auth::user()->type != 'user')
    <i wire:click.prevent="crear()" title="agregar nuevo diseño"
        class="bi bi-calendar-plus m-3 cursor-pointer float-right inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-lg font-medium rounded-md text-white bg-green-400 hover:bg-green-500 focus:outline-non"></i>
    @endif
    <h1 class="font-bold text-black text-xl p-3 sm:text-3xl border-b-2 border-black text-center sm:text-left">Ultimos
        Diseños Creados</h1>

    @if($mensajeSuccess != '')
    <strong class="font-bold text-green-700 pl-2">{{$mensajeSuccess}}</strong>
    @elseif($mensajeError != '')
    <strong class="font-bold text-red-700 pl-2">{{$mensajeError}}</strong>
    @endif

    <div class="m-4 grid grid-cols-12 sm:grid-cols-12 gap-4">
        @foreach($diseños as $di)
        <div class="rounded-md bg-yellow-200 overflow-hidden col-span-12 sm:col-span-3 text-center">
            <img src="{{ $di->image_path }}" class="w-full max-h-40">
            <h2 class="text-xl font-bold text-gray-900 py-2">{{ $di->nombre }} - <span class="uppercase">{{ $di->talla }}</span></h2>
            <a href=""  wire:click.prevent="detallesM({{ $di->id }})"
                class="focu:outline-none py-2 px-3 m-2 px-6 text-white bg-pink-800 hover:bg-pink-900 block rounded">Ver
                más detalles</a>
        </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.min.js"></script>
<script>
    new Glider(document.querySelector('.carousel-lista'), {
        slidesToShow: 1,
        dots: '.carousel-indicadores',
        draggable: true,
        arrows: {
            prev: '.carousel-anterior',
            next: '.carousel-siguiente'
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

<head>
   <title>{{ config('app.name') }} - Home</title>
</head>
