<?php

use App\Mail\SendEmail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\UserController;
use App\Models\Projects;
use App\Http\Controllers\ContactViaEmailController;

Route::get('/email', function () {
    $to = 'delevdzoce@gmail.com';
    Mail::to($to)->send(new SendEmail());

    return 'Email sent successfully!';
});

// Display the contact form
Route::get('/contact', [ContactViaEmailController::class, 'showContactForm'])->name('contact');

// Handle the form submission
Route::post('/contact', [ContactViaEmailController::class, 'contact'])->name('contact.submit');

// Route for the home page
Route::get('/', function () {
    return view('home')->with('projects', Projects::all()); // Return the home view with projects data
})->name('home');

// Route for the email page
Route::get('/emails', function () {
    return view('emails.email'); // Return the email list view
});


// Route to display the login form
Route::get('/login', [UserController::class, 'loginForm'])->name('login');

// Route to handle the login form submission
Route::post('/login', [UserController::class, 'login']);

// Route to display the logout form
Route::get('/logout', [UserController::class, 'logoutForm'])->name('logout');

// Route to handle the logout form submission
Route::post('/logout', [UserController::class, 'logout']);

// Routes for projects
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectsController::class, 'create'])->name('projects.create');
Route::post('/projects', [ProjectsController::class, 'store'])->name('projects.store');
Route::get('/projects/{project}/edit', [ProjectsController::class, 'edit'])->name('projects.edit');
Route::put('/projects/{project}', [ProjectsController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}', [ProjectsController::class, 'destroy'])->name('projects.destroy');