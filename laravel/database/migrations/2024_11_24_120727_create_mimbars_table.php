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
        Schema::create('mimbars', function (Blueprint $table) {
            $table->id();
            $table->integer('type'); // Replace 'new_integer_column' with your column name
            $table->string('judul');
            $table->string('author');
            $table->string('editor');
            $table->longText('deskripsi');
            $table->string('gambar1');
            $table->string('keterangan1');
            $table->string('sumber');
            $table->string('metadata');
            $table->string('metatag');
            $table->string('metatitle');
            $table->string('metadeskripsi');
            $table->string('gambar2')->nullable();
            $table->string('keterangan2')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mimbars');
    }
};
