<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
Route::get('/', function () {
    return view('home.index');
});


route::get('/',[AdminController::class, 'home']);


route::get('/home',[AdminController::class, 'index'])->name('home');

route::get('/create_room',[AdminController::class, 'create_room']);

route::post('/add_room',[AdminController::class, 'add_room']);

route::get('/view_room',[AdminController::class, 'view_room']);

// Define resource routes for rooms
Route::resource('room', AdminController::class);
