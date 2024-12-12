<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\HasilPemeriksaan;
use Illuminate\Http\Request;

class HasilPemeriksaanController extends Controller
{
    public function index($pasienId)
    {
        $pasien = Pasien::with('hasilPemeriksaan')->findOrFail($pasienId);
        return view('hasil_pemeriksaan.index', compact('pasien'));
    }

    public function store(Request $request, $pasienId)
    {
        $validatedData = $request->validate([
            'hasil_pemeriksaan.*.parameter' => 'required|string',
            'hasil_pemeriksaan.*.hasil' => 'required|string',
            'hasil_pemeriksaan.*.satuan' => 'required|string',
            'hasil_pemeriksaan.*.nilai_rujukan' => 'required|string',
            'hasil_pemeriksaan.*.metode' => 'nullable|string',
            'hasil_pemeriksaan.*.status' => 'required|in:Normal,Abnormal',
        ]);

        $pasien = Pasien::findOrFail($pasienId);

        foreach ($validatedData['hasil_pemeriksaan'] as $data) {
            $pasien->hasilPemeriksaan()->create($data);
        }

        return redirect()->route('hasil_pemeriksaan.index', $pasienId)->with('success', 'Hasil pemeriksaan berhasil disimpan.');
    }
    public function print($pasienId)
    {
        $pasien = Pasien::with('hasilPemeriksaan')->findOrFail($pasienId);
        return view('hasil_pemeriksaan.print', compact('pasien'));
    }
}
