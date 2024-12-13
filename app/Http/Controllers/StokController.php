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
        if ($request->has('kode') && $request->has('nama') && $request->has('stok_awal')) {
            // Handle new reagent creation
            $reagen = new Reagen();
            $reagen->kode = $request->kode;
            $reagen->nama = $request->nama;
            $reagen->stok_awal = $request->stok_awal;
            $reagen->save();
        } else {
            // Handle reagent transaction
            $transaction = new Transaksi();
            $transaction->reagen_id = $request->reagen_id;
            $transaction->tipe = $request->tipe;
            $transaction->jumlah = $request->jumlah;
            $transaction->keterangan = $request->keterangan;
            $transaction->save();
        }

        return redirect()->back()->with('success', 'Data berhasil disimpan');
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
