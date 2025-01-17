<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

// Logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Routes voor verschillende pagina's
Route::get('/reviews', function () {
    return view('reviews.index');
})->name('reviews.index');

Route::get('/beers/create', function () {
    return view('beers.create');
})->name('beers.create');

Route::get('/beers/list', function () {
    return view('beers.list');
})->name('beers.list');

Route::get('/beers/top', function () {
    return view('beers.top');
})->name('beers.top');

Route::get('/community', function () {
    return view('community.index');
})->name('community.index');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');


// Admin routes
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Wijzig admin-status van een gebruiker
Route::put('/users/{user}/update-admin-status', [UserController::class, 'updateAdminStatus'])->name('users.updateAdminStatus');

// Verwijder een gebruiker
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// Artikelen
Route::get('/articles/create', function () {
    return view('articles.create');
})->middleware(['auth', 'verified'])->name('articles.create');

// Routes voor dashboards
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('user-dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin-dashboard', function () {
    return view('admin-dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

// Routes voor profielbeheer
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
