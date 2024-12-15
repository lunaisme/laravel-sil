<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;

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
            $table->string('no_rm');
            $table->string('kode')->unique();
            $table->string('nama_pasien');
            $table->string('alamat');
            $table->string('status_pasien');
            $table->integer('umur');
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('jaminan');
            $table->string('no_jaminan');
            $table->string('dokter');
            $table->string('no_lab');
            $table->string('group_test');
            $table->string('jenis_pemeriksaan');
            $table->string('jenis_sample');
            $table->date('tgl_pemeriksaan');
            $table->string('pembayaran');
            $table->string('status_pemeriksaan');
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
