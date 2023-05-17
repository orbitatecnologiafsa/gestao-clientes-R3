<?php

use App\Http\Controllers\Revenda\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::controller(UsuarioController::class)->middleware('is_revenda')->prefix('revenda')->group(function () {
    Route::get('/detalhes-usuario/{id}','detalhesId')->name('revenda-usuario-detalhes');
});