<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// UPDATE: Halaman Utama menggunakan HomeController
Route::get('/', [HomeController::class, 'index'])->name('home');

// BARU: Route untuk memproses Cek Absensi Siswa
Route::post('/cek-absensi', [HomeController::class, 'search'])->name('cek.absensi');

// Dashboard (Hanya bisa diakses jika login & verified)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group Middleware untuk User yang Login
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('attendances', \App\Http\Controllers\AttendanceController::class);
});


require __DIR__.'/auth.php';