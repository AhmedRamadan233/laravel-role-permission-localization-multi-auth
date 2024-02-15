<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\RolesController;
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


Route::prefix('auth')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
});


Route::middleware(['auth:user,admin'])->prefix('dashboard')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/admin', [DashboardController::class, 'indexAdmin'])->name('dashboard.index.admin');
    Route::get('/user', [DashboardController::class, 'indexUser'])->name('dashboard.index.user');

    Route::prefix('roles')->group(function(){
        Route::get('/', [RolesController::class, 'index'])->name('role.index');
        Route::get('/create', [RolesController::class, 'create'])->name('role.create');
        Route::post('/store', [RolesController::class, 'store'])->name('role.store');
        Route::get('/edit/{role}', [RolesController::class, 'edit'])->name('role.edit');
        Route::post('/roles/{role}', [RolesController::class, 'update'])->name('role.update');
        Route::delete('/delete/{role}', [RolesController::class, 'destroy'])->name('role.destroy');
    });
});
