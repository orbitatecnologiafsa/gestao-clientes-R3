<?php

use App\Http\Controllers\Adm\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('is_adm')->controller(DashboardController::class)->prefix('adm')->group(function(){
    Route::get('/dashboard','index')->name('adm-dashboard');
});