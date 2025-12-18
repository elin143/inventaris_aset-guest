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

        // Ambil semua kategori ID dari tabel kategori_aset
        $kategoriIDs = DB::table('kategori_aset')->pluck('kategori_id')->toArray();

        // Jenis aset super lengkap, sesuai kategori Indonesia yang tadi kita buat
        $jenisAset = [
            // --- Tanah ---
            'Sebidang Tanah', 'Lahan Kosong', 'Tanah Pertanian', 'Tanah Perkantoran', 'Tanah Parkir',

            // --- Bangunan ---
            'Gedung Kantor', 'Gedung Serbaguna', 'Balai Desa', 'Ruang Kelas', 'Gudang',
            'Pos Ronda', 'Rumah Dinas', 'Laboratorium',

            // --- Kendaraan ---
            'Mobil Operasional', 'Motor Dinas', 'Ambulans', 'Truk Angkut', 'Sepeda Listrik',

            // --- Peralatan Elektronik ---
            'Laptop', 'Komputer', 'Printer', 'Scanner', 'Proyektor', 'Televisi', 'AC Split',
            'Kamera CCTV', 'Router Internet', 'Switch LAN', 'Server Data', 'UPS',

            // --- Mesin & Peralatan Berat ---
            'Genset', 'Mesin Fotocopy', 'Mesin Las', 'Bor Listrik', 'Kompressor',

            // --- Perabot Kantor ---
            'Meja Kerja', 'Kursi Kerja', 'Rak Besi', 'Lemari Arsip', 'Filing Cabinet',
            'Papan Tulis', 'Podium', 'Set Meja Rapat',

            // --- Kebersihan ---
            'Gerobak Sampah', 'Tempat Sampah Besar', 'Mesin Pemotong Rumput', 'Sapu Jalan',

            // --- Infrastruktur ---
            'Lampu Jalan PJU', 'Tiang Lampu', 'Pagar Kawasan', 'Portal Gerbang',
            'Jembatan Mini', 'Drainase Beton',

            // --- Keamanan ---
            'HT Security', 'Metal Detector', 'Alarm Keamanan', 'Panic Button',

            // --- Kesehatan ---
            'Tempat Tidur Pasien', 'Kursi Roda', 'Tabung Oksigen', 'Tensimeter',
            'Stetoskop', 'Alat Nebulizer',

            // --- Olahraga ---
            'Bola Basket', 'Ring Basket', 'Matras Senam', 'Sepeda Statis',

            // --- Industri & Gudang ---
            'Forklift', 'Hand Pallet', 'Rack Gudang', 'Pallet Kayu',

            // --- Lain-lain ---
            'Tenda Acara', 'Tenda Darurat', 'Lampu Sorot', 'Wastafel Portabel'
        ];

        // Lokasi tambahan (untuk nama aset biar lebih real)
        $lokasi = [
            'Kantor Desa', 'Ruang Pelayanan', 'Ruang Kepala Desa', 'Gudang',
            'Balai Desa', 'Ruang Rapat', 'Puskesmas', 'Sekolah', 'Lapangan',
            'Ruang Arsip', 'Parkiran', 'Operasional Harian'
        ];

        foreach (range(1, 300) as $i) { // bisa 100 / 200 / 500, bebas
            $namaAset = $faker->randomElement($jenisAset) . ' ' . $faker->randomElement($lokasi);

            DB::table('aset')->insert([
                'kategori_id'      => $faker->randomElement($kategoriIDs),
                'kode_aset'        => $faker->unique()->numerify('AST-####'),
                'nama_aset'        => $namaAset,
                'tgl_perolehan'    => $faker->date(),
                'nilai_perolehan'  => $faker->numberBetween(150000, 150000000),
                'kondisi'          => $faker->randomElement([
                    'Baik', 'Baru', 'Layak Pakai', 'Rusak Ringan', 'Rusak Berat'
                ]),
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}



