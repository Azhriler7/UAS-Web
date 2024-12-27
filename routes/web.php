<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\Auth\LogoutController;

// Route untuk halaman login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

// Route untuk halaman registrasi
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('register', [RegisterController::class, 'register'])->name('register');

// Route untuk halaman lupa password
Route::get('/forgot-password', [ForgotPasswordController::class, 'showResetForm'])->name('forgot-password.form');
Route::post('/forgot-password', [ForgotPasswordController::class, 'reset'])->name('forgot-password');

// Route untuk halaman dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route untuk halaman profil admin
Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');

// Route untuk statistik pengunjung
Route::get('/statistik', [StatistikController::class, 'index'])->name('statistik.index');

// Route untuk pendataan pengunjung (tambah pengunjung)
Route::get('/pendataan', [PengunjungController::class, 'create'])->name('pengunjung.create');
Route::post('/pendataan', [PengunjungController::class, 'store'])->name('pengunjung.store');

// Route untuk menampilkan data pengunjung
Route::get('/data-pengunjung', [PengunjungController::class, 'index'])->name('pengunjung.index');

// Route untuk mengedit data pengunjung
Route::get('/data-pengunjung/{pengunjung}/edit', [PengunjungController::class, 'edit'])->name('pengunjung.edit');
Route::put('/data-pengunjung/{pengunjung}', [PengunjungController::class, 'update'])->name('pengunjung.update');

// Route untuk menghapus data pengunjung
Route::delete('/data-pengunjung/{pengunjung}', [PengunjungController::class, 'destroy'])->name('pengunjung.destroy');
?>