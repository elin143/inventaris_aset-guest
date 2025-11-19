<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Aset;
use App\Models\Kategori;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAsetDummy extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Ambil semua kategori_id, bukan id
        $kategoriIds = Kategori::pluck('kategori_id')->toArray();

        if (empty($kategoriIds)) {
            $this->command->warn('Tidak ada data kategori. Seeder Aset dilewati.');
            return;
        }

        for ($i = 1; $i <= 10; $i++) {
            Aset::create([
                'kategori_id'      => $faker->randomElement($kategoriIds),
                'kode_aset'        => 'AST-' . strtoupper($faker->bothify('??###')),
                'nama_aset'        => $faker->word(),
                'tgl_perolehan'    => $faker->date(),
                'nilai_perolehan'  => $faker->randomFloat(2, 100000, 5000000),
                'kondisi'          => $faker->randomElement(['Baik', 'Rusak Ringan', 'Rusak Berat']),
            ]);
        }

        $this->command->info('10 data dummy aset berhasil dibuat!');
    }
}


