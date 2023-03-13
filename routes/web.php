<?php

use App\Http\Controllers\LoginController;

use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function(){
    Route::get('/','getStockInfo')->name('login');
});

