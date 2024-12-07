@extends('layouts.admin')

@php
// Simulasi data pemeriksaan
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
    ],
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
    ],
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
    ],
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
    ],
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
    ],
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
    ],
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
    ],
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
    ],
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
    ],
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
    ],
    // Tambahkan lebih banyak data jika diperlukan
]);

// Pagination logic
$entries = request('entries', 10); // Jumlah entri default
$currentPage = request('page', 1); // Halaman default
$totalData = $pemeriksaans->count(); // Total data
$paginatedPemeriksaans = $pemeriksaans->forPage($currentPage, $entries);
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
                        @foreach($paginatedPemeriksaans as $index => $pemeriksaan)
                            <tr>
                                <td>{{ ($currentPage - 1) * $entries + $index + 1 }}</td>
                                <td>{{ $pemeriksaan->kode }}</td>
                                <td>{{ $pemeriksaan->nama }}</td>
                                <td>{{ $pemeriksaan->jenis_kelamin }}</td>
                                <td>{{ $pemeriksaan->tgl_daftar }}</td>
                                <td>{{ $pemeriksaan->jenis_pemeriksaan }}</td>
                                <td>{{ $pemeriksaan->jaminan }}</td>
                                <td>{{ $pemeriksaan->dokter }}</td>
                                <td>
                                    <a href="/detail_pemeriksaan" class="btn btn-info btn-sm">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row align-items-center mt-3">
                <!-- Show entries -->
                <div class="form-group col-auto">
                    <label for="entries" class="mr-2">Show entries:</label>
                    <select id="entries" name="entries" class="form-control d-inline-block w-auto" onchange="location = this.value;">
                        <option value="?entries=10" {{ request('entries') == 10 ? 'selected' : '' }}>10</option>
                        <option value="?entries=25" {{ request('entries') == 25 ? 'selected' : '' }}>25</option>
                        <option value="?entries=50" {{ request('entries') == 50 ? 'selected' : '' }}>50</option>
                        <option value="?entries=100" {{ request('entries') == 100 ? 'selected' : '' }}>100</option>
                    </select>
                </div>
            
                <!-- Pagination -->
                <div class="col-auto ml-auto">
                    <nav aria-label="Pagination">
                        <ul class="pagination mb-0">
                            @if ($currentPage > 1)
                                <li class="page-item">
                                    <a class="page-link" href="?entries={{ $entries }}&page={{ $currentPage - 1 }}">Previous</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">Previous</a>
                                </li>
                            @endif
            
                            @for ($page = 1; $page <= ceil($totalData / $entries); $page++)
                                <li class="page-item {{ $page == $currentPage ? 'active' : '' }}">
                                    <a class="page-link" href="?entries={{ $entries }}&page={{ $page }}">{{ $page }}</a>
                                </li>
                            @endfor
            
                            @if ($currentPage < ceil($totalData / $entries))
                                <li class="page-item">
                                    <a class="page-link" href="?entries={{ $entries }}&page={{ $currentPage + 1 }}">Next</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
            



        </div>
    </div>
</div>
@endsection
