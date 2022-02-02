<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpensesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/profile', function () {
    return view('profile.show');
})->name('profile');


Route::resource('dashboard/expenses', ExpensesController::class)->middleware(['auth:sanctum', 'verified']);
Route::get('ddashboard/expenses/reports', [ReportsController::class, 'index'])->name('report.index');

Route::resource('dashboard/categories', CategoryController::class)->middleware(['auth:sanctum', 'verified']);
Route::resource('dashboard/budgets', BudgetController::class)->middleware(['auth:sanctum', 'verified']);