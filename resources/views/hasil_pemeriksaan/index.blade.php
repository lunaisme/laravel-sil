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
                </tr>
            </thead>
            <tbody>
                @if ($pasien->hasilPemeriksaan->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data</td>
                </tr>
                @else
                @foreach($pasien->hasilPemeriksaan as $hasil)
                <tr>
                    <td>{{ $hasil->parameter }}</td>
                    <td>{{ $hasil->hasil }}</td>
                    <td>{{ $hasil->satuan }}</td>
                    <td>{{ $hasil->nilai_rujukan }}</td>
                    <td>{{ $hasil->metode }}</td>
                    <td>
                        @if($hasil->status == 'Tinggi')
                            <span class="badge badge-warning">{{ $hasil->status }}</span>
                        @elseif($hasil->status == 'Normal')
                            <span class="badge badge-success">{{ $hasil->status }}</span>
                        @elseif($hasil->status == 'Rendah')
                            <span class="badge badge-warning">{{ $hasil->status }}</span>
                        @else
                            {{ $hasil->status }}
                        @endif
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<div class="card shadow mt-4">
    <div class="card-header">
        <h6 class="m-0 font-weight-bold text-primary">Input Hasil Pemeriksaan</h6>
    </div>
    <div class="card-body">
        <button type="button" id="add-row" class="btn btn-sm btn-secondary mb-3">Tambah Baris</button>
        <form action="{{ route('hasil_pemeriksaan.store', $pasien->id) }}" method="POST">
            @csrf
            <div id="hasil-pemeriksaan-form">
                @foreach($pasien->hasilPemeriksaan as $index => $hasil)
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </form>
    </div>
</div>

<script>
    let rowIndex = {{ $pasien->hasilPemeriksaan->count() }};
    document.getElementById('add-row').addEventListener('click', () => {
        const form = document.getElementById('hasil-pemeriksaan-form');
        const newRow = `
            <div class="form-row mb-3" id="row-${rowIndex}">
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
                        <option value="Tinggi">Tinggi</option>
                        <option value="Normal">Normal</option>
                        <option value="Rendah">Rendah</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-danger btn-sm remove-row" data-row="row-${rowIndex}">Hapus</button>
                </div>
            </div>
        `;
        form.insertAdjacentHTML('beforeend', newRow);
        rowIndex++;
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-row')) {
            const rowId = event.target.getAttribute('data-row');
            document.getElementById(rowId).remove();
        }
    });
</script>
@endsection
