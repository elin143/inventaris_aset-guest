<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lokasi_aset', function (Blueprint $table) {
            $table->id('lokasi_id');
            $table->unsignedBigInteger('aset_id');
            $table->string('keterangan')->nullable();
            $table->string('lokasi_text')->nullable();
            $table->string('rt', 10)->nullable();
            $table->string('rw', 10)->nullable();

            // Relasi
            $table->foreign('aset_id')->references('aset_id')->on('aset')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lokasi_aset');
    }
};
