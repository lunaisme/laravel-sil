@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Edit Pemeriksaan') }}</h1>

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
                            <input type="text" class="form-control" id="kode" name="kode" value="{{ $daftar_pemeriksaan->kode }}" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki" {{ $daftar_pemeriksaan->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $daftar_pemeriksaan->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_daftar">Tanggal Daftar</label>
                            <input type="date" class="form-control" id="tgl_daftar" name="tgl_daftar" value="{{ $daftar_pemeriksaan->tgl_daftar }}" required>
                        </div>
                        <div class="form-group">
                            <label for="group_test">Group Test</label>
                            <select class="form-control" id="group_test" name="group_test" required>
                                <option value="Hematologi" {{ $daftar_pemeriksaan->group_test == 'Hematologi' ? 'selected' : '' }}>Hematologi</option>
                                <option value="Kimia Darah" {{ $daftar_pemeriksaan->group_test == 'Kimia Darah' ? 'selected' : '' }}>Kimia Darah</option>
                                <option value="Urinalisis" {{ $daftar_pemeriksaan->group_test == 'Urinalisis' ? 'selected' : '' }}>Urinalisis</option>
                                <option value="Imuneserologi" {{ $daftar_pemeriksaan->group_test == 'Imuneserologi' ? 'selected' : '' }}>Imuneserologi</option>
                                <option value="Mikrobiologi" {{ $daftar_pemeriksaan->group_test == 'Mikrobiologi' ? 'selected' : '' }}>Mikrobiologi</option>
                                <option value="Lain-lain" {{ $daftar_pemeriksaan->group_test == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis_pemeriksaan">Jenis Pemeriksaan</label>
                            <select class="form-control" id="jenis_pemeriksaan" name="jenis_pemeriksaan" required>
                                <option value="EDTA" {{ $daftar_pemeriksaan->jenis_pemeriksaan == 'EDTA' ? 'selected' : '' }}>EDTA</option>
                                <option value="Serum" {{ $daftar_pemeriksaan->jenis_pemeriksaan == 'Serum' ? 'selected' : '' }}>Serum</option>
                                <option value="Citrat" {{ $daftar_pemeriksaan->jenis_pemeriksaan == 'Citrat' ? 'selected' : '' }}>Citrat</option>
                                <option value="Urine" {{ $daftar_pemeriksaan->jenis_pemeriksaan == 'Urine' ? 'selected' : '' }}>Urine</option>
                                <option value="Lainnya" {{ $daftar_pemeriksaan->jenis_pemeriksaan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jaminan">Jaminan</label>
                            <input type="text" class="form-control" id="jaminan" name="jaminan" value="{{ $daftar_pemeriksaan->jaminan }}" required>
                        </div>
                        <div class="form-group">
                            <label for="dokter">Dokter</label>
                            <input type="text" class="form-control" id="dokter" name="dokter" value="{{ $daftar_pemeriksaan->dokter }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_rm">No RM</label>
                            <input type="text" class="form-control" id="no_rm" name="no_rm" value="{{ $daftar_pemeriksaan->no_rm }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_pasien">Nama Pasien</label>
                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" value="{{ $daftar_pemeriksaan->nama_pasien }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                            <input type="date" class="form-control" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" value="{{ $daftar_pemeriksaan->tanggal_pemeriksaan }}" required>
                        </div>
                        <div class="form-group">
                            <label for="pembayaran">Pembayaran</label>
                            <input type="text" class="form-control" id="pembayaran" name="pembayaran" value="{{ $daftar_pemeriksaan->pembayaran }}" required>
                        </div>
                        <div class="form-group">
                            <label for="status_pemeriksaan">Status Pemeriksaan</label>
                            <input type="text" class="form-control" id="status_pemeriksaan" name="status_pemeriksaan" value="{{ $daftar_pemeriksaan->status_pemeriksaan }}" required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection