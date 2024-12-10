@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Tambah Kalibrasi') }}</h1>

    <div class="row">
        <div class="col-lg-8 order-lg-1">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Kalibrasi</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('kalibrasi.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Kode Alat</label>
                            <input type="text" name="kode_alat" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Alat</label>
                            <input type="text" name="nama_alat" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kalibrasi</label>
                            <input type="date" name="tanggal_kalibrasi" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="kurang optimal">Kurang Optimal</option>
                                <option value="menunggu proses">Menunggu Proses</option>
                                <option value="sedang proses">Sedang Proses</option>
                                <option value="baik">Baik</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection