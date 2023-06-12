<?php

use App\Http\Controllers\Category\MainButtonsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/category', [CategoryController::class, 'index'])->middleware('auth')->name('category.index');
Route::post('/category', [CategoryController::class, 'store'])->middleware('auth')->name('category.store');
Route::patch('/category/{category}', [CategoryController::class, 'update'])->middleware('auth')->name('category.update');
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->middleware('auth')->name('category.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/set-edit-category', [MainButtonsController::class, 'editCategory'])->name('edit-category');
    Route::get('/set-add-category', [MainButtonsController::class, 'addCategory'])->name('add-category');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
