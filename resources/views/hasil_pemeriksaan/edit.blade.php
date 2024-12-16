@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">Input Hasil Pemeriksaan: {{ $pasien->kode }}</h1>

<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Input Hasil Pemeriksaan</h6>
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
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Pasien</h6>
                <p><strong>No RM:</strong> {{ $pasien->no_rm }}</p>
                <p><strong>Nama Pasien:</strong> {{ $pasien->nama_pasien }}</p>
                <p><strong>Tanggal Lahir:</strong> {{ $pasien->tgl_lahir }}</p>
            </div>
            <div class="col-md-6">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Pemeriksaan</h6>
                <p><strong>No Lab:</strong> {{ $pasien->no_lab }}</p>
                <p><strong>Tanggal Pemeriksaan:</strong> {{ $pasien->tgl_pemeriksaan }}</p>
                <p><strong>Dokter:</strong> {{ $pasien->dokter }}</p>
            </div>
        </div>
        <h6 class="m-0 font-weight-bold text-primary mt-4">Hasil Pemeriksaan</h6>
        <table class="table table-bordered mt-2">
            <thead>
                <tr>
                    <th>Parameter</th>
                    <th>Hasil</th>
                    <th>Satuan</th>
                    <th>Nilai Rujukan</th>
                    <th>Metode</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($pasien->hasilPemeriksaan->isEmpty())
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data</td>
                </tr>
                @else
                @foreach($pasien->hasilPemeriksaan as $hasil)
                <tr>
                    <form action="{{ route('hasil_pemeriksaan.update', $hasil->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td><input type="text" name="parameter" value="{{ $hasil->parameter }}" class="form-control"></td>
                        <td><input type="text" name="hasil" value="{{ $hasil->hasil }}" class="form-control"></td>
                        <td><input type="text" name="satuan" value="{{ $hasil->satuan }}" class="form-control"></td>
                        <td><input type="text" name="nilai_rujukan" value="{{ $hasil->nilai_rujukan }}" class="form-control"></td>
                        <td><input type="text" name="metode" value="{{ $hasil->metode }}" class="form-control"></td>
                        <td>
                            <select name="status" class="form-control">
                                <option value="Tinggi" {{ $hasil->status == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                                <option value="Normal" {{ $hasil->status == 'Normal' ? 'selected' : '' }}>Normal</option>
                                <option value="Rendah" {{ $hasil->status == 'Rendah' ? 'selected' : '' }}>Rendah</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    </form>
                    <form action="{{ route('hasil_pemeriksaan.destroy', $hasil->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
