<?php

use App\Http\Controllers\Api\{ContagemController, PessoaController, SearchController};
use Illuminate\Support\Facades\Route;

Route::prefix('/pessoas')->group(function () {
    Route::get('/', SearchController::class)->name('pessoas.search');

    Route::post('/', [PessoaController::class, 'store'])->name('pessoas.store');
    Route::get('/{pessoa}', [PessoaController::class, 'show'])->name('pessoas.show');
    Route::put('/{pessoa:apelido}', [PessoaController::class, 'update'])->name('pessoas.update');
    Route::delete('/{pessoa:apelido}', [PessoaController::class, 'destroy'])->name('pessoas.destroy');
});

Route::get('/contagem-pessoas', [ContagemController::class, 'index']);
