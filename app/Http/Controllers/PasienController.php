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

    public function create()
    {
        return view('daftar_pemeriksaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_daftar' => 'required|date',
            'group_test' => 'required',
            'jenis_pemeriksaan' => 'required',
            'jaminan' => 'required',
            'dokter' => 'required',
            'no_rm' => 'required',
            'tanggal_pemeriksaan' => 'required|date',
            'pembayaran' => 'required',
            'status_pemeriksaan' => 'required',
        ]);

        Pasien::create($request->all());
        return redirect()->route('daftar_pemeriksaan.index')->with('success', 'Data pemeriksaan berhasil ditambahkan.');
    }

    public function edit(Pasien $daftar_pemeriksaan)
    {
        return view('daftar_pemeriksaan.edit', compact('daftar_pemeriksaan'));
    }

    public function update(Request $request, Pasien $daftar_pemeriksaan)
    {
        $request->validate([
            'kode' => 'required',
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_daftar' => 'required|date',
            'jenis_pemeriksaan' => 'required',
            'jaminan' => 'required',
            'dokter' => 'required',
            'no_rm' => 'required',
            'tanggal_pemeriksaan' => 'required|date',
            'pembayaran' => 'required',
            'status_pemeriksaan' => 'required',
            'group_test' => 'required',
        ]);

        $daftar_pemeriksaan->update($request->all());
        return redirect()->route('daftar_pemeriksaan.index')->with('success', 'Data pemeriksaan berhasil diperbarui.');
    }

    public function destroy(Pasien $pasien)
    {
        $pasien->delete();
        return redirect()->route('daftar_pemeriksaan.index')->with('success', 'Data pemeriksaan berhasil dihapus.');
    }
    public function showByGroup($group)
    {
        $pasiens = Pasien::where('group_test', $group)->get();
        return view('daftar_pemeriksaan.group', compact('pasiens', 'group'));
    }
}
