<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Login;


Route::get('/', [NewsController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index']);

//REGISTER ROUTES

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
    ->middleware('guest');

//LOGOUT ROUTE
Route::post('/logout', Logout::class)
    ->middleware('auth')
    ->name('logout');