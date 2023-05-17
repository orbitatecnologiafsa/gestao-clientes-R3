<?php

use App\Http\Controllers\Usuario\ClienteController;
use Illuminate\Support\Facades\Route;

Route::controller(ClienteController::class)->middleware('is_user')->prefix('user')->group(function () {
    Route::get('/cadastrar-cliente','cadastrar')->name('user-cliente-cadastro');
    Route::get('/deletar-cliente', 'deletarId')->name('user-cliente-deletar');
    Route::delete('/deletar-cliente', 'deleteId')->name('user-cliente-delerar-id');
    Route::post('/cadastro-cliente', 'cadastroPost')->name('user-cliente-cadastro-post');
    Route::get('/busca-empresa-cliente','buscaClienteEmpresa')->name('user-cliente-busca-empresa');
    Route::get('/lista-cliente','lista')->name('user-cliente-lista');
    Route::get('/detalhes-cliente/{id}', 'detalhesId')->name('user-cliente-detalhes-id');
    Route::get('/ativos-cliente','ativos')->name('user-cliente-ativos');
    Route::get('/inativos-cliente', 'inativos')->name('user-cliente-inativos');
    Route::get('/bloqueados-cliente', 'bloqueados')->name('user-cliente-bloqueados');
    Route::get('/busca-cliente','buscaCliente')->name('user-cliente-busca');
    Route::get('/atulizar-cliente/{id}', 'atualizarId')->name('user-cliente-atualizar-id');
    Route::put('/atualizar-cliente/{id}', 'atualizarPut')->name('user-cliente-atualizar-put');
});