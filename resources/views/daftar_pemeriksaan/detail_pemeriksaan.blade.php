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
                    <td>1</td>
                </tr>
                <tr>
                    <th>No RM</th>
                    <td>4222014</td>
                </tr>
                <tr>
                    <th>Nama Pasien</th>
                    <td>Min Yoongi</td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>Laki-laki</td>
                </tr>
                <tr>
                    <th>Tanggal Pemeriksaan</th>
                    <td>11-10-2024</td>
                </tr>
                <tr>
                    <th>Jaminan</th>
                    <td>UMUM</td>
                </tr>
                <tr>
                    <th>Jenis Pemeriksaan</th>
                    <td>Gula Darah Sewaktu</td>
                </tr>
                <tr>
                    <th>Dokter</th>
                    <td>Dr Tina</td>
                </tr>
                <tr>
                    <th>Pembayaran</th>
                    <td class="text-danger">BELUM LUNAS</td>
                </tr>
                <tr>
                    <th>Status Pemeriksaan</th>
                    <td class="text-danger">BELUM DIPROSES</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
