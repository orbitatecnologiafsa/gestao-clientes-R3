<?php

use App\Http\Controllers\Adm\LogController;
use Illuminate\Support\Facades\Route;

Route::middleware('is_adm')->controller(LogController::class)->prefix('adm')->group(function(){
    Route::get('/lista-log','lista')->name('adm-lista-log');
    Route::get('/detalhes-log/{id}','detalhesId')->name('adm-detalhes-log');
    Route::get('/busca-log-data','buscaData')->name('adm-busca-data-log');
    Route::get('/busca-log-nome','buscaNome')->name('adm-busca-nome-log');
});