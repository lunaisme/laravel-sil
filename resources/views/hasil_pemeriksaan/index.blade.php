@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">Input Hasil Pemeriksaan: {{ $pasien->kode }}</h1>

<div class="card shadow mb-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Input Hasil Pemeriksaan</h6>
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
        @if($pasien->hasilPemeriksaan->isNotEmpty())
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
            </tr>
            </thead>
            <tbody>
            @foreach($pasien->hasilPemeriksaan as $hasil)
                <tr>
                <td>{{ $hasil->parameter }}</td>
                <td>{{ $hasil->hasil }}</td>
                <td>{{ $hasil->satuan }}</td>
                <td>{{ $hasil->nilai_rujukan }}</td>
                <td>{{ $hasil->metode }}</td>
                <td>{{ $hasil->status }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>

<div class="card shadow mt-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Input Hasil Pemeriksaan</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('hasil_pemeriksaan.store', $pasien->id) }}" method="POST">
            @csrf
            <div id="hasil-pemeriksaan-form">
            <div class="form-row mb-3">
                <div class="col">
                <input type="text" name="hasil_pemeriksaan[0][parameter]" class="form-control" placeholder="Parameter" required>
                </div>
                <div class="col">
                <input type="text" name="hasil_pemeriksaan[0][hasil]" class="form-control" placeholder="Hasil" required>
                </div>
                <div class="col">
                <input type="text" name="hasil_pemeriksaan[0][satuan]" class="form-control" placeholder="Satuan" required>
                </div>
                <div class="col">
                <input type="text" name="hasil_pemeriksaan[0][nilai_rujukan]" class="form-control" placeholder="Nilai Rujukan" required>
                </div>
                <div class="col">
                <input type="text" name="hasil_pemeriksaan[0][metode]" class="form-control" placeholder="Metode">
                </div>
                <div class="col">
                <select name="hasil_pemeriksaan[0][status]" class="form-control" required>
                    <option value="Tinggi">Tinggi</option>
                    <option value="Normal">Normal</option>
                    <option value="Rendah">Rendah</option>
                </select>
                </div>
            </div>
            </div>
            <button type="button" id="add-row" class="btn btn-sm btn-secondary mb-3">Tambah Baris</button>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>
    </div>
</div>

<script>
    let rowIndex = 1;
    document.getElementById('add-row').addEventListener('click', () => {
        const form = document.getElementById('hasil-pemeriksaan-form');
        const newRow = `
            <div class="form-row mb-3">
                <div class="col">
                    <input type="text" name="hasil_pemeriksaan[${rowIndex}][parameter]" class="form-control" placeholder="Parameter" required>
                </div>
                <div class="col">
                    <input type="text" name="hasil_pemeriksaan[${rowIndex}][hasil]" class="form-control" placeholder="Hasil" required>
                </div>
                <div class="col">
                    <input type="text" name="hasil_pemeriksaan[${rowIndex}][satuan]" class="form-control" placeholder="Satuan" required>
                </div>
                <div class="col">
                    <input type="text" name="hasil_pemeriksaan[${rowIndex}][nilai_rujukan]" class="form-control" placeholder="Nilai Rujukan" required>
                </div>
                <div class="col">
                    <input type="text" name="hasil_pemeriksaan[${rowIndex}][metode]" class="form-control" placeholder="Metode">
                </div>
                <div class="col">
                    <select name="hasil_pemeriksaan[${rowIndex}][status]" class="form-control" required>
                        <option value="Normal">Normal</option>
                        <option value="Abnormal">Abnormal</option>
                    </select>
                </div>
            </div>
        `;
        form.insertAdjacentHTML('beforeend', newRow);
        rowIndex++;
    });
</script>
@endsection
