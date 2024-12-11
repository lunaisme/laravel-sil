@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Daftar Pemeriksaan / Detail') }}</h1>
<div class="row justify-content-center px-3">

    <div class="col-8 card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pemeriksaan</h6>
        </div>
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th>No</th>
                    <td>{{ $pasien->no }}</td>
                </tr>
                <tr>
                    <th>No RM</th>
                    <td>{{ $pasien->no_rm }}</td>
                </tr>
                <tr>
                    <th>Nama Pasien</th>
                    <td>{{ $pasien->nama_pasien }}</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>{{ $pasien->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <th>Tanggal Pemeriksaan</th>
                    <td>{{ $pasien->tanggal_pemeriksaan }}</td>
                </tr>
                <tr>
                    <th>Jaminan</th>
                    <td>{{ $pasien->jaminan }}</td>
                </tr>
                <tr>
                    <th>Jenis Pemeriksaan</th>
                    <td>{{ $pasien->jenis_pemeriksaan }}</td>
                </tr>
                <tr>
                    <th>Dokter</th>
                    <td>{{ $pasien->dokter }}</td>
                </tr>
                <tr>
                    <th>Pembayaran</th>
                    <td class="{{ $pasien->pembayaran == 'BELUM LUNAS' ? 'text-danger' : '' }}">{{ $pasien->pembayaran }}</td>
                </tr>
                <tr>
                    <th>Status Pemeriksaan</th>
                    <td class="{{ $pasien->status_pemeriksaan == 'BELUM DIPROSES' ? 'text-danger' : '' }}">{{ $pasien->status_pemeriksaan }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
