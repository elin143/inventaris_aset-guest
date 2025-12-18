<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreatePemeliharaanDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua aset_id
        $asetIDs = DB::table('aset')->pluck('aset_id')->toArray();

        $data = [];

        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'aset_id' => $faker->randomElement($asetIDs),
                'tanggal' => $faker->date(),
                'tindakan' => $faker->randomElement([
                    'Servis Rutin',
                    'Pengecekan',
                    'Perbaikan',
                    'Penggantian Suku Cadang'
                ]),
                'biaya' => $faker->numberBetween(50000, 5000000),
                'pelaksana' => $faker->name(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('pemeliharaan_aset')->insert($data);
    }
}
