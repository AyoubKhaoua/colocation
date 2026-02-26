<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Colocation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/admin.dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/user.dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//create colocation
Route::get('show', [Colocation::class, 'create'])->name('show.form');
Route::post('/store', [Colocation::class, 'store'])->name('store.from');
require __DIR__ . '/auth.php';
