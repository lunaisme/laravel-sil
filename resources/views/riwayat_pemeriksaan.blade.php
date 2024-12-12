@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Riwayat Pemeriksaan') }}</h1>
    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                        @foreach($pasiens as $pasien)
                            <tr>
                                <td>{{ $pasien->kode }}</td>
                                <td>{{ $pasien->tgl_pemeriksaan }}</td>
                                <td>{{ $pasien->no_lab }}</td>
                                <td>{{ $pasien->group_test }}</td>
                                <td>{{ $pasien->nama_pasien }}</td>
                                <td>{{ $pasien->dokter }}</td>
                                <td>
                                    <span class="badge {{ $pasien->status_pemeriksaan == 'Validasi' ? 'badge-danger' : 'badge-success' }}">
                                        {{ $pasien->status_pemeriksaan }}
                                    </span>
                                </td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm" ><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('updateStatus', $pasien->id) }}" class="btn btn-success btn-sm"><i class="fas fa-check"></i></a>
                                    <a href="{{ route('hasil_pemeriksaan.print', $pasien->id) }}" class="fas fa-print" target="_blank"></a>
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
