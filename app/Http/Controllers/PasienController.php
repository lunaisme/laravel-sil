<?php


namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        if ($query) {
            $pasiens = Pasien::where('nama_pasien', 'LIKE', "%{$query}%")
                ->get();
        } else {
            $pasiens = Pasien::all();
        }
        return view('daftar_pemeriksaan.index', compact('pasiens', 'query'));
    }

    public function create()
    {
        return view('daftar_pemeriksaan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_rm' => 'required',
            'kode' => 'required',
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'status_pasien' => 'required',
            'umur' => 'required|integer',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'jaminan' => 'required',
            'no_jaminan' => 'required',
            'dokter' => 'required',
            'no_lab' => 'required',
            'group_test' => 'required',
            'jenis_pemeriksaan' => 'required',
            'jenis_sample' => 'required|in:Serum,EDTA,Citrat,Urine,Lainnya',
            'tgl_pemeriksaan' => 'required|date',
            'pembayaran' => 'required',
            'status_pemeriksaan' => 'required',
        ]);

        $pasien = Pasien::create($request->all());
        return redirect()->route('daftar_pemeriksaan.index')->with('success', 'Data pemeriksaan berhasil ditambahkan.');
    }

    public function edit(Pasien $daftar_pemeriksaan)
    {
        return view('daftar_pemeriksaan.edit', compact('daftar_pemeriksaan'));
    }

    public function update(Request $request, Pasien $daftar_pemeriksaan)
    {
        $request->validate([
            'status_pemeriksaan' => 'required',
        ]);


        $daftar_pemeriksaan->update($request->all());
        return redirect()->route('pengambilan_sampel')->with('success', 'Data pemeriksaan berhasil diperbarui.');
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
    public function showRiwayatPemeriksaan()
    {
        $pasiens = Pasien::whereIn('status_pemeriksaan', ['Validasi', 'Selesai'])->orderBy('status_pemeriksaan', 'desc')->get();
        return view('riwayat_pemeriksaan', compact('pasiens'));
    }

    public function showPembayaran()
    {
        $pasiens = Pasien::where('status_pemeriksaan', 'Selesai')->paginate(request('entries', 10));
        return view('pembayaran', compact('pasiens'));
    }
    public function showPengambilanSampel()
    {
        $pasiens = Pasien::whereIn('status_pemeriksaan', ['Belum', 'Tolak', 'Validasi'])->paginate(request('entries', 10));
        return view('pengambilan_sampel', compact('pasiens'));
    }
    public function updateStatus($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->update(['status_pemeriksaan' => 'Selesai']);
        return redirect()->route('riwayat_pemeriksaan')->with('success', 'Status pemeriksaan berhasil diperbarui.');
    }
}
