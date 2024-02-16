<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\RolesOfUsers;
use App\Http\Controllers\Dashboard\UserController;
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


Route::prefix('dashboard')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::middleware(['checkrole:super_admin'])->group(function () {
        Route::get('/admin', [DashboardController::class, 'indexAdmin'])->name('dashboard.index.admin');
    });
    
    Route::middleware(['checkrole:super_admin,user'])->group(function () {
        Route::get('/user', [DashboardController::class, 'indexUser'])->name('dashboard.index.user');
    });

    Route::prefix('roles')->group(function(){
        Route::get('/', [RolesController::class, 'index'])->name('role.index');
        Route::get('/create', [RolesController::class, 'create'])->name('role.create');
        Route::post('/store', [RolesController::class, 'store'])->name('role.store');
        Route::get('/edit/{role}', [RolesController::class, 'edit'])->name('role.edit');
        Route::post('/roles/{role}', [RolesController::class, 'update'])->name('role.update');
        Route::delete('/delete/{role}', [RolesController::class, 'destroy'])->name('role.destroy');
        
    });

    Route::prefix('role_user')->group(function(){
        Route::get('/', [RolesOfUsers::class, 'index'])->name('role_user.index');
        Route::get('/create', [RolesOfUsers::class, 'RoleUserCreate'])->name('role_user.create');
        Route::post('/store', [RolesOfUsers::class, 'store'])->name('role_user.store');
        Route::get('/edit/{role_user}', [RolesOfUsers::class, 'edit'])->name('role_user.edit');
        Route::post('/roles/{role_user}', [RolesOfUsers::class, 'update'])->name('role_user.update');
        Route::delete('/destroy/{role_user}', [RolesOfUsers::class, 'destroy'])->name('role_user.destroy');
        
    });




    Route::prefix('profile')->group(function(){
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::prefix('users')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::delete('/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    });

});
