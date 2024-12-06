@extends('layouts.admin')

@php
$pemeriksaans = collect([
    (object)[
        'id' => 1,
        'kode' => 'P001',
        'nama' => 'John Doe',
        'jenis_kelamin' => 'Laki-laki',
        'tgl_daftar' => '2023-01-01',
        'jenis_pemeriksaan' => 'Umum',
        'jaminan' => 'BPJS',
        'dokter' => 'Dr. Smith'
    ],
    (object)[
        'id' => 2,
        'kode' => 'P002',
        'nama' => 'Jane Doe',
        'jenis_kelamin' => 'Perempuan',
        'tgl_daftar' => '2023-01-02',
        'jenis_pemeriksaan' => 'Gigi',
        'jaminan' => 'Pribadi',
        'dokter' => 'Dr. Brown'
    ]
]);
@endphp

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Daftar Pemeriksaan') }}</h1>

    <div class="row justify-content-center px-3">

    <div class="col-12 card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pemeriksaan</h6>
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
                        @foreach($pemeriksaans as $pemeriksaan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pemeriksaan->kode }}</td>
                                <td>{{ $pemeriksaan->nama }}</td>
                                <td>{{ $pemeriksaan->jenis_kelamin }}</td>
                                <td>{{ $pemeriksaan->tgl_daftar }}</td>
                                <td>{{ $pemeriksaan->jenis_pemeriksaan }}</td>
                                <td>{{ $pemeriksaan->jaminan }}</td>
                                <td>{{ $pemeriksaan->dokter }}</td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $pemeriksaans->links() }} --}}
            </div>

            <div class="form-group mt-3">
                <label for="entries">Show entries:</label>
                <select id="entries" name="entries" class="form-control" onchange="location = this.value;">
                    <option value="?entries=10" {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
                    <option value="?entries=25" {{ request('entries') == 25 ? 'selected' : '' }}>25</option>
                    <option value="?entries=50" {{ request('entries') == 50 ? 'selected' : '' }}>50</option>
                    <option value="?entries=100" {{ request('entries') == 100 ? 'selected' : '' }}>100</option>
                </select>
            </div>
        </div>
    </div>

    </div>

@endsection
