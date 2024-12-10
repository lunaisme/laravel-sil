@extends('layouts.admin')

@php
$kalibrasiAlats = collect([
    (object)[
        'no' => 1,
        'kode_alat' => 'A001',
        'nama_alat' => 'Alat Ukur 1',
        'tgl_kalibrasi' => '2023-01-01',
        'status' => 'Kurang Optimal',
        'tgl_kalibrasi_ulang' => '2024-01-01'
    ],
    (object)[
        'no' => 1,
        'kode_alat' => 'A001',
        'nama_alat' => 'Mikroskop',
        'tgl_kalibrasi' => '2023-01-01',
        'status' => 'Sedang Kalibrasi',
        'tgl_kalibrasi_ulang' => '2024-01-01'
    ],
    (object)[
        'no' => 2,
        'kode_alat' => 'A002',
        'nama_alat' => 'Alat Ukur 2',
        'tgl_kalibrasi' => '2023-02-01',
        'status' => 'Baik',
        'tgl_kalibrasi_ulang' => '2024-02-01'
    ]
]);
@endphp

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Daftar Kalibrasi Alat') }}</h1>

    <div class="row justify-content-center px-3">

    <div class="col-12 card shadow mb-4">
        <div class="card-header py-3 row">
            <h6 class="col m-0 font-weight-bold text-primary">Data Kalibrasi Alat</h6>
            <a href="" class="col-2 btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Alat</th>
                            <th>Nama Alat</th>
                            <th>Tanggal Kalibrasi</th>
                            <th>Status</th>
                            <th>Tanggal Kalibrasi Ulang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kalibrasiAlats as $alat)
                            <tr>
                                <td>{{ $alat->no }}</td>
                                <td>{{ $alat->kode_alat }}</td>
                                <td>{{ $alat->nama_alat }}</td>
                                <td>{{ $alat->tgl_kalibrasi }}</td>
                                <td>
                                    @if($alat->status == 'Baik')
                                        <span class="badge badge-success">{{ $alat->status }}</span>
                                    @elseif($alat->status == 'Kurang Optimal')
                                        <span class="badge badge-danger">{{ $alat->status }}</span>
                                    @elseif($alat->status == 'Menunggu')
                                        <span class="badge badge-warning">{{ $alat->status }}</span>
                                    @elseif($alat->status == 'Sedang Kalibrasi')
                                        <span class="badge badge-info">{{ $alat->status }}</span>
                                    @else
                                        <span class="badge badge-dark">{{ $alat->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $alat->tgl_kalibrasi_ulang }}</td>
                                <td>
                                    <a href="" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
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