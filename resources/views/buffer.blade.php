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
@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Tambah Reagen atau Transaksi') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">

        <!-- Tambah Reagen Baru -->
        <div class="col-lg-6 order-lg-1">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Reagen Baru (Opsional)</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('stok_reagen.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="kode" name="kode" placeholder="Opsional jika memilih reagen yang ada">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Opsional jika memilih reagen yang ada">
                        </div>
                        <div class="form-group">
                            <label for="stok_awal">Stok Awal</label>
                            <input type="number" class="form-control" id="stok_awal" name="stok_awal" placeholder="Opsional jika memilih reagen yang ada">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Transaksi Reagen -->
        <div class="col-lg-6 order-lg-2">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Transaksi Reagen</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('stok_reagen.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="reagen_id">Pilih Reagen</label>
                            <select name="reagen_id" id="reagen_id" class="form-select" onchange="toggleReagenFields(this)">
                                <option value="" selected disabled>Pilih Reagen</option>
                                @foreach ($reagens as $reagen)
                                    <option value="{{ $reagen->id }}">{{ $reagen->nama }} (Kode: {{ $reagen->kode }})</option>
                                @endforeach
                            </select>
                        </div>
                        <script>
                            function toggleReagenFields(select) {
                                const isDisabled = select.value === "";
                                document.getElementById('kode').disabled = !isDisabled;
                                document.getElementById('nama').disabled = !isDisabled;
                                document.getElementById('stok_awal').disabled = !isDisabled;
                            }
                        </script>
                        <div class="form-group">
                            <label for="tipe">Tipe Transaksi</label>
                            <select name="tipe" id="tipe" class="form-select" required>
                                <option value="" selected disabled>Pilih Tipe</option>
                                <option value="masuk">Masuk</option>
                                <option value="keluar">Keluar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
