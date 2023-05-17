<?php

use App\Http\Controllers\Adm\ClienteController;
use Illuminate\Support\Facades\Route;

Route::controller(ClienteController::class)->middleware('is_adm')->prefix('adm')->group(function () {
    Route::get('/cadastrar-cliente','cadastrar')->name('adm-cliente-cadastro');
    Route::get('/deletar-cliente', 'deletarId')->name('adm-cliente-deletar');
    Route::delete('/deletar-cliente', 'deleteId')->name('adm-cliente-delerar-id');
    Route::post('/cadastro-cliente', 'cadastroPost')->name('adm-cliente-cadastro-post');
    Route::get('/busca-empresa-cliente','buscaClienteEmpresa')->name('adm-cliente-busca-empresa');
    Route::get('/lista-cliente','lista')->name('adm-cliente-lista');
    Route::get('/detalhes-cliente/{id}', 'detalhesId')->name('adm-cliente-detalhes-id');
    Route::get('/ativos-cliente','ativos')->name('adm-cliente-ativos');
    Route::get('/inativos-cliente', 'inativos')->name('adm-cliente-inativos');
    Route::get('/bloqueados-cliente', 'bloqueados')->name('adm-cliente-bloqueados');
    Route::get('/busca-cliente','buscaCliente')->name('adm-cliente-busca');
    Route::get('/atulizar-cliente/{id}', 'atualizarId')->name('adm-cliente-atualizar-id');
    Route::put('/atualizar-cliente/{id}', 'atualizarPut')->name('adm-cliente-atualizar-put');
    
});