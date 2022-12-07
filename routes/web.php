<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return redirect('beranda');
});

Auth::routes();

Route::get('beranda', [BerandaController::class, 'index']);

Route::middleware(['auth', 'owner'])->group(function () { // hanya user dengan role owner yang bisa mengakses kelola user, selain itu tidak bisa
    Route::resource('user', UserController::class);
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('deleteuser/{id}', [UserController::class, 'destroy'])->name('user.destroy');
 
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('dashboard', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::resource('kategori', KategoriController::class);
    Route::resource('menu', MenuController::class);
    Route::get('kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::get('deletekategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
    Route::get('menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::get('deletemenu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
