<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;

// Halaman Depan
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/cek-absensi', [HomeController::class, 'search'])->name('cek.absensi');

// Dashboard (Login required)
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard Utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profil User
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Siswa
    Route::resource('students', StudentController::class);

    // CRUD Absensi
    Route::resource('attendances', AttendanceController::class);

    // Fitur Tentang RPL (INI YANG ANDA CARI)
    Route::get('/about', function () {
        return view('about');
    })->name('about');
});

require __DIR__.'/auth.php';