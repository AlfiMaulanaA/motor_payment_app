<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeliCashController;
use App\Http\Controllers\BeliKreditController;
use App\Http\Controllers\KreditPaketController;
use App\Http\Controllers\BayarCicilanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Berikut adalah rute untuk aplikasi Anda. Rute login digunakan sebagai
| halaman awal jika pengguna belum login. Jika sudah login, pengguna
| diarahkan ke halaman `welcome`.
|
*/

// Jika belum login, arahkan ke halaman login
Route::get('/', function () {
    return redirect('/login');
});

// Rute login dan logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman setelah login
Route::middleware('auth')->group(function () {
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rute untuk profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource rute untuk fitur lain
    Route::resource('motors', MotorController::class);
    Route::resource('pembelis', PembeliController::class);
    Route::resource('beli-cash', BeliCashController::class);
    Route::resource('kredit-paket', KreditPaketController::class);
    Route::resource('beli-kredit', BeliKreditController::class);
    Route::resource('bayar-cicilan', BayarCicilanController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

require __DIR__ . '/auth.php';
