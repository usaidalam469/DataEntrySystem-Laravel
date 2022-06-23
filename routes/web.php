<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Voters resource routes -> See laravel documentation for routes details or run php artisan route:list
Route::middleware('auth')->resource('voters', VoterController::class);
