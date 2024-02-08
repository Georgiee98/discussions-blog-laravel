<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjectsController;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\Projects;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\View;

// Email
use Illuminate\Support\Facades\Mail;
use App\Mail\InterestInAcademy;

// Define routes first
Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('projects', ProjectsController::class);

// Auth
Route::get('/login', [UserController::class, 'loginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logoutForm'])->name('logout');
Route::post('/logout', [UserController::class, 'logout']);

// // Email
// Route::get('/email', [SendEmail::class, 'index']);
Route::get('/email', function () {
    return view('email.list');
});
// Route::post('/email', [SendEmail::class, 'sent']);

// View::composer() callback for projects.list view
View::composer('projects.list', function ($view) {
    \Log::debug("View composer for projects.list is running.");
    $view->with('projects', Projects::all());
});
// View::composer() callback for home view
View::composer('home', function ($view) {
    $view->with('projects', Projects::all());
});