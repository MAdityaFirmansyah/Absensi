<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        // 1. Total Siswa Aktif
        $totalSiswa = User::where('role', 'student')->count();

        // 2. Statistik Kehadiran Hari Ini
        $hadir = Attendance::whereDate('date', $today)->where('status', 'hadir')->count();
        $sakit = Attendance::whereDate('date', $today)->where('status', 'sakit')->count();
        $izin = Attendance::whereDate('date', $today)->where('status', 'izin')->count();
        $alpa = Attendance::whereDate('date', $today)->where('status', 'alpa')->count();

        // 3. Menghitung yang belum absen
        // Asumsi: Total Absensi Hari Ini = Hadir + Sakit + Izin + Alpa
        $totalAbsensiHariIni = $hadir + $sakit + $izin + $alpa;
        $belumAbsen = $totalSiswa - $totalAbsensiHariIni;
        
        // Pastikan tidak negatif (jika ada data double/error)
        if($belumAbsen < 0) $belumAbsen = 0;

        // 4. Ambil 5 data absensi terakhir untuk ditampilkan di dashboard
        $riwayatTerbaru = Attendance::with('user')
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get();

        return view('dashboard', compact(
            'totalSiswa', 'hadir', 'sakit', 'izin', 'alpa', 'belumAbsen', 'riwayatTerbaru'
        ));
    }
}