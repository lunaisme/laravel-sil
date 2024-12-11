@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Daftar Pemeriksaan') }}</h1>

<div class="row justify-content-center px-3">
    <div class="col-12 card shadow mb-4">
        <div class="card-header py-3 row">
            <h6 class="col m-0 font-weight-bold text-primary">Data Pemeriksaan</h6>
            <a href="{{ route('patients.create') }}" class="col-2 btn btn-primary btn-sm">
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($patients->isEmpty())
                                <tr>
                                    <td colspan="9" class="text-center">Tidak ada data pasien.</td>
                                </tr>
                            @else
                        @foreach($patients as $index => $patient)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $patient->kode }}</td>
                                <td>{{ $patient->nama }}</td>
                                <td>{{ $patient->jenis_kelamin }}</td>
                                <td>{{ $patient->tgl_daftar }}</td>
                                <td>{{ $patient->jenis_pemeriksaan }}</td>
                                <td>{{ $patient->jaminan }}</td>
                                <td>{{ $patient->dokter }}</td>
                                <td>
                                    <a href="{{ route('patients.show', $patient->id) }}">Detail</a>
                                    <form action="{{ route('patients.accept', $patient->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit">Terima</button>
                                    </form>
                                    <form action="{{ route('patients.reject', $patient->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit">Tolak</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
