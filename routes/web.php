<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Bestaande routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('user-dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
