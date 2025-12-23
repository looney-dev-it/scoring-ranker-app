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
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('/', [HomeController::class, 'index'])->name('main');
Route::get('/score', [ScoreController::class, 'index'])->name('score');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/profile/{id}', [UserController::class, 'show'])->name('user.show');

// News
Route::prefix('news')->group(function() {
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::get('/{id}', [NewsController::class, 'show'])->name('news.show');
});

// Forum
Route::prefix('forum')->group(function() {
    Route::get('/', [ForumController::class, 'index'])->name('forum');
    Route::get('/topic/{id}', [ForumController::class, 'showScoreTopic'])->name('forum.topic');
    Route::get('/topic/{topicid}/thread/{threadid}', [ForumController::class, 'showThread'])->name('forum.thread');
    Route::delete('/topic/{topicid}/thread/{threadid}', [ForumController::class, 'deleteThread'])->name('forum.thread.destroy');
});

// Contact form
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.send');


Route::middleware('auth')->group(function() {
    // My Page menu
    Route::get('/myprofile', [UserController::class, 'myprofile'])->name('user.update');
    //LOGOUT ROUTE
    Route::post('/logout', Logout::class)->name('logout');
});


Route::middleware(['auth', 'is_admin'])->group(function() {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/user', [AdminController::class, 'user']);
    Route::get('/admin/news', [AdminController::class, 'news']);
    Route::get('/admin/score', [AdminController::class, 'score']);
    Route::get('/admin/faq', [AdminController::class, 'faq']);
    Route::get('/admin/contact', [AdminController::class, 'contact'])->name('admin.contact');
});

Route::middleware('guest')->group(function() {
    //REGISTER ROUTES
    Route::view('/register', 'auth.register')->name('register');    
    Route::post('/register', Register::class);

    //LOGIN ROUTES
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', Login::class);

    Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
    
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});