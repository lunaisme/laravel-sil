<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $pasiens = Pasien::all();
        return view('daftar_pemeriksaan.index', compact('pasiens'));
    }

    public function show($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('daftar_pemeriksaan.show', compact('pasien'));
    }
    public function create()
    {
        return view('daftar_pemeriksaan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_daftar' => 'required|date',
            'jenis_pemeriksaan' => 'required',
            'jaminan' => 'required',
            'dokter' => 'required',
        ]);

        Pasien::create($validatedData);

        return redirect()->route('daftar_pemeriksaan.index')->with('success', 'Data pemeriksaan berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('daftar_pemeriksaan.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_daftar' => 'required|date',
            'jenis_pemeriksaan' => 'required',
            'jaminan' => 'required',
            'dokter' => 'required',
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update($validatedData);

        return redirect()->route('daftar_pemeriksaan.index')->with('success', 'Data pemeriksaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return redirect()->route('daftar_pemeriksaan.index')->with('success', 'Data pemeriksaan berhasil dihapus.');
    }
}
