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

        // 150+ kategori aset Indonesia (sangat lengkap)
        $kategoriDasar = [
            // --- TANAH ---
            'Tanah Kosong', 'Tanah Pertanian', 'Tanah Perkebunan', 'Tanah Perumahan',
            'Tanah Perkantoran', 'Tanah Komersial', 'Tanah Industri', 'Tanah Pemakaman',
            'Lahan Parkir', 'Lahan Fasilitas Umum', 'Lahan Lapangan',

            // --- BANGUNAN ---
            'Gedung Kantor', 'Gedung Serbaguna', 'Rumah Dinas', 'Rumah Susun',
            'Puskesmas', 'Pustu', 'Poliklinik', 'Posyandu', 'Rumah Sakit',
            'Kantor Desa', 'Balai Desa', 'Balai RW', 'Balai RT',
            'Sekolah Dasar', 'Sekolah Menengah', 'Laboratorium', 'Ruang Kelas',
            'Gudang Penyimpanan', 'Workshop', 'Pos Jaga', 'Pos Ronda',

            // --- KENDARAAN ---
            'Mobil Operasional', 'Mobil Dinas', 'Ambulans', 'Mobil Pemadam',
            'Motor Dinas', 'Motor Operasional', 'Truk Angkut', 'Pick Up', 'Bus Mini',
            'Sepeda Roda Tiga', 'Sepeda Listrik',

            // --- PERALATAN & MESIN ---
            'Komputer PC', 'Laptop', 'Printer', 'Scanner', 'CCTV',
            'Mesin Fotocopy', 'Proyektor', 'Mesin Ketik', 'Televisi LED',
            'AC Split', 'Kipas Angin Industri', 'Mesin Bor', 'Mesin Las', 'Genset',
            'UPS', 'Router', 'Switch Hub', 'Server Aplikasi',

            // --- PERABOT & FURNITURE ---
            'Meja Kerja', 'Kursi Kerja', 'Kursi Lipat', 'Lemari Arsip',
            'Rak Besi', 'Rak Kayu', 'Filing Cabinet', 'Podium',
            'Papan Tulis', 'Papan Pengumuman', 'Tempat Sampah Besar',

            // --- PERALATAN KEBERSIHAN ---
            'Mesin Pemotong Rumput', 'Alat Semprot Disinfektan', 'Sapu Jalan',
            'Gerobak Sampah', 'Tong Sampah Plastik', 'Tabung Pemadam APAR',

            // --- JARINGAN & INFRASTRUKTUR ---
            'Jalan Desa', 'Jalan Lingkungan', 'Jembatan Beton', 'Jembatan Baja',
            'Drainase', 'Irigasi', 'Pagar Keliling', 'Gapura',
            'Lampu Jalan PJU', 'Tiang Listrik', 'Instalasi Listrik',
            'Jaringan Internet Desa', 'Menara CCTV', 'Portal Gerbang',

            // --- PERALATAN OLAHRAGA ---
            'Bola Basket', 'Bola Voli', 'Ring Basket', 'Net Voli',
            'Matras Senam', 'Alat Fitness', 'Treadmill', 'Sepeda Statis',

            // --- PERALATAN SENI & BUDAYA ---
            'Sound System', 'Speaker Aktif', 'Mixer Audio', 'Mic Wireless',
            'Panggung Lipat', 'Lampu Panggung', 'Gamelan', 'Kostum Tari',

            // --- INVENTARIS SEKOLAH ---
            'Bangku Siswa', 'Meja Siswa', 'Loker Siswa', 'Globe',
            'Alat Peraga IPA', 'Alat Peraga IPS', 'Peralatan Ekstrakurikuler',

            // --- INVENTARIS PEMERINTAHAN ---
            'Stempel', 'Mesin Penghitung Uang', 'Brankas', 'Radio Komunikasi HT',
            'Peralatan Rapat', 'Peta Wilayah', 'Banner Standing', 'Tenda Lipat',

            // --- INVENTARIS INDUSTRI ---
            'Forklift', 'Hand Pallet', 'Rack Gudang', 'Pallet Kayu',
            'Drum Bahan Kimia', 'Pipa Besi', 'Kompressor Angin',

            // --- INVENTARIS PERTANIAN ---
            'Traktor', 'Cangkul', 'Semprotan Pupuk', 'Pompa Air',
            'Alat Panen', 'Mesin Penggiling Padi', 'Timbangan Duduk',

            // --- INVENTARIS PERIKANAN ---
            'Kolam Ikan', 'Keramba Apung', 'Jaring Ikan', 'Mesin Pakan',

            // --- INVENTARIS KEAMANAN ---
            'HT Security', 'Metal Detector', 'CCTV Dome', 'CCTV Outdoor',
            'Barrier Gate', 'Alarm Keamanan', 'Panic Button',

            // --- INVENTARIS KESEHATAN ---
            'Tempat Tidur Pasien', 'Kursi Roda', 'Stetoskop', 'Tensimeter',
            'Alat Nebulizer', 'Tabung Oksigen', 'Termometer Digital',

            // --- INVENTARIS LAINNYA ---
            'Tenda Darurat', 'Perahu Karet', 'Lampu Sorot', 'Mesin Air',
            'Pompa Submersible', 'Drum Plastik', 'Kerangkeng Sampah',
            'Wastafel Portabel', 'Gerobak Dorong'
        ];

        foreach (range(1, 500) as $index) {
            $namaDasar = $faker->randomElement($kategoriDasar);
            $namaLengkap = $namaDasar . ' ' . $faker->randomDigitNotNull();

            DB::table('kategori_aset')->insert([
                'nama'      => $namaLengkap,
                'kode'      => 'KTG-' . str_pad($index, 3, '0', STR_PAD_LEFT),
                'deskripsi' => $faker->sentence(8),
            ]);
        }
    }
}
