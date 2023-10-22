<?php

use App\Http\Controllers\{ContagemController, Pessoa};
use Illuminate\Support\Facades\Route;

Route::prefix('/pessoas')->group(function () {
    Route::post('/', Pessoa\StoreController::class)->name('pessoas.store');
    Route::get('/', Pessoa\SearchController::class)->name('pessoas.search');
    Route::get('/{pessoa}', Pessoa\ShowController::class)->name('pessoas.show');
    Route::put('/{pessoa:apelido}', Pessoa\UpdateController::class)->name('pessoas.update');
});

Route::get('/contagem-pessoas', [ContagemController::class, 'index']);
