<?php

use App\Http\Controllers\Adm\RelatorioController;
use Illuminate\Support\Facades\Route;

Route::controller(RelatorioController::class)->middleware('is_adm')->prefix('adm')->group(function(){
    Route::get('/relatorio-empresa-cidade','relatorioEmpresaCidade')->name('adm-relatorio-cidade-empresa');
    Route::get('/relatorio-filtro','relatorioFiltro')->name('adm-relatorio-filtro');
});