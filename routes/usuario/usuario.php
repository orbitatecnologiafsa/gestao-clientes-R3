<?php

use App\Http\Controllers\Usuario\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::controller(UsuarioController::class)->middleware('is_user')->prefix('user')->group(function () {
    Route::get('/detalhes-usuario','detalhesId')->name('user-detalhes');
});
