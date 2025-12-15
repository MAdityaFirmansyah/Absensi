<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AttendanceController; // Pastikan ini ada jika pakai controller

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/cek-absensi', [HomeController::class, 'search'])->name('cek.absensi');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- PASTIKAN 3 ROUTE DI BAWAH INI ADA ---
    
    Route::resource('students', \App\Http\Controllers\StudentController::class);
    // 1. Route CRUD Absensi
    Route::resource('attendances', AttendanceController::class);

    // 2. Route Tentang RPL
    Route::get('/about', function () {
        return view('about');
    })->name('about');

    // 3. Route Notifikasi
    Route::get('/notifications', function () {
        return view('notifications');
    })->name('notifications');
});

require __DIR__.'/auth.php';