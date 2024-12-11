@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Tambah Pemeriksaan') }}</h1>

<div class="row justify-content-center px-3">
    <div class="col-12 card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pemeriksaan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('daftar_pemeriksaan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" class="form-control" id="kode" name="kode" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl_daftar">Tanggal Daftar</label>
                    <input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar" required>
                </div>
                <div class="form-group">
                    <label for="jenis_pemeriksaan">Jenis Pemeriksaan</label>
                    <input type="text" class="form-control" id="jenis_pemeriksaan" name="jenis_pemeriksaan" required>
                </div>
                <div class="form-group">
                    <label for="jaminan">Jaminan</label>
                    <input type="text" class="form-control" id="jaminan" name="jaminan" required>
                </div>
                <div class="form-group">
                    <label for="dokter">Dokter</label>
                    <input type="text" class="form-control" id="dokter" name="dokter" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection