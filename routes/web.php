<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::redirect('/', '/dashboard');

Route::get('/dashboard', [ProjectController::class, 'dashboard'])->name('dashboard');
Route::get('/projects/export', [ProjectController::class, 'export'])->name('projects.export');
Route::resource('projects', ProjectController::class);

Route::get('/welcome', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('app-dashboard', function () {
        return Inertia::render('dashboard');
    })->name('app.dashboard');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
