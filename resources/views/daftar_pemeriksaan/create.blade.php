@extends('layouts.admin')

@section('main-content')
<h1 class="h3 mb-4 text-gray-800">{{ __('Tambah Pemeriksaan') }}</h1>

<div class="row justify-content-center px-3">
    <div class="col-12 card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Pemeriksaan</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('daftar_pemeriksaan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <h5>Data Pasien</h5>
                        <div class="form-group">
                            <label for="no_rm">No RM</label>
                            <input type="text" class="form-control" id="no_rm" name="no_rm" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_pasien">Nama Pasien</label>
                            <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                        </div>
                        <div class="form-group">
                            <label for="status_pasien">Status Pasien</label>
                            <input type="text" class="form-control" id="status_pasien" name="status_pasien" required>
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input type="number" class="form-control" id="umur" name="umur" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jaminan">Jaminan</label>
                            <input type="text" class="form-control" id="jaminan" name="jaminan" required>
                        </div>
                        <div class="form-group">
                            <label for="no_jaminan">No Jaminan</label>
                            <input type="text" class="form-control" id="no_jaminan" name="no_jaminan" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Data Pemeriksaan</h5>
                        <div class="form-group">
                            <label for="dokter">Dokter</label>
                            <input type="text" class="form-control" id="dokter" name="dokter" required>
                        </div>
                        <div class="form-group">
                            <label for="group_test">Group Test</label>
                            <select class="form-control" id="group_test" name="group_test" required>
                                <option value="Hematologi">Hematologi</option>
                                <option value="Kimia Darah">Kimia Darah</option>
                                <option value="Urinalisis">Urinalisis</option>
                                <option value="Imuneserologi">Imuneserologi</option>
                                <option value="Mikrobiologi">Mikrobiologi</option>
                                <option value="Lain-lain">Lain-lain</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis_pemeriksaan">Jenis Pemeriksaan</label>
                            <select class="form-control" id="jenis_pemeriksaan" name="jenis_pemeriksaan" required>
                                <option value="Serum" data-group="Kimia Darah">Serum</option>
                                <option value="EDTA" data-group="Kimia Darah">EDTA</option>
                                <option value="EDTA" data-group="Hematologi">EDTA</option>
                                <option value="Citrat" data-group="Hematologi">Citrat</option>
                                <option value="Urine" data-group="Urinalisis">Urine</option>
                                <option value="Serum" data-group="Imuneserologi">Serum</option>
                                <option value="Lainnya" data-group="Lain-lain">Lainnya</option>
                                <option value="Lainnya" data-group="Mikrobiologi">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_pemeriksaan">Tanggal Pemeriksaan</label>
                            <input type="date" class="form-control" id="tgl_pemeriksaan" name="tgl_pemeriksaan" required>
                        </div>
                        <div class="form-group">
                            <label for="pembayaran">Pembayaran</label>
                            <select class="form-control" id="pembayaran" name="pembayaran" required>
                                <option value="Lunas">Lunas</option>
                                <option value="Belum">Belum</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status_pemeriksaan">Status Pemeriksaan</label>
                            <select class="form-control" id="status_pemeriksaan" name="status_pemeriksaan" required>
                                <option value="Belum">Belum</option>
                                <option value="Diterima">Diterima</option>
                                <option value="Validasi">Validasi</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const groupTestSelect = document.getElementById('group_test');
        const jenisPemeriksaanSelect = document.getElementById('jenis_pemeriksaan');

        groupTestSelect.addEventListener('change', function () {
            const selectedGroup = this.value;
            Array.from(jenisPemeriksaanSelect.options).forEach(option => {
                option.style.display = option.getAttribute('data-group') === selectedGroup ? 'block' : 'none';
            });
            jenisPemeriksaanSelect.value = '';
        });

        // Trigger change event to filter options on page load
        groupTestSelect.dispatchEvent(new Event('change'));
    });
</script>
@endsection
