@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Daftar Pemeriksaan') }}</h1>

<div class="row justify-content-center px-3">
    <div class="col-12 card shadow mb-4">
        <div class="card-header py-3 row">
            <h6 class="col m-0 font-weight-bold text-primary">Data Pemeriksaan</h6>
            <a href="{{ route('daftar_pemeriksaan.create') }}" class="col-2 btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col text-right">
                    <!-- Topbar Search -->
                    <form class="form-inline d-inline-block" method="GET" action="{{ route('daftar_pemeriksaan.index') }}">
                        <div class="input-group">
                            <input type="text" name="query" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" value="{{ request('query') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pasiens as $pasien)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pasien->kode }}</td>
                                <td>{{ $pasien->nama_pasien }}</td>
                                <td>{{ $pasien->jenis_kelamin }}</td>
                                <td>{{ $pasien->tgl_daftar }}</td>
                                <td>{{ $pasien->jenis_pemeriksaan }}</td>
                                <td>{{ $pasien->jaminan }}</td>
                                <td>{{ $pasien->dokter }}</td>
                                <td>
                                    <a href="{{ route('daftar_pemeriksaan.edit', $pasien->id) }}" class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if(request('query'))
            <button onclick="window.history.back();" class="btn btn-secondary mt-3">Back</button>
        @endif
        </div>
    </div>
</div>
@endsection
