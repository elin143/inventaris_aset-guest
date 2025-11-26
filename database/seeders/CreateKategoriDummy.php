<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CreateKategoriDummy extends Seeder
{
    public function run()
    {

        $faker = Faker::create('id_ID');

        foreach (range(1, 500) as $index) {
            DB::table('kategori_aset')->insert([
                'nama'      => $faker->unique()->words(2, true),
                'kode'      => 'KTG-' . str_pad($index, 3, '0', STR_PAD_LEFT),
                'deskripsi' => $faker->sentence(8),
            ]);
        }
    }
}
