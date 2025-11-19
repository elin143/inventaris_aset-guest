<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
public function up(): void
{
Schema::create('aset', function (Blueprint $table) {
$table->id('aset_id');
$table->unsignedBigInteger('kategori_id');
$table->string('kode_aset')->unique();
$table->string('nama_aset');
$table->date('tgl_perolehan');
$table->decimal('nilai_perolehan', 15, 2);
$table->string('kondisi');
$table->timestamps();


$table->foreign('kategori_id')->references('id')->on('kategori_aset')->onDelete('cascade');
});
}


public function down(): void
{
Schema::dropIfExists('aset');
}
};
