<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Login;


Route::get('/', [HomeController::class, 'index']);



Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

Route::get('/profile/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('/myprofile', [UserController::class, 'myprofile'])->name('user.update');

Route::get('/score', [ScoreController::class, 'index'])->name('score');
Route::get('/forum', [ForumController::class, 'index']);
Route::get('/faq', [FaqController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);


/*
Route::middleware('auth')->group(function() {
    Route::post('/chirps', [ChirpController::class, 'store']);
    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']);
    Route::put('/chirps/{chirp}', [ChirpController::class, 'update']);
    Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy']);
});
*/

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/user', [AdminController::class, 'user']);
Route::get('/admin/news', [AdminController::class, 'news']);
Route::get('/admin/score', [AdminController::class, 'score']);

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