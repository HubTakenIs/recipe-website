<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipesController;

Route::post('/', [RecipesController::class, 'store']) ->name('recipes.store');
Route::get('/', [RecipesController::class, 'index']) ->name('recipes.index');
Route::get('/{recipe}/edit', [RecipesController::class, 'edit']) ->name('recipes.edit');
Route::put('/{recipe}/update', [RecipesController::class, 'update']) ->name('recipes.update');
Route::get('/create', [RecipesController::class, 'create']) ->name('recipes.create');

Route::get('/about', [RecipesController::class, 'about']) ->name('recipes.about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
