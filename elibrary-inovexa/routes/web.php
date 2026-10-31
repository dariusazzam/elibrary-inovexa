<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\EnsureRole;
use Illuminate\Support\Facades\Route;

// Publik
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/reservasi/{id}', [HomeController::class, 'reserve'])->whereNumber('id')->name('reserve');

// Auth & Akses Akun
Route::get('/masuk/{role?}', [AuthController::class, 'form'])->where('role', 'member|admin|super')->name('login');
Route::get('/login/{role?}', function (?string $role = null) {
    return redirect()->route('login', $role ? ['role' => $role] : []);
});
Route::post('/masuk', [AuthController::class, 'login'])->name('login.post');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/keluar', [AuthController::class, 'logout'])->name('logout');
Route::post('/logout', [AuthController::class, 'logout']);

// Pendaftaran mandiri & Lupa Sandi
Route::get('/daftar', [AuthController::class, 'registerForm'])->name('register');
Route::post('/daftar', [AuthController::class, 'register'])->name('register.post');
Route::get('/lupa-sandi', [AuthController::class, 'forgotForm'])->name('password.forgot');
Route::post('/lupa-sandi', [AuthController::class, 'resetPassword'])->name('password.reset');

// Semua peran yang sudah login
Route::middleware(EnsureRole::class.':member,admin,super')->group(function () {
    Route::get('/dashboard/elib/baca/{id}', [DashboardController::class, 'reader'])->whereNumber('id')->name('elib.read');
    Route::get('/dashboard/{menu?}', [DashboardController::class, 'show'])->name('dashboard');
});

// Anggota
Route::middleware(EnsureRole::class.':member')->group(function () {
    Route::delete('/reservasi/{id}', [DashboardController::class, 'cancel'])->whereNumber('id')->name('reserve.cancel');
    Route::post('/dashboard/profil', [DashboardController::class, 'updateProfile'])->name('profile.update');
});

// Petugas & Super Admin
Route::middleware(EnsureRole::class.':admin,super')->group(function () {
    Route::post('/sirkulasi', [DashboardController::class, 'lend'])->name('lend');
    Route::post('/sirkulasi/{id}/kembali', [DashboardController::class, 'giveBack'])->whereNumber('id')->name('return');
    Route::post('/stok', [DashboardController::class, 'addBook'])->name('stock.add');
});

// Super Admin
Route::middleware(EnsureRole::class.':super')->group(function () {
    Route::post('/pengguna/{i}/toggle', [DashboardController::class, 'toggleUser'])->whereNumber('i')->name('user.toggle');
    Route::post('/pengaturan', [DashboardController::class, 'saveSettings'])->name('settings.save');
});
