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
        'status' => 'Terima',
        'edta' => 'Yes',
        'citrus' => 'No',
        'lainnya' => 'N/A'
    ],
    (object)[
        'no' => 2,
        'tgl' => '2023-01-02',
        'no_lab' => 'LAB002',
        'grup_tes' => 'Urine',
        'nama_pasien' => 'Jane Doe',
        'dokter' => 'Dr. Brown',
        'status' => 'Tolak',
        'edta' => 'No',
        'citrus' => 'Yes',
        'lainnya' => 'N/A'
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
                            <th rowspan="2">No</th>
                            <th rowspan="2">Tanggal</th>
                            <th rowspan="2">No Lab</th>
                            <th rowspan="2">Grup Tes</th>
                            <th rowspan="2">Nama Pasien</th>
                            <th rowspan="2">Dokter</th>
                            <th colspan="5" class="text-center">Jenis Sample</th>
                            <th rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                            <th>EDTA</th>
                            <th>Citrus</th>
                            <th>Serum</th>
                            <th>Urine</th>
                            <th>Lainnya</th>
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
                                <td>{{ $pemeriksaan->edta }}</td>
                                <td>{{ $pemeriksaan->citrus }}</td>
                                <td>{{ $pemeriksaan->lainnya }}</td>
                                <td>{{ $pemeriksaan->lainnya }}</td>
                                <td>{{ $pemeriksaan->lainnya }}</td>
                                <td>
                                    <span class="badge {{ $pemeriksaan->status == 'Terima' ? 'badge-success' : 'badge-danger' }}">
                                        {{ $pemeriksaan->status }}
                                    </span>
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


