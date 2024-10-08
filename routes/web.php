<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/produtos', [ProductController::class, 'index'])->name('produtos.index');
Route::get('/produtos/create', [ProductController::class, 'create'])->name('produtos.create');
Route::post('/produtos', [ProductController::class, 'store'])->name('produtos.store');
Route::get('/produtos/{id}/edit', [ProductController::class, 'edit'])->name('produtos.edit');
Route::put('/produtos/{id}', [ProductController::class, 'update'])->name('produtos.update');
Route::delete('/produtos/{id}', [ProductController::class, 'destroy'])->name('produtos.destroy');


