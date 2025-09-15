<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ProfileController; // <-- importe isso

Route::get('/', fn() => redirect()->route('livros.index'));

Route::get('/dashboard', fn() => redirect()->route('livros.index'))
    ->middleware(['auth'])
    ->name('dashboard');

// CRUD protegido
Route::middleware('auth')->group(function () {
    Route::get('/livros',              [LivroController::class, 'index'])->name('livros.index');
    Route::get('/livros/novo',         [LivroController::class, 'create'])->name('livros.create');
    Route::post('/livros',             [LivroController::class, 'store'])->name('livros.store');
    Route::get('/livros/{livro}/edit', [LivroController::class, 'edit'])->name('livros.edit');
    Route::put('/livros/{livro}',      [LivroController::class, 'update'])->name('livros.update');
    Route::delete('/livros/{livro}',   [LivroController::class, 'destroy'])->name('livros.destroy');

    // ------ rotas de perfil do Breeze ------
    Route::get('/profile',  [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',[ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',[ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
