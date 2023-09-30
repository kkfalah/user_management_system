<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
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

// Auth::routes();
Auth::routes(['register' => false]);


Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth', 'role:Admin'])->group(function () {
    // Administrator-only routes
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Profile routes
    Route::get('/myaccount', [AdminController::class, 'myaccount'])->name('myaccount');
    Route::get('/myaccount/edit', [AdminController::class, 'myaccountEdit'])->name('myaccount.edit');
    Route::put('/myaccount', [AdminController::class, 'myaccountUpdate'])->name('myaccount.update');

    // Users routes
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::middleware(['auth', 'role:User'])->group(function () {
    // User-only routes
    Route::get('/profile', [UserProfileController::class, 'index'])->name('user.profile');
    Route::get('/profile/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');
});
