<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ManufacturerController;
use App\Http\Controllers\Admin\CarModelController;
use App\Http\Controllers\Admin\OilRecommendationController;

/*
|--------------------------------------------------------------------------
| ROTAS DA APLICAÇÃO "FLUIDO CERTO"
|--------------------------------------------------------------------------
*/
Route::get('/', [OilController::class, 'welcome'])->name('welcome');
Route::get('/selecao', [OilController::class, 'selection'])->name('selection');
Route::get('/api/models', [OilController::class, 'getModels'])->name('api.models');
Route::get('/api/years', [OilController::class, 'getYears'])->name('api.years');
Route::get('/api/recommendation', [OilController::class, 'getRecommendation'])->name('api.recommendation');

/*
|--------------------------------------------------------------------------
| ROTAS ADICIONADAS PELO BREEZE
| Estas rotas cuidam do login, registro, dashboard...
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- NOSSO NOVO GRUPO DE ROTAS CRUD ---
    // O prefixo agrupa todas as URLs sob /admin
    // O name('admin.') agrupa os nomes das rotas (ex: admin.manufacturers.index)
    Route::prefix('admin')->name('admin.')->group(function () {
        // Usamos Route::resource que cria automaticamente todas as 7 rotas CRUD para nós!
        Route::resource('manufacturers', ManufacturerController::class);
        Route::resource('models', CarModelController::class); // <-- Adicione esta linha
        Route::resource('recommendations', OilRecommendationController::class); // <-- Adicione esta linha
    });
});

require __DIR__.'/auth.php';