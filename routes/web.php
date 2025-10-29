<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;

Route::get('/', [NewsController::class, 'index']);

Route::view('/register', 'home')
    ->name('register');

Route::view('/login', 'home')
    ->name('login');
    
/* Route::get('/', function () {
    return view('welcome');
})->name('home');
*/

//REGISTER ROUTES
/*
Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');
Route::post('/register', Register::class)
    ->middleware('guest');

//LOGIN ROUTES
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');
Route::post('/login', Login::class)
    ->middleware('guest');*/