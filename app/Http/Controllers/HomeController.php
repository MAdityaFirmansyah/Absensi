<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function search(Request $request)
    {
        $request->validate([
            'nisn' => 'required|numeric'
        ]);

        // Cari siswa berdasarkan NISN
        $siswa = User::where('nisn', $request->nisn)->where('role', 'student')->first();

        if (!$siswa) {
            return back()->with('error', 'Data siswa dengan NISN tersebut tidak ditemukan.');
        }

        // Cari data absensi hari ini
        $absensi = Attendance::where('user_id', $siswa->id)
                            ->where('date', now()->format('Y-m-d'))
                            ->first();

        return back()->with([
            'search_result' => true,
            'siswa' => $siswa,
            'absensi' => $absensi
        ]);
    }
}