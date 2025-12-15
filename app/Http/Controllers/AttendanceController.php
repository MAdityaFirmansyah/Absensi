<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Menampilkan daftar absensi
    public function index()
    {
        // Mengambil data absensi terbaru dengan data siswanya
        $attendances = Attendance::with('user')->latest()->paginate(10);
        return view('attendances.index', compact('attendances'));
    }

    // Menampilkan form tambah absensi
    public function create()
    {
        // Ambil hanya user dengan role 'student' (siswa)
        $students = User::where('role', 'student')->get();
        return view('attendances.create', compact('students'));
    }

    // Menyimpan data absensi baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'status' => 'required|in:hadir,sakit,izin,alpa',
            'time_in' => 'nullable', // Boleh kosong jika izin/sakit
            'time_out' => 'nullable',
        ]);

        Attendance::create($request->all());

        return redirect()->route('attendances.index')
            ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit(Attendance $attendance)
    {
        $students = User::where('role', 'student')->get();
        return view('attendances.edit', compact('attendance', 'students'));
    }

    // Update data absensi
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'status' => 'required|in:hadir,sakit,izin,alpa',
            'time_in' => 'nullable',
            'time_out' => 'nullable',
        ]);

        $attendance->update($request->all());

        return redirect()->route('attendances.index')
            ->with('success', 'Data absensi berhasil diperbarui.');
    }

    // Hapus data absensi
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('attendances.index')
            ->with('success', 'Data absensi berhasil dihapus.');
    }
}