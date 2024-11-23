<?php

use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CarController;

Route::get('/workshops/create', [MechanicController::class, 'create'])->name('workshops.create');

Route::post('/workshops', [MechanicController::class, 'store'])->name('workshops.store');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

//Mecanica

Route::get('/client/create', [ClientController::class, 'create'])->name('client.create');

Route::post('/client', [ClientController::class, 'store'])->name('client.store');

Route::get('client/{client}/car/create', [CarController::class, 'create'])->name('car.create');

Route::post('/car', [CarController::class, 'store'])->name('car.store');

Route::get('/clients', [ClientController::class, 'index'])->name('client.index');

Route::get('/budget/create/{client_id}', [BudgetController::class, 'create'])->name('budget.create');

Route::post('/budget', [BudgetController::class, 'store'])->name('budget.store');

Route::get('/budgets', [BudgetController::class, 'index'])->name('budget.index');

Route::get('mechanic/budgets/{id}', [BudgetController::class, 'showMechanic'])->name('budget.show');

//cliente
Route::get('/client/budgets', [BudgetController::class, 'indexClient'])->name('clientbudget.index');


