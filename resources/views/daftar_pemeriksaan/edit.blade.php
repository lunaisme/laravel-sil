@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Edit Pemeriksaan') }}</h1>
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
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Pemeriksaan</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('daftar_pemeriksaan.update', $daftar_pemeriksaan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label for="kode">Kode</label>
                <p>{{ $daftar_pemeriksaan->kode }}</p>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <p>{{ $daftar_pemeriksaan->jenis_kelamin }}</p>
            </div>
            <div class="form-group">
                <label for="group_test">Group Test</label>
                <p>{{ $daftar_pemeriksaan->group_test }}</p>
            </div>
            <div class="form-group">
                <label for="jenis_pemeriksaan">Jenis Pemeriksaan</label>
                <p>{{ $daftar_pemeriksaan->jenis_pemeriksaan }}</p>
            </div>
            <div class="form-group">
                <label for="jaminan">Jaminan</label>
                <p>{{ $daftar_pemeriksaan->jaminan }}</p>
            </div>
            <div class="form-group">
                <label for="dokter">Dokter</label>
                <p>{{ $daftar_pemeriksaan->dokter }}</p>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                <label for="no_rm">No RM</label>
                <p>{{ $daftar_pemeriksaan->no_rm }}</p>
            </div>
            <div class="form-group">
                <label for="nama_pasien">Nama Pasien</label>
                <p>{{ $daftar_pemeriksaan->nama_pasien }}</p>
            </div>
            <div class="form-group">
                <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                <p>{{ $daftar_pemeriksaan->tgl_pemeriksaan }}</p>
            </div>
            <div class="form-group">
                <label for="pembayaran">Pembayaran</label>
                <p>{{ $daftar_pemeriksaan->pembayaran }}</p>
            </div>
            <div class="form-group">
                <label for="status_pemeriksaan">Status Pemeriksaan</label>
                <select class="form-control" id="status_pemeriksaan" name="status_pemeriksaan" required>
                <option value="Validasi" {{ $daftar_pemeriksaan->status_pemeriksaan == 'Terima' ? 'selected' : '' }}>Terima</option>
                <option value="Tolak" {{ $daftar_pemeriksaan->status_pemeriksaan == 'Tolak' ? 'selected' : '' }}>Tolak</option>
                </select>
            </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    </div>
</div>
@endsection
