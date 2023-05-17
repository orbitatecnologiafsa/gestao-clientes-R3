<?php

use App\Http\Controllers\Revenda\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('is_revenda')->controller(DashboardController::class)->prefix('revenda')->group(function(){
    Route::get('/dashboard','index')->name('revenda-dashboard');
});