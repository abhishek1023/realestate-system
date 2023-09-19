<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\PropertyController;

// Standard resource routes for properties
Route::resource('properties', PropertyController::class);

// Additional routes
// You can add any other routes you need, for example, for deleting properties
Route::get('properties/delete/{uuid}', [PropertyController::class, 'destroy'])->name('properties.delete');

