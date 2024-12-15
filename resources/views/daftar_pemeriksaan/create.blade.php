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
                            <label for="kode">Kode Pasien</label>
                            <input type="text" class="form-control" id="kode" name="kode" required>
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
                            <select class="form-control" id="status_pasien" name="status_pasien" required>
                                <option value="Rawat Inap">Rawat Inap</option>
                                <option value="Rawat Jalan">Rawat Jalan</option>
                            </select>
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
                            <select class="form-control" id="jaminan" name="jaminan" required>
                                <option value="BPJS">BPJS</option>
                                <option value="Umum">Umum</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
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
                            <label for="no_lab">No LAB</label>
                            <input type="text" class="form-control" id="no_lab" name="no_lab" required>
                        </div>
                        <div class="form-group">
                            <label for="group_test">Group Test</label>
                            <select class="form-control" id="group_test" name="group_test" required>
                                <option value="Hematologi">Hematologi</option>
                                <option value="Kimia Darah">Kimia Darah</option>
                                <option value="Urinalisis">Urinalisis</option>
                                <option value="Imunoserologi">Imunoserologi</option>
                                <option value="Mikrobiologi">Mikrobiologi</option>
                                <option value="Lain-lain">Lain-lain</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis_pemeriksaan">Jenis Pemeriksaan</label>
                            <select class="form-control" id="jenis_pemeriksaan" name="jenis_pemeriksaan" required>
                                <option value="Hematologi rutin" data-group="Hematologi">Hematologi rutin</option>
                                <option value="Hematologi lengkap" data-group="Hematologi">Hematologi lengkap</option>
                                <option value="Laju Endap Darah (LED)" data-group="Hematologi">Laju Endap Darah (LED)</option>
                                <option value="PTT" data-group="Hematologi">PTT</option>
                                <option value="APTT" data-group="Hematologi">APTT</option>
                                <option value="HBA1c" data-group="Hematologi">HBA1c</option>
                                <option value="Hitung Jenis Leukosit" data-group="Hematologi">Hitung Jenis Leukosit</option>
                                <option value="Clooting Time" data-group="Hematologi">Clooting Time</option>
                                <option value="Bleeding Time" data-group="Hematologi">Bleeding Time</option>
                                <option value="Golongan darah (rhesus)" data-group="Hematologi">Golongan darah (rhesus)</option>
                                <option value="Morfologi darah tepi" data-group="Hematologi">Morfologi darah tepi</option>
                                <option value="LE Sel" data-group="Hematologi">LE Sel</option>
                                <option value="Gula Darah Sewaktu" data-group="Kimia Darah">Gula Darah Sewaktu</option>
                                <option value="Gula Darah Puasa" data-group="Kimia Darah">Gula Darah Puasa</option>
                                <option value="Gula Darah 2 jam PP" data-group="Kimia Darah">Gula Darah 2 jam PP</option>
                                <option value="Trigliserid" data-group="Kimia Darah">Trigliserid</option>
                                <option value="Kolesterol total" data-group="Kimia Darah">Kolesterol total</option>
                                <option value="Kolesterol HDL" data-group="Kimia Darah">Kolesterol HDL</option>
                                <option value="Kolesterol LDL" data-group="Kimia Darah">Kolesterol LDL</option>
                                <option value="Protein total" data-group="Kimia Darah">Protein total</option>
                                <option value="Bilirubin total" data-group="Kimia Darah">Bilirubin total</option>
                                <option value="Albumin" data-group="Kimia Darah">Albumin</option>
                                <option value="SGPT" data-group="Kimia Darah">SGPT</option>
                                <option value="SGOT" data-group="Kimia Darah">SGOT</option>
                                <option value="Asam Urat" data-group="Kimia Darah">Asam Urat</option>
                                <option value="Ureum" data-group="Kimia Darah">Ureum</option>
                                <option value="Kreatinin" data-group="Kimia Darah">Kreatinin</option>
                                <option value="Urine rutin" data-group="Urinalisis">Urine rutin</option>
                                <option value="Sedimen urine" data-group="Urinalisis">Sedimen urine</option>
                                <option value="Test kehamilan" data-group="Urinalisis">Test kehamilan</option>
                                <option value="Protein urine" data-group="Urinalisis">Protein urine</option>
                                <option value="Glukosa urine" data-group="Urinalisis">Glukosa urine</option>
                                <option value="Dengue" data-group="Imunoserologi">Dengue</option>
                                <option value="HBsAg" data-group="Imunoserologi">HBsAg</option>
                                <option value="Widal" data-group="Imunoserologi">Widal</option>
                                <option value="Toxo IgG" data-group="Imunoserologi">Toxo IgG</option>
                                <option value="Toxo igM" data-group="Imunoserologi">Toxo igM</option>
                                <option value="T3/T4" data-group="Imunoserologi">T3/T4</option>
                                <option value="TSH" data-group="Imunoserologi">TSH</option>
                                <option value="Rubella IgG" data-group="Imunoserologi">Rubella IgG</option>
                                <option value="Rubella IgM" data-group="Imunoserologi">Rubella IgM</option>
                                <option value="CMV IgG" data-group="Imunoserologi">CMV IgG</option>
                                <option value="CMV IgM" data-group="Imunoserologi">CMV IgM</option>
                                <option value="HIV" data-group="Imunoserologi">HIV</option>
                                <option value="BTA" data-group="Mikrobiologi">BTA</option>
                                <option value="Secret IMS" data-group="Mikrobiologi">Secret IMS</option>
                                <option value="Pewarnaan gram" data-group="Mikrobiologi">Pewarnaan gram</option>
                                <option value="Feses rutin" data-group="Mikrobiologi">Feses rutin</option>
                                <option value="Malaria" data-group="Mikrobiologi">Malaria</option>
                                <option value="NAPZA" data-group="Lainnya">NAPZA</option>
                                <option value="Analisa sperma" data-group="Lainnya">Analisa sperma</option>
                                <option value="Patologi anatomi" data-group="Lainnya">Patologi anatomi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis_sample">Jenis Sample</label>
                            <select class="form-control" id="jenis_sample" name="jenis_sample" required>
                                <option value="Serum" data-group="Kimia Darah">Serum</option>
                                <option value="EDTA" data-group="Kimia Darah">EDTA</option>
                                <option value="EDTA" data-group="Hematologi">EDTA</option>
                                <option value="Citrat" data-group="Hematologi">Citrat</option>
                                <option value="Urine" data-group="Urinalisis">Urine</option>
                                <option value="Serum" data-group="Imunoserologi">Serum</option>
                                <option value="Lainnya" data-group="Lain-lain">Lainnya</option>
                                <option value="Lainnya" data-group="Mikrobiologi">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tgl_pemeriksaan">Tanggal Pemeriksaan</label>
                            <input type="date" class="form-control" id="tgl_pemeriksaan" name="tgl_pemeriksaan" required>
                        </div>
                        
                        <input type="hidden" name="pembayaran" value="Belum">
                        <input type="hidden" name="status_pemeriksaan" value="Belum">
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
    document.addEventListener('DOMContentLoaded', function () {
        const groupTestSelect = document.getElementById('group_test');
        const jenisPemeriksaanSelect = document.getElementById('jenis_sample');

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
