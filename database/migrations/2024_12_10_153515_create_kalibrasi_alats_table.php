<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kalibrasi_alats', function (Blueprint $table) {
            $table->id();
            $table->string('kode_alat');
            $table->string('nama_alat');
            $table->string('catatan')->nullable();
            $table->date('tanggal_kalibrasi');
            $table->enum('status', ['kurang optimal', 'menunggu proses', 'sedang proses', 'baik']);
            $table->timestamp('tanggal_update')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kalibrasi_alats');
    }
};
