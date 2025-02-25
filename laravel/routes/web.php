<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
Route::get('/', function () {
    return view('home.index');
});


route::get('/',[AdminController::class, 'home']);

route::get('/home',[AdminController::class, 'index'])->name('home');
