<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateLokasiDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil aset_id dari tabel aset
        $asetIDs = DB::table('aset')->pluck('aset_id')->toArray();

        $lokasi = ['Kantor Desa', 'Gudang', 'Balai Desa', 'Ruang Arsip', 'Ruang IT', 'Lapangan'];

        $data = [];

        for ($i = 1; $i <= 50; $i++) {
            $data[] = [
                'aset_id' => $faker->randomElement($asetIDs),
                'keterangan' => $faker->sentence(6),
                'lokasi_text' => $faker->randomElement($lokasi),
                'rt' => $faker->numberBetween(1, 10),
                'rw' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('lokasi_aset')->insert($data);
    }
}
