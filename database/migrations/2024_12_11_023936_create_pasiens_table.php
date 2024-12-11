<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('no_rm');
            $table->string('nama_pasien');
            $table->string('jenis_kelamin');
            $table->date('tgl_daftar');
            $table->string('jenis_pemeriksaan');
            $table->string('status_pemeriksaan');
            $table->string('dokter');
            $table->string('jaminan');
            $table->date('tanggal_pemeriksaan');
            $table->string('pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
}
