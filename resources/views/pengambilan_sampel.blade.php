@extends('layouts.admin')


@section('main-content')
    <!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Pengambilan Sampel') }}</h1>

<div class="row justify-content-center px-3">
    <div class="col-12 card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengambilan Sampel</h6>
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
                        @foreach($pasiens as $pemeriksaan)
                            <tr>
                                <td>{{ $pemeriksaan->kode }}</td>
                                <td>{{ $pemeriksaan->tgl_pemeriksaan }}</td>
                                <td>{{ $pemeriksaan->no_lab }}</td>
                                <td>{{ $pemeriksaan->group_test }}</td>
                                <td>{{ $pemeriksaan->nama_pasien }}</td>
                                <td>{{ $pemeriksaan->dokter }}</td>                            
                                <td>{{ $pemeriksaan->jenis_sample == 'EDTA' ? '✔' : '' }}</td>
                                <td>{{ $pemeriksaan->jenis_sample == 'Citrus' ? '✔' : '' }}</td>
                                <td>{{ $pemeriksaan->jenis_sample == 'Serum' ? '✔' : '' }}</td>
                                <td>{{ $pemeriksaan->jenis_sample == 'Urine' ? '✔' : '' }}</td>
                                <td>{{ $pemeriksaan->jenis_sample == 'Lainnya' ? '✔' : '' }}</td>
                                <td>
                                    <a href="{{ route('daftar_pemeriksaan.edit', $pemeriksaan->id) }}" class="btn 
                                        @if($pemeriksaan->status_pemeriksaan == 'Tolak') btn-danger 
                                        @elseif($pemeriksaan->status_pemeriksaan == 'Validasi') btn-success 
                                        @else btn-secondary 
                                        @endif">
                                        {{ $pemeriksaan->status_pemeriksaan }}
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


