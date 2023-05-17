<?php

use App\Http\Controllers\Revenda\RelatorioController;
use Illuminate\Support\Facades\Route;

Route::controller(RelatorioController::class)->middleware('is_revenda')->prefix('revenda')->group(function(){
    Route::get('/relatorio-empresa-cidade','relatorioEmpresaCidade')->name('revenda-relatorio-cidade-empresa');
    Route::get('/relatorio-filtro','relatorioFiltro')->name('revenda-relatorio-filtro');
});