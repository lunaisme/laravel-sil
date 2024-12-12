<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PasienTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pasiens = [
            [
                'kode' => 'P001',
                'no_rm' => 'RM001',
                'nama_pasien' => 'John Doe',
                'jenis_kelamin' => 'Laki-laki',
                'tgl_daftar' => '2024-12-11',
                'jenis_pemeriksaan' => 'Hematologi',
                'group_test' => 'Hematologi',
                'status_pemeriksaan' => 'Selesai',
                'dokter' => 'Dr. Smith',
                'jaminan' => 'BPJS',
                'tanggal_pemeriksaan' => '2024-12-12',
                'pembayaran' => 'Tunai',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => 'P002',
                'no_rm' => 'RM002',
                'nama_pasien' => 'Jane Doe',
                'jenis_kelamin' => 'Perempuan',
                'tgl_daftar' => '2024-12-11',
                'jenis_pemeriksaan' => 'Kimia Darah',
                'group_test' => 'Kimia Darah',
                'status_pemeriksaan' => 'Selesai',
                'dokter' => 'Dr. Brown',
                'jaminan' => 'Asuransi',
                'tanggal_pemeriksaan' => '2024-12-12',
                'pembayaran' => 'Kartu Kredit',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => 'P003',
                'no_rm' => 'RM003',
                'nama_pasien' => 'Alice Smith',
                'jenis_kelamin' => 'Perempuan',
                'tgl_daftar' => '2024-12-11',
                'jenis_pemeriksaan' => 'Urinalisis',
                'group_test' => 'Urinalisis',
                'status_pemeriksaan' => 'Selesai',
                'dokter' => 'Dr. White',
                'jaminan' => 'BPJS',
                'tanggal_pemeriksaan' => '2024-12-12',
                'pembayaran' => 'Tunai',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => 'P004',
                'no_rm' => 'RM004',
                'nama_pasien' => 'Bob Johnson',
                'jenis_kelamin' => 'Laki-laki',
                'tgl_daftar' => '2024-12-11',
                'jenis_pemeriksaan' => 'Imunoserologi',
                'group_test' => 'Imunoserologi',
                'status_pemeriksaan' => 'Selesai',
                'dokter' => 'Dr. Green',
                'jaminan' => 'Asuransi',
                'tanggal_pemeriksaan' => '2024-12-12',
                'pembayaran' => 'Kartu Kredit',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => 'P005',
                'no_rm' => 'RM005',
                'nama_pasien' => 'Charlie Brown',
                'jenis_kelamin' => 'Laki-laki',
                'tgl_daftar' => '2024-12-11',
                'jenis_pemeriksaan' => 'Mikrobiologi',
                'group_test' => 'Mikrobiologi',
                'status_pemeriksaan' => 'Selesai',
                'dokter' => 'Dr. Black',
                'jaminan' => 'BPJS',
                'tanggal_pemeriksaan' => '2024-12-12',
                'pembayaran' => 'Tunai',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => 'P006',
                'no_rm' => 'RM006',
                'nama_pasien' => 'David Wilson',
                'jenis_kelamin' => 'Laki-laki',
                'tgl_daftar' => '2024-12-11',
                'jenis_pemeriksaan' => 'Lain-lain',
                'group_test' => 'Lain-lain',
                'status_pemeriksaan' => 'Selesai',
                'dokter' => 'Dr. Grey',
                'jaminan' => 'Asuransi',
                'tanggal_pemeriksaan' => '2024-12-12',
                'pembayaran' => 'Kartu Kredit',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('pasiens')->insert($pasiens);
    }
}
