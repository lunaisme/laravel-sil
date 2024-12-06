@extends('layouts.admin')

@php
$pemeriksaans = collect([
    (object)[
        'no' => 1,
        'tgl' => '2023-01-01',
        'no_lab' => 'LAB001',
        'grup_tes' => 'Darah',
        'nama_pasien' => 'John Doe',
        'dokter' => 'Dr. Smith',
        'status' => 'Selesai'
    ],
    (object)[
        'no' => 2,
        'tgl' => '2023-01-02',
        'no_lab' => 'LAB002',
        'grup_tes' => 'Urine',
        'nama_pasien' => 'Jane Doe',
        'dokter' => 'Dr. Brown',
        'status' => 'Belum Validasi'
    ]
]);
@endphp

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Riwayat Pemeriksaan') }}</h1>

    <div class="row justify-content-center px-3">

    <div class="col-12 card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Riwayat Pemeriksaan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>No Lab</th>
                            <th>Grup Tes</th>
                            <th>Nama Pasien</th>
                            <th>Dokter</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pemeriksaans as $pemeriksaan)
                            <tr>
                                <td>{{ $pemeriksaan->no }}</td>
                                <td>{{ $pemeriksaan->tgl }}</td>
                                <td>{{ $pemeriksaan->no_lab }}</td>
                                <td>{{ $pemeriksaan->grup_tes }}</td>
                                <td>{{ $pemeriksaan->nama_pasien }}</td>
                                <td>{{ $pemeriksaan->dokter }}</td>
                                <td>
                                    <span class="badge {{ $pemeriksaan->status == 'Selesai' ? 'badge-success' : 'badge-danger' }}">
                                        {{ $pemeriksaan->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                    <a href="" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
                                    <a href="" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a>
                                    <a href="" class="btn btn-warning btn-sm"><i class="fas fa-paper-plane"></i></a>
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