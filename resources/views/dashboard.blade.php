<head>
   <title>{{ config('app.name') }} - Dashboard</title>
</head>

<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-900 leading-tight">
        Cacfe's - Tablero Administratvo
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-blue-300 overflow-hidden shadow-xl sm:rounded-lg">
            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Cacfe's - Total De Venta Por Cliente
            </h1>
            <div class="grid grid-cols-12">            
                <div class="col-span-5 float-left">
                    <h1 class="font-extrabold text-black p-3 text-xl text-center">Seleccione El(los) Cliente(s)</h1>
                    <form>
                        @csrf
                        <div class="shadow overflow-hidden">
                            <div class="px-4 py-5 bg-blue-400 sm:p-6">
                                <div class="grid grid-cols-12 gap-6">

                                    <div class="col-span-11 sm:col-span-11">
                                        <label for="filtroVentas"
                                            class="block text-sm font-medium text-gray-700">Filtro</label>
                                        <select name="filtroVentas" wire:model="filtroVentas"
                                            class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md form-select mt-1 block w-full"
                                            autofocus>
                                            <option value="todos" selected>Todos Los Clientes</option>
                                            <option value="cliente">Buscar Un Cliente</option>
                                        </select>
                                    </div>

                                    <div class="col-span-1 sm:col-span-1">
                                        @if($filtroVentas != 'todos')
                                        <button wire:click.prevent="limpiarBusquedaVentas()"
                                            class="p-2 form-input rounded-md shadow-sm mt-1 block w-10 text-white bg-red-400 hover:bg-red-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400">
                                            <i class="bi bi-x"></i>
                                        </button>
                                        @endif
                                    </div>

                                    @if($filtroVentas != 'todos')
                                    <div class="col-span-11 sm:col-span-11">
                                        <input type="text" wire:model="buscarVentaCliente"
                                            placeholder="Filtrar Por El Nombre Del Cliente" autocomplete="off" id="contacto"
                                            class="mt-1 focus:ring-green-400 focus:border-green-400 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-span-7 float-right">
                    <div id="barras" class="w-full"></div>
                </div>
            </div>
        </div>

        <div class="bg-pink-300 overflow-hidden shadow-xl sm:rounded-lg mt-10">
            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Cacfe's - Pastelito</h1>
            <div class="w-6/12 float-left">
                <h1 class="font-extrabold text-black p-3 text-xl text-center">Seleccione El(los) Cliente(s)</h1>

            </div>
            <div class="w-6/12 float-right">
                <div id="pastel"></div>
            </div>
        </div>

        <div class="bg-green-300 overflow-hidden shadow-xl sm:rounded-lg mt-10">
            <h1 class="font-bold text-black p-3 text-3xl border-b-2 border-black">Cacfe's - Lineal</h1>
            <div class="w-6/12 float-left">
                <h1 class="font-extrabold text-black p-3 text-xl text-center">Seleccione El(los) Cliente(s)</h1>

            </div>
            <div class="w-6/12 float-right">
                <div id="lineal"></div>
            </div>
        </div>
    </div>
</div>

{{ var_dump() }}

<script>
// plotly JS

// 1er grafica, de barras
var dataBarras = [{
    x: ['giraffes', 'orangutans', 'monkeys'],
    y: [20, 14, 23],
    type: 'bar'
}];

Plotly.newPlot('barras', dataBarras);

// 2da grafica, pastelito 
var dataPastel = [{
    values: [19, 26, 55],
    labels: ['Residential', 'Non-Residential', 'Utility'],
    type: 'pie'
}];
var layoutPastel = {
    height: 400,
    width: 500
};
Plotly.newPlot('pastel', dataPastel, layoutPastel);

// 3ra grafica, lineal
var linealTrace1 = {
    x: [1, 2, 3, 4],
    y: [10, 15, 13, 17],
    type: 'scatter'
};
var linealTrace2 = {
    x: [1, 2, 3, 4],
    y: [16, 5, 11, 9],
    type: 'scatter'
};
var dataLineal = [linealTrace1, linealTrace2];
Plotly.newPlot('lineal', dataLineal);
</script>