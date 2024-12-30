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
        Schema::create('bantuan_informasis', function (Blueprint $table) {
            $table->id();
            $table->string('tipe');
            $table->string('nama');
            $table->string('jenis');
            $table->string('kategori');
            $table->string('jumlah_kuota');
            $table->string('tanggal_pembukaan');
            $table->string('tanggal_penutupan');
            $table->longText('deskripsi');
            $table->string('juknis')->nullable();
            $table->string('pic');
            $table->string('status');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantuan_informasis');
    }
};
