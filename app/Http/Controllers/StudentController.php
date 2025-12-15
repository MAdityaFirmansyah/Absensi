<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    // Tampilkan daftar siswa
    public function index()
    {
        // Ambil hanya user yang role-nya 'student'
        $students = User::where('role', 'student')->latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    // Form tambah siswa
    public function create()
    {
        return view('students.create');
    }

    // Simpan siswa baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'nisn' => 'required|numeric|unique:users',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'nisn' => $request->nisn,
            'role' => 'student', // Pastikan role-nya student
            'password' => Hash::make($request->nisn), // Password default = NISN
        ]);

        return redirect()->route('students.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    // Form edit siswa
    public function edit(User $student)
    {
        return view('students.edit', compact('student'));
    }

    // Update data siswa
    public function update(Request $request, User $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($student->id)],
            'nisn' => ['required', 'numeric', Rule::unique('users')->ignore($student->id)],
        ]);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'nisn' => $request->nisn,
        ]);

        return redirect()->route('students.index')->with('success', 'Data siswa diperbarui.');
    }

    // Hapus siswa
    public function destroy(User $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Siswa berhasil dihapus.');
    }
}