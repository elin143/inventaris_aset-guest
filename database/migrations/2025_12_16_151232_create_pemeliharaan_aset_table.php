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
        Schema::create('pemeliharaan_aset', function (Blueprint $table) {
            $table->id('pemeliharaan_id');

            // 1️⃣ BUAT KOLOM DULU
            $table->unsignedBigInteger('aset_id');

            // 2️⃣ BARU FOREIGN KEY
            $table->foreign('aset_id')
                  ->references('aset_id')
                  ->on('aset')
                  ->onDelete('cascade');

            $table->date('tanggal');
            $table->string('tindakan');
            $table->decimal('biaya', 12, 2)->default(0);
            $table->string('pelaksana');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemeliharaan_aset');
    }
};
