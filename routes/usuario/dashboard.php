<?php

use App\Http\Controllers\Usuario\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware('is_user')->controller(DashboardController::class)->prefix('user')->group(function(){
    Route::get('/dashboard','index')->name('user-dashboard');
});