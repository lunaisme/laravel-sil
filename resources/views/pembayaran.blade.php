@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Data pembayaran') }}</h1>

    <div class="row justify-content-center px-3">

    <div class="col-12 card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Tgl Daftar</th>
                            <th>Total Harga</th>
                            <th>Jaminan</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pasiens as $pemeriksaan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pemeriksaan->kode }}</td>
                                <td>{{ $pemeriksaan->nama_pasien }}</td>
                                <td>{{ $pemeriksaan->tgl_lahir }}</td>
                                <td>{{ number_format($pemeriksaan->total_harga, 0, ',', '.') }}</td>
                                <td>{{ $pemeriksaan->jaminan }}</td>
                                <td>
                                    <span class="badge {{ $pemeriksaan->pembayaran == 'Lunas' ? 'badge-success' : 'badge-danger' }}">
                                        {{ $pemeriksaan->pembayaran }}
                                    </span>
                                </td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm"><i class="fas fa-print"></i></a>
                                    <a href="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
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
