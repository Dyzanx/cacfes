<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', App\Http\Livewire\DashboardController::class)->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/Clientes', App\Http\Livewire\ClientesController::class)->name('clientes');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/TipoCosto', App\Http\Livewire\TipoCostoController::class)->name('tipoCosto');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/Categorias', App\Http\Livewire\CategoriasController::class)->name('categorias');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/FacturaCostos', App\Http\Livewire\facturaCostosController::class)->name('facturaCostos');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/Ventas', App\Http\Livewire\VentasController::class)->name('ventas');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/EquipoTrabajo', App\Http\Livewire\EquipoTrabajoController::class)->name('equipo');

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/Cartera', App\Http\Livewire\CarteraController::class)->name('cartera');