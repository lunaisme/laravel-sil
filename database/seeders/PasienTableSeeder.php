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
                'alamat' => '123 Main St',
                'status_pasien' => 'Rawat Jalan',
                'umur' => 30,
                'tgl_lahir' => '1994-01-01',
                'jenis_kelamin' => 'Laki-laki',
                'jaminan' => 'BPJS',
                'no_jaminan' => 'BPJS001',
                'dokter' => 'Dr. Smith',
                'group_test' => 'Hematologi',
                'jenis_pemeriksaan' => 'Hematologi',
                'tgl_pemeriksaan' => '2024-12-12',
                'pembayaran' => 'Lunas',
                'status_pemeriksaan' => 'Selesai',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => 'P002',
                'no_rm' => 'RM002',
                'nama_pasien' => 'Jane Doe',
                'alamat' => '456 Elm St',
                'status_pasien' => 'Rawat Inap',
                'umur' => 25,
                'tgl_lahir' => '1999-02-02',
                'jenis_kelamin' => 'Perempuan',
                'jaminan' => 'Asuransi',
                'no_jaminan' => 'ASUR002',
                'dokter' => 'Dr. Brown',
                'group_test' => 'Kimia Darah',
                'jenis_pemeriksaan' => 'Kimia Darah',
                'tgl_pemeriksaan' => '2024-12-12',
                'pembayaran' => 'Belum',
                'status_pemeriksaan' => 'Diterima',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => 'P003',
                'no_rm' => 'RM003',
                'nama_pasien' => 'Alice Smith',
                'alamat' => '789 Oak St',
                'status_pasien' => 'Rawat Jalan',
                'umur' => 28,
                'tgl_lahir' => '1996-03-03',
                'jenis_kelamin' => 'Perempuan',
                'jaminan' => 'BPJS',
                'no_jaminan' => 'BPJS003',
                'dokter' => 'Dr. White',
                'group_test' => 'Urinalisis',
                'jenis_pemeriksaan' => 'Urinalisis',
                'tgl_pemeriksaan' => '2024-12-12',
                'pembayaran' => 'Lunas',
                'status_pemeriksaan' => 'Validasi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => 'P004',
                'no_rm' => 'RM004',
                'nama_pasien' => 'Bob Johnson',
                'alamat' => '101 Pine St',
                'status_pasien' => 'Rawat Inap',
                'umur' => 35,
                'tgl_lahir' => '1989-04-04',
                'jenis_kelamin' => 'Laki-laki',
                'jaminan' => 'Asuransi',
                'no_jaminan' => 'ASUR004',
                'dokter' => 'Dr. Green',
                'group_test' => 'Imunoserologi',
                'jenis_pemeriksaan' => 'Imunoserologi',
                'tgl_pemeriksaan' => '2024-12-12',
                'pembayaran' => 'Belum',
                'status_pemeriksaan' => 'Belum',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => 'P005',
                'no_rm' => 'RM005',
                'nama_pasien' => 'Charlie Brown',
                'alamat' => '202 Maple St',
                'status_pasien' => 'Rawat Jalan',
                'umur' => 40,
                'tgl_lahir' => '1984-05-05',
                'jenis_kelamin' => 'Laki-laki',
                'jaminan' => 'BPJS',
                'no_jaminan' => 'BPJS005',
                'dokter' => 'Dr. Black',
                'group_test' => 'Mikrobiologi',
                'jenis_pemeriksaan' => 'Mikrobiologi',
                'tgl_pemeriksaan' => '2024-12-12',
                'pembayaran' => 'Lunas',
                'status_pemeriksaan' => 'Selesai',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode' => 'P006',
                'no_rm' => 'RM006',
                'nama_pasien' => 'David Wilson',
                'alamat' => '303 Birch St',
                'status_pasien' => 'Rawat Inap',
                'umur' => 45,
                'tgl_lahir' => '1979-06-06',
                'jenis_kelamin' => 'Laki-laki',
                'jaminan' => 'Asuransi',
                'no_jaminan' => 'ASUR006',
                'dokter' => 'Dr. Grey',
                'group_test' => 'Lain-lain',
                'jenis_pemeriksaan' => 'Lain-lain',
                'tgl_pemeriksaan' => '2024-12-12',
                'pembayaran' => 'Belum',
                'status_pemeriksaan' => 'Diterima',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Add more entries here...
        ];


        DB::table('pasiens')->insert($pasiens);
    }
}
