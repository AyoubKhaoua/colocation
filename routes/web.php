<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Category;
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
Route::get('show', [ColocationController::class, 'create'])->name('show.form');
Route::post('/store', [ColocationController::class, 'store'])->name('store.colocation');
//colocation
Route::get('/categories', [CategoryController::class, 'index'])->name('index.categorie');
Route::get('/create/{colocation}', [CategoryController::class, 'create'])->name('create.categorie');
Route::post('/store/{colocation}', [CategoryController::class, 'store'])->name('store.categorie');
Route::post('/categories/{category}', [CategoryController::class, 'destroy'])->name('destroy.categorie');

// invitations
Route::middleware('auth')->group(function () {
    Route::get('/invitations', [InvitationController::class, 'index'])->name('invitations.index');
    Route::post('/invitations/{colocation}', [InvitationController::class, 'store'])->name('invitations.store');
});

// public invitation handling
Route::get('/invitations/{token}', [InvitationController::class, 'show'])->name('invitations.show');
Route::post('/invitations/{token}/accept', [InvitationController::class, 'accept'])->name('invitations.accept');
Route::post('/invitations/{token}/decline', [InvitationController::class, 'decline'])->name('invitations.decline');




















require __DIR__ . '/auth.php';
