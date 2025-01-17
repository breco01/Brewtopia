<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Models\Article;

// Logout route
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

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
Route::middleware(['auth', 'verified'])->group(function () {
    // Users management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::put('/users/{user}/update-admin-status', [UserController::class, 'updateAdminStatus'])->name('users.updateAdminStatus');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    // Routes voor nieuwsartikelen
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');

    // Bewerken en verwijderen van artikelen
    Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

// Artikelen overzicht voor iedereen
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');

// Home route en artikelen voor de welkomstpagina
Route::get('/', function () {
    $articles = Article::all();
    return view('welcome', compact('articles'));
});

// Routes voor dashboards
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

require __DIR__ . '/auth.php';
