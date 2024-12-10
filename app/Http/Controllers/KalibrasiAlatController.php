<?php

namespace App\Http\Controllers;

use App\Models\KalibrasiAlat;
use Illuminate\Http\Request;

class KalibrasiAlatController extends Controller
{
    public function index()
    {
        $kalibrasi = KalibrasiAlat::all();
        return view('kalibrasi.index', compact('kalibrasi'));
    }

    public function create()
    {
        return view('kalibrasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_alat' => 'required',
            'nama_alat' => 'required',
            'tanggal_kalibrasi' => 'required|date',
            'status' => 'required',
        ]);

        KalibrasiAlat::create($request->all());
        return redirect()->route('kalibrasi.index');
    }

    public function edit(KalibrasiAlat $kalibrasi)
    {
        return view('kalibrasi.edit', compact('kalibrasi'));
    }

    public function update(Request $request, KalibrasiAlat $kalibrasi)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $kalibrasi->update($request->all());
        return redirect()->route('kalibrasi.index');
    }
}
