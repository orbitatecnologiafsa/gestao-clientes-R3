<?php

use App\Http\Controllers\Usuario\RelatorioController;
use Illuminate\Support\Facades\Route;

Route::controller(RelatorioController::class)->middleware('is_user')->prefix('user')->group(function(){
    Route::get('/relatorio-empresa-cidade','relatorioEmpresaCidade')->name('user-relatorio-cidade-empresa');
    Route::get('/relatorio-filtro','relatorioFiltro')->name('user-relatorio-filtro');
});