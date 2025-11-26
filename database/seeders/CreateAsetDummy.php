<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CreateAsetDummy extends Seeder
{
 public function run()
{
    $faker = Faker::create('id_ID');

    // ambil semua kategori_id untuk foreign key
    $kategoriIDs = DB::table('kategori_aset')->pluck('kategori_id')->toArray();

    foreach (range(1, 500) as $index) {
        DB::table('aset')->insert([
            'kategori_id'      => $faker->randomElement($kategoriIDs),
            'kode_aset'        => $faker->unique()->numerify('AST-####'),
            'nama_aset'        => $faker->words(2, true), // contoh: "Laptop Kantor"
            'tgl_perolehan'    => $faker->date(),
            'nilai_perolehan'  => $faker->numberBetween(500000, 50000000), // 500 ribu - 50 jt
            'kondisi'          => $faker->randomElement(['Baik', 'Rusak Ringan', 'Rusak Berat']),
            'created_at'       => now(),
            'updated_at'       => now(),
        ]);
    }
}

}



