<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateMutasiDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil aset_id dari tabel aset
        $asetIDs = DB::table('aset')->pluck('aset_id')->toArray();

        $jenisMutasi = ['Pemindahan', 'Penghapusan', 'Penyerahan', 'Reklasifikasi'];

        $data = [];

        for ($i = 1; $i <= 50; $i++) {
            $data[] = [
                'aset_id' => $faker->randomElement($asetIDs),
                'tanggal' => $faker->date(),
                'jenis_mutasi' => $faker->randomElement($jenisMutasi),
                'keterangan' => $faker->sentence(8),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('mutasi_aset')->insert($data);
    }
}
