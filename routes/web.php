<?php

use Illuminate\Support\Facades\Route;

Route::get('/', App\Http\Livewire\WelcomeController::class)->name('welcome');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])
    ->get('/dashboard', App\Http\Livewire\DashboardController::class)->name('dashboard');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])
    ->get('/Clientes', App\Http\Livewire\ClientesController::class)->name('clientes');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])
    ->get('/TipoCosto', App\Http\Livewire\TipoCostoController::class)->name('tipoCosto');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])
    ->get('/Categorias', App\Http\Livewire\CategoriasController::class)->name('categorias');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])
    ->get('/FacturaCostos', App\Http\Livewire\facturaCostosController::class)->name('facturaCostos');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])
    ->get('/Ventas', App\Http\Livewire\VentasController::class)->name('ventas');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])
    ->get('/EquipoTrabajo', App\Http\Livewire\EquipoTrabajoController::class)->name('equipo');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])
    ->get('/Cartera', App\Http\Livewire\CarteraController::class)->name('cartera');

Route::middleware(['auth:sanctum', 'verified', 'authadmin'])
    ->get('/Tallas', App\Http\Livewire\TallasController::class)->name('tallas');