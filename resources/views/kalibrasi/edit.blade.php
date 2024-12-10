@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Kalibrasi') }}</h1>

    <div class="row">
        <div class="col-lg-8 order-lg-1">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Kalibrasi</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('kalibrasi.update', $kalibrasi) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Kode Alat</label>
                            <input type="text" name="kode_alat" class="form-control" value="{{ $kalibrasi->kode_alat }}" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Alat</label>
                            <input type="text" name="nama_alat" class="form-control" value="{{ $kalibrasi->nama_alat }}" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kalibrasi</label>
                            <input type="date" name="tanggal_kalibrasi" class="form-control" value="{{ $kalibrasi->tanggal_kalibrasi }}" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="kurang optimal" {{ $kalibrasi->status == 'kurang optimal' ? 'selected' : '' }}>Kurang Optimal</option>
                                <option value="menunggu proses" {{ $kalibrasi->status == 'menunggu proses' ? 'selected' : '' }}>Menunggu Proses</option>
                                <option value="sedang proses" {{ $kalibrasi->status == 'sedang proses' ? 'selected' : '' }}>Sedang Proses</option>
                                <option value="baik" {{ $kalibrasi->status == 'baik' ? 'selected' : '' }}>Baik</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Catatan</label>
                            <textarea name="catatan" class="form-control" required>{{ $kalibrasi->catatan }}</textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('kalibrasi.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection