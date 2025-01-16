<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sebarans', function (Blueprint $table) {
            $table->id();
            $table->string('provinsi');
            $table->string('umat');
            $table->string('rumah_ibadah');
            $table->string('lembaga');
            $table->string('tokoh');
            $table->string('penyuluh');
            $table->string('pasraman');
            $table->string('siswa');
            $table->string('guru');
            $table->string('perguruan_tinggi');
            $table->string('dosen');
            $table->string('mahasiswa');
            $table->string('tenaga_administrasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sebarans');
    }
};
