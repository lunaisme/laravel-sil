<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pemeriksaan - {{ $pasien->nama_pasien }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 14px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .info-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .info-section {
            width: 48%;
        }
        .info-item {
            margin-bottom: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        .footer {
            margin-top: 30px;
            display: flex;
            justify-content: flex-end;
        }
        .signature {
            text-align: center;
            width: 200px;
        }
        @media print {
            @page {
                margin: 20px;
            }
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>HASIL PEMERIKSAAN LABORATORIUM</h2>
        <h3>Laboratorium Patologi Klinik & Anatomi RSUD Senopati</h3>
        <p>Ngadinegaran, Kecamatan Mantrijeron, Daerah Istimewa Yogyakarta </p>
        <p>Jalan Parangtritis KM 05, Mantrijeron, kode pos 55782</p>
    </div>

    <div class="info-container">
        <div class="info-section">
            <h4>Data Pasien</h4>
            <div class="info-item"><strong>No RM:</strong> {{ $pasien->no_rm }}</div>
            <div class="info-item"><strong>Nama Pasien:</strong> {{ $pasien->nama_pasien }}</div>
            <div class="info-item"><strong>Jenis Kelamin:</strong> {{ $pasien->jenis_kelamin }}</div>
            <div class="info-item"><strong>Tanggal Lahir:</strong> {{ $pasien->tgl_lahir }}</div>
        </div>
        <div class="info-section">
            <h4>Informasi Pemeriksaan</h4>
            <div class="info-item"><strong>No Lab:</strong> {{ $pasien->kode }}</div>
            <div class="info-item"><strong>Tanggal Pemeriksaan:</strong> {{ $pasien->tanggal_pemeriksaan }}</div>
            <div class="info-item"><strong>Dokter Pengirim:</strong> {{ $pasien->dokter }}</div>
            <div class="info-item"><strong>Jenis Pemeriksaan:</strong> {{ $pasien->jenis_pemeriksaan }}</div>
        </div>
    </div>

    <table>
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

    <div class="footer">
        <div class="signature">
            <p>Kepala Lab</p>
            <br><br><br>
            <p>(_________________)</p>
            <p> Jefri Nichol, S.Tr.Kes. </p>
        </div>
    </div>

    <div class="no-print" style="margin-top: 20px; text-align: center;">
        <button onclick="window.print()">Cetak</button>
        <button onclick="window.close()">Tutup</button>
    </div>
</body>
</html>