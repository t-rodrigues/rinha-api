<?php

use App\Http\Controllers\Pessoa;
use Illuminate\Support\Facades\Route;

Route::prefix('/pessoas')->group(function () {
    Route::post('/', Pessoa\StoreController::class)->name('pessoas.store');
});
