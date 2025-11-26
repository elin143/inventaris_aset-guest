<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateWargaDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('warga_id');

        foreach (range(1, 500) as $index) {
            DB::table('warga')->insert([
                'no_ktp'        => $faker->numerify('3276############'), // 3276 misal kode kota Bandung
                'nama'          => $faker->name(),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama'         => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
                'pekerjaan'     => $faker->jobTitle(),
                'telp'          => $faker->phoneNumber(),
                'email'         => $faker->unique()->safeEmail(),
            ]);
        }
    }

}
