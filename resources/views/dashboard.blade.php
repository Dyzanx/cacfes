<x-slot name="header">
    <h2 class="font-semibold text-xl text-white leading-tight">
        Cacfe's - Tablero administratvo
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto lg:px-6 lg:px-8">

        <div class="bg-gray-100 overflow-hidden shadow-xl lg:rounded-lg">
            <h2 class="font-bold text-black p-3 text-3xl text-center md:float-right lg:float-right"><span class="sumatotal"></span> $</h2><span></span>
            <h1 class="font-bold text-black p-3 text-3xl text-center md:text-left lg:text-left border-b-2 border-black">analisis de ventas
            </h1>
            <div class="grid grid-cols-12">
                <div class="col-span-12 md:col-span-12 lg:col-span-6 float-left">
                    <h1 class="font-extrabold text-black p-3 text-xl text-center">Seleccione el(los) cliente(s)</h1>
                    <form>
                        <div class="shadow overflow-hidden">
                            <div class="px-4 py-5 bg-gray-100 lg:p-6">
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="col-span-12 md:col-span-12 lg:col-span-12">
                                        <label for="filtroVentas" class="block text-sm font-medium text-gray-900">Filtrar por cliente</label>
                                        <select name="filtroVentas" id="select-ventas"
                                            class="ventas-select bg-white focus:bg-gray-100 border-gray-700 w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md"
                                            autofocus>
                                            <option value="todos" selected>Todos los clientes</option>
                                            @foreach($clientes as $cli)
                                            <option value="{{$cli->id}}">{{$cli->nombre}}</option>
                                            @endforeach
                                        </select>
                                        <button onclick="GraficaVentas()" class="boton-filtros p-2 ml-20 sm:ml-24 my-2 w-1/2 sm:w-2/3 rounded-md text-white text-center bg-green-400 hover:bg-green-500 focus:outline-none">Aplicar filtros <i class="bi bi-funnel"></i></button>
                                    </div>
                                    <input type="text" class="hidden" value="{{json_encode($ventas)}}"
                                        id="ventas-value">
                                    <input type="text" class="hidden" value="{{json_encode($clientes)}}"
                                        id="clientes-value">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-span-12 md:col-span-12 lg:col-span-6">
                    <div id="barras" class="w-full"></div>
                </div>
            </div>
        </div>

        <div class="bg-gray-100 overflow-hidden shadow-xl lg:rounded-lg mt-10">
            <h2 class="font-bold text-black p-3 text-3xl text-center md:float-right lg:float-right"> <span class="sumacostos"></span> $</h2>
            <h1 class="font-bold text-black p-3 text-3xl text-center md:text-left lg:text-left border-b-2 border-black">analisis de costos</h1>
            <div class="grid grid-cols-12">
                <div class="col-span-12 md:col-span-12 lg:col-span-6 float-left">
                    <h1 class="font-extrabold text-black p-3 text-xl text-center">resultados del analisis</h1>
                    <div class="shadow overflow-hidden">
                        <div class="px-4 py-5 bg-gray-100 lg:p-6">
                            <div class="grid grid-cols-12 gap-2">
                                <ul class="col-span-12">
                                    <li class="col-span-12"><span class="font-bold">Insumos: </span>porcentaje(5%)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-12 lg:col-span-6">
                    <input type="text" class="hidden" value="{{json_encode($tiposDeCosto)}}" id="tiposDeCosto-value">
                    <input type="text" class="hidden" value="{{json_encode($costos)}}" id="costos-value">
                    <div id="burbuja" class="w-full"></div>
                </div>
            </div>
        </div>

        <div class="bg-gray-100 overflow-hidden shadow-xl lg:rounded-lg mt-10">
            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">grafica de analisis general</h1>
            <div class="container grid grid-cols-12">
                <div class="col-span-12 md:col-span-12 lg:col-span-6">
                    <h1 class="font-extrabold text-black p-3 text-xl text-center">Seleccione el(los) cliente(s)</h1>
                    <form>
                        <div class="shadow overflow-hidden">
                            <div class="px-4 py-5 bg-gray-100 lg:p-6">
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="col-span-12">
                                        <label for="filtroVentas" class="block text-sm font-medium text-gray-900">Filtro de cliente</label>
                                        <select name="filtroVentas" class="bg-white focus:bg-gray-100 border-gray-700 w-full focus:border-2 focus:border-gray-800 focus:ring focus:ring-gray-300 rounded-md shadow-md" autofocus>
                                            <option value="predeterminado" selected>analisis predeterminado</option>
                                            <option value="cliente">Buscar un cliente</option>
                                        </select>
                                        <button onclick="graficaDinamica()" class="boton-filtros p-2 ml-20 sm:ml-24 my-2 w-1/2 sm:w-2/3 rounded-md text-white text-center bg-green-400 hover:bg-green-500 focus:outline-none">Aplicar filtros <i class="bi bi-funnel"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-span-12 md:col-span-12 lg:col-span-6">
                    <div id="lineal" class="w-full"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('js/jquery.js')}}"></script>
<script>

$('.boton-filtros').click(function(e){
    e.preventDefault();
});

// TODO: -------------------------------------------------------------------------------- 1er grafica
var ventas = $('#ventas-value').val();
ventas = JSON.parse(ventas);
var clientes = $('#clientes-value').val();
clientes = JSON.parse(clientes);
var cliente;

function GraficaVentas(){
    var xs = [];
    var ys = [];
    var sumaVentas = 0;
    var contador = 0;
    var ventasCantidadMayor = 0;

    if ($('.ventas-select').val() == 'todos') {
        for (let i = 0; i < ventas.length; i++) {
            for (let j = 0; j < clientes.length; j++) {
                if (clientes[j].id == ventas[i].cliente_id) {
                    sumaVentas = (ventas[i].precio*ventas[i].cantidad)+sumaVentas;
                    xs[i] = clientes[j].nombre;
                    ys[i] = ventas[i].precio*ventas[i].cantidad;
                }
            }
        }
    }else{
        cliente = $('.ventas-select').val();

        for (let i = 0; i < ventas.length; i++) {
            for (let j = 0; j < clientes.length; j++) {
                if (cliente == clientes[j].id && cliente == ventas[i].cliente_id) {
                    sumaVentas = (ventas[i].precio*ventas[i].cantidad)+sumaVentas;
                    xs[contador] = clientes[j].nombre;
                    contador++;
                }
                ys[i] = ventas[i].precio;
            }
        }
    }

    var dataBarras = [{
        x: xs,
        y: ys,
        type: 'bar'
    }];
    Plotly.newPlot('barras', dataBarras);
    $('.sumatotal').html(sumaVentas);
}
GraficaVentas();


// TODO: -------------------------------------------------------------------------------- 2da grafica
var tiposDeCosto = $('#tiposDeCosto-value').val();
tiposDeCosto = JSON.parse(tiposDeCosto);
var costos = $('#costos-value').val();
costos = JSON.parse(costos);

function graficaCostos(){
    var costosx = [];
    var costosy = [];
    var sumaCostos = 0;

    for (let i = 0; i < tiposDeCosto.length; i++) {
        costosx[i] = tiposDeCosto[i].nombre;
        for (let j = 0; j < costos.length; j++) {
            if (tiposDeCosto[i].id == costos[j].item_id) {
                costosy[i] = costos[j].valor_unitario*costos[j].cantidad;
                sumaCostos += costos[j].valor_unitario*costos[j].cantidad;
            }
        }
    }

    var dataCostos = [{
        x: costosx,
        y: costosy,
        type: 'bar'
    }];
    Plotly.newPlot('burbuja', dataCostos);
    $('.sumacostos').html(sumaCostos);
}
graficaCostos();

// TODO: -------------------------------------------------------------------------------- 3er grafica
function graficaDinamica(){
    var dataLineal = [{
        x: 'asd',
        y: 1000,
        type: 'bar'
    }];
    Plotly.newPlot('lineal', dataLineal);
}
graficaDinamica();

</script>

<head>
    <title>{{ config('app.name') }} - Dashboard</title>
</head>