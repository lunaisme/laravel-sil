<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reagen;
use App\Models\Transaksi;

class StokController extends Controller
{
    // Menampilkan halaman stok reagen
    public function index()
    {
        $reagens = Reagen::with(['transaksiMasuk', 'transaksiKeluar'])->get();

        $dataReagens = $reagens->map(function ($reagen) {
            $totalMasuk = $reagen->transaksiMasuk->sum('jumlah');
            $totalKeluar = $reagen->transaksiKeluar->sum('jumlah');
            $stokAkhir = $reagen->stok_awal + $totalMasuk - $totalKeluar;

            return [
                'id' => $reagen->id,
                'kode' => $reagen->kode,
                'nama' => $reagen->nama,
                'stok_awal' => $reagen->stok_awal,
                'masuk' => $totalMasuk,
                'keluar' => $totalKeluar,
                'stok_akhir' => $stokAkhir,
            ];
        });

        return view('reagen.stok_reagen', compact('dataReagens'));
    }

    // Menampilkan form tambah transaksi
    public function create()
    {
        $reagens = Reagen::all();
        return view('reagen.create', compact('reagens'));
    }

    // Menyimpan transaksi (masuk/keluar)
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode' => 'nullable|string|max:50|unique:reagens,kode',
            'nama' => 'nullable|string|max:100',
            'stok_awal' => 'nullable|integer|min:0',
            'reagen_id' => 'nullable|exists:reagens,id',
            'tipe' => 'required|in:masuk,keluar',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string',
        ]);

        // Tambah data reagen baru jika data kode, nama, dan stok_awal diisi
        if ($request->filled(['kode', 'nama', 'stok_awal'])) {
            $reagen = Reagen::create([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'stok_awal' => $request->stok_awal,
            ]);
        } else {
            // Jika tidak menambah reagen baru, gunakan reagen_id yang dipilih
            $reagen = Reagen::find($request->reagen_id);
        }

        // Cek jika reagen tidak ditemukan (fallback jika tidak dipilih atau ditambah)
        if (!$reagen) {
            return back()->withErrors('Pilih atau tambahkan reagen baru.');
        }

        // Simpan transaksi
        Transaksi::create([
            'reagen_id' => $reagen->id,
            'tipe' => $request->tipe,
            'jumlah' => $request->jumlah,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('stok_reagen')->with('success', 'Data berhasil disimpan.');
    }

    public function recapMasuk()
    {
        $reagenMasuk = Transaksi::where('tipe', 'masuk')->with('reagen')->orderBy('created_at', 'desc')->get();

        return view('reagen.reagen_masuk', compact('reagenMasuk'));
    }

    public function recapKeluar()
    {
        $reagenKeluar = Transaksi::where('tipe', 'keluar')->with('reagen')->orderBy('created_at', 'desc')->get();

        return view('reagen.reagen_keluar', compact('reagenKeluar'));
    }
}
