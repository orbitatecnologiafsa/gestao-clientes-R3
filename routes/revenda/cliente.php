<?php

use App\Http\Controllers\Revenda\ClienteController;
use Illuminate\Support\Facades\Route;

Route::controller(ClienteController::class)->middleware('is_revenda')->prefix('revenda')->group(function () {
    Route::get('/cadastrar-cliente','cadastrar')->name('revenda-cliente-cadastro');
    Route::get('/deletar-cliente', 'deletarId')->name('revenda-cliente-deletar');
    Route::delete('/deletar-cliente', 'deleteId')->name('revenda-cliente-delerar-id');
    Route::post('/cadastro-cliente', 'cadastroPost')->name('revenda-cliente-cadastro-post');
    Route::get('/busca-empresa-cliente','buscaClienteEmpresa')->name('revenda-cliente-busca-empresa');
    Route::get('/lista-cliente','lista')->name('revenda-cliente-lista');
    Route::get('/detalhes-cliente/{id}', 'detalhesId')->name('revenda-cliente-detalhes-id');
    Route::get('/ativos-cliente','ativos')->name('revenda-cliente-ativos');
    Route::get('/inativos-cliente', 'inativos')->name('revenda-cliente-inativos');
    Route::get('/bloqueados-cliente', 'bloqueados')->name('revenda-cliente-bloqueados');
    Route::get('/busca-cliente','buscaCliente')->name('revenda-cliente-busca');
    Route::get('/atulizar-cliente/{id}', 'atualizarId')->name('revenda-cliente-atualizar-id');
    Route::put('/atualizar-cliente/{id}', 'atualizarPut')->name('revenda-cliente-atualizar-put');
    
});