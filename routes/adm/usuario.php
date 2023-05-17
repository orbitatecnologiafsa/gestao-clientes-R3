<?php

use App\Http\Controllers\Adm\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::controller(UsuarioController::class)->middleware('is_adm')->prefix('adm')->group(function () {
   
    Route::get('/detalhes-usuario/{id}','detalhesId')->name('adm-usuario-detalhes');
    Route::get('/cadastro-usuario', 'cadastrar')->name('adm-usuario-cadastro');
    Route::post('/cadastro-usuario','cadastroPost')->name('adm-usuario-cadastro-post');
    Route::get('/atualizar-usuario/{id}', 'atualizarId')->name('adm-usuario-atualizar');
    Route::put('/atualizar-usuario/{id}', 'atualizarPut')->name('adm-usuario-atualizar-put');
    Route::get('/deletar-usuario/{id}','deletarId')->name('adm-usuario-deletar');
    Route::delete('/deletar-usuario/{id}','deleteId')->name('adm-usuario-deletar-id');
    Route::get('/lista-usuario', 'lista')->name('adm-usuario-lista');
    Route::get('/detalhes-usuario/{id}','detalhesId')->name('adm-usuario-detalhes');
});