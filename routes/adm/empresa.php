<?php

use App\Http\Controllers\Adm\EmpresaController;
use Illuminate\Support\Facades\Route;

Route::controller(EmpresaController::class)->middleware('is_adm')->prefix('adm')->group(function () { 

    Route::get('/lista-empresa','lista')->name('adm-empresa-lista');
    Route::get('/cadastrar-empresa','cadastro')->name('adm-empresa-cadastro');
    Route::post('/cadastro-empresa','cadastroPost')->name('adm-empresa-cadastro-post');
    Route::get('/detalhes-empresa/{id}', 'detalhes')->name('adm-empresa-detalhes');
    Route::get('/atualizar-empresa/{id}', 'atualizarId')->name('adm-empresa-atualizar');
    Route::put('/atualizar-empresa/{id}', 'atualizarPutId')->name('adm-empresa-atualizar-id');
    Route::get('/deletar-empresa/{id}', 'deletarId')->name('adm-empresa-deletar');
    Route::delete('/deletar-empresa/{id}', 'deleteId')->name('adm-empresa-deletar-id');
    
});