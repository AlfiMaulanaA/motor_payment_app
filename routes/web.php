<?php

use App\Exports\MotorsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BeliCashController;
use App\Http\Controllers\BeliKreditController;
use App\Http\Controllers\KreditPaketController;
use App\Http\Controllers\BayarCicilanController;
use App\Http\Controllers\Auth\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rute utama aplikasi ini menggunakan middleware untuk mengelola akses
| berdasarkan role. Admin memiliki akses ke semua fitur, sementara user
| hanya memiliki akses terbatas.
|
*/

// Halaman awal mengarahkan pengguna ke halaman login
Route::get('/', function () {
    return redirect('/login');
});

// Rute login dan logout
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Logout hanya dapat diakses oleh pengguna yang sudah login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

// Halaman setelah login
Route::middleware('auth')->group(function () {
    // Halaman selamat datang
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');

    // Halaman dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rute untuk mengelola profil pengguna
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute untuk admin dan user (akses untuk motors)
    Route::middleware(['auth', 'role:admin,user'])->group(function () {
        Route::resource('motors', MotorController::class);
        Route::resource('pembelis', PembeliController::class);
        Route::resource('beli-cash', BeliCashController::class);
        Route::resource('kredit-paket', KreditPaketController::class);
        Route::resource(
            'beli-kredit',
            BeliKreditController::class
        );
        Route::resource('bayar-cicilan', BayarCicilanController::class);
    });

    // Rute untuk admin (akses penuh)
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::get('/sales', [SalesController::class, 'index'])->name('sales.index')->middleware('auth');
        Route::get('/sales/motor-sales-data', [SalesController::class, 'getMotorSalesData'])->name('sales.motorSalesData');
    });

    Route::get('/kontak', function () {
        return view('kontak');
    })->name('kontak');

    Route::get('/motors/export/csv', [MotorController::class, 'exportToCsv'])->name('motors.export.csv');
    Route::get('/pembelis/export/csv', [PembeliController::class, 'exportToCsv'])->name('pembelis.export.csv');
    Route::get('/beli-cash/export/csv', [BeliCashController::class, 'exportToCsv'])->name('beli-cash.export.csv');
    Route::get('/beli-kredit/export/csv', [BeliKreditController::class, 'exportToCsv'])->name('beli-kredit.export.csv');
    Route::get('/kredit-paket/export/csv', [KreditPaketController::class, 'exportToCsv'])->name('kredit-paket.export.csv');
    Route::get('/users/export/csv', [UserController::class, 'exportToCsv'])->name('users.export.csv');
    Route::get('/bayar-cicilan/export/csv', [BayarCicilanController::class, 'exportToCsv'])->name('bayar-cicilan.export.csv');
});

require __DIR__ . '/auth.php';
