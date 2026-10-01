<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Menampilkan daftar mahasiswa (Bisa diakses Admin & User)
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    // Menampilkan form tambah mahasiswa (Hanya Admin)
    public function create()
    {
        return view('mahasiswa.create');
    }

    // Menyimpan data mahasiswa baru (Hanya Admin)
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'program_studi' => 'required',
            'email' => 'required|email|unique:mahasiswas,email',
            'angkatan' => 'required',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    // Menampilkan form edit mahasiswa (Hanya Admin)
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // Mengupdate data mahasiswa (Hanya Admin)
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim,' . $mahasiswa->id,
            'nama' => 'required',
            'program_studi' => 'required',
            'email' => 'required|email|unique:mahasiswas,email,' . $mahasiswa->id,
            'angkatan' => 'required',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diubah.');
    }

    // Menghapus data mahasiswa (Hanya Admin)
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}