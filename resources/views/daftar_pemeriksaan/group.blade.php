@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Daftar Pemeriksaan - ') }}{{ $group }}</h1>

<div class="row justify-content-center px-3">
    <div class="col-12 card shadow mb-4">
        <div class="card-header py-3 row">
            <h6 class="col m-0 font-weight-bold text-primary">Data Pemeriksaan</h6>
            <a href="{{ route('daftar_pemeriksaan.create') }}" class="col-2 btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tgl Daftar</th>
                            <th>Jenis Pemeriksaan</th>
                            <th>Jaminan</th>
                            <th>Dokter</th>
                            <th>No RM</th>
                            <th>Tgl Pemeriksaan</th>
                            <th>Pembayaran</th>
                            <th>Status Pemeriksaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pasiens as $index => $pasien)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $pasien->kode }}</td>
                                <td>{{ $pasien->nama_pasien }}</td>
                                <td>{{ $pasien->jenis_kelamin }}</td>
                                <td>{{ $pasien->tgl_daftar }}</td>
                                <td>{{ $pasien->jenis_pemeriksaan }}</td>
                                <td>{{ $pasien->jaminan }}</td>
                                <td>{{ $pasien->dokter }}</td>
                                <td>{{ $pasien->no_rm }}</td>
                                <td>{{ $pasien->tanggal_pemeriksaan }}</td>
                                <td>{{ $pasien->pembayaran }}</td>
                                <td>{{ $pasien->status_pemeriksaan }}</td>
                                <td>
                                    <a href="{{ route('daftar_pemeriksaan.edit', $pasien->id) }}" class="btn btn-info btn-sm">Detail</a>
                                    <a href="{{ route('hasil_pemeriksaan.index', $pasien->id) }}" class="btn btn-warning btn-sm">Hasil</a>
                                    <form action="{{ route('daftar_pemeriksaan.destroy', $pasien->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
