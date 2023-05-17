<?php

use App\Http\Controllers\Revenda\EmpresaController;
use Illuminate\Support\Facades\Route;

Route::controller(EmpresaController::class)->middleware('is_revenda')->prefix('revenda')->group(function () { 

    Route::get('/lista-empresa','lista')->name('revenda-empresa-lista');
    Route::get('/cadastrar-empresa','cadastro')->name('revenda-empresa-cadastro');
    Route::post('/cadastro-empresa','cadastroPost')->name('revenda-empresa-cadastro-post');
    Route::get('/detalhes-empresa/{id}', 'detalhes')->name('revenda-empresa-detalhes');
    Route::get('/atualizar-empresa/{id}', 'atualizarId')->name('revenda-empresa-atualizar');
    Route::put('/atualizar-empresa/{id}', 'atualizarPutId')->name('revenda-empresa-atualizar-id');
    Route::get('/deletar-empresa/{id}', 'deletarId')->name('revenda-empresa-deletar');
    Route::delete('/deletar-empresa/{id}', 'deleteId')->name('revenda-empresa-deletar-id');
    
});