@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Daftar Kalibrasi Alat') }}</h1>

    <div class="row justify-content-center px-3">

    <div class="col-12 card shadow mb-4">
        <div class="card-header py-3 row">
            <h6 class="col m-0 font-weight-bold text-primary">Data Kalibrasi Alat</h6>
            <a href="{{ route('kalibrasi.create') }}" class="col-2 btn btn-primary btn-sm">
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
                        @if($kalibrasi->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data kalibrasi.</td>
                        </tr>
                    @else
                        @foreach($kalibrasi as $alat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $alat->kode_alat }}</td>
                                <td>{{ $alat->nama_alat }}</td>
                                <td>{{ $alat->tanggal_kalibrasi }}</td>
                                <td>
                                    @if($alat->status == 'baik')
                                        <span class="badge badge-success">{{ $alat->status }}</span>
                                    @elseif($alat->status == 'kurang optimal')
                                        <span class="badge badge-danger">{{ $alat->status }}</span>
                                    @elseif($alat->status == 'menunggu proses')
                                        <span class="badge badge-warning">{{ $alat->status }}</span>
                                    @elseif($alat->status == 'sedang proses')
                                        <span class="badge badge-info">{{ $alat->status }}</span>
                                    @else
                                        <span class="badge badge-dark">{{ $alat->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $alat->tanggal_update }}</td>
                                <td>
                                    <a href="{{ route('kalibrasi.edit', $alat->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
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