<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['udang', 80000, 'gambar-produk/udang.png', 'Udang segar'],
            ['telur puyuh', 20000, 'gambar-produk/telur-puyuh.png', 'Telur puyuh segar'],
            ['tempe', 10000, 'gambar-produk/tempe.png', 'Tempe segar'],
            ['tahu', 15000, 'gambar-produk/tahu.png', 'Tahu segar'],
            ['tomat', 12000, 'gambar-produk/tomat.png', 'Tomat segar'],
            ['bawang merah', 60000, 'gambar-produk/bawang-merah.png', 'Bawang merah segar'],
            ['bawang putih', 50000, 'gambar-produk/bawang-putih.png', 'Bawang putih segar'],
            ['jahe', 30000, 'gambar-produk/jahe.png', 'Jahe segar'],
            ['serai', 25000, 'gambar-produk/serai.png', 'Serai segar'],
            ['tauco', 40000, 'gambar-produk/tauco.png', 'Tauco berkualitas'],
            ['cabe merah', 75000, 'gambar-produk/cabe-merah.png', 'Cabe merah segar'],
            ['cabe hijau', 70000, 'gambar-produk/cabe-hijau.png', 'Cabe hijau segar'],
            ['cabe rawit', 60000, 'gambar-produk/cabe-rawit.png', 'Cabe rawit segar'],
            ['garam', 10000, 'gambar-produk/garam.png', 'Garam dapur'],
            ['gula', 15000, 'gambar-produk/gula.png', 'Gula pasir'],
            ['daging sapi', 120000, 'gambar-produk/daging-sapi.png', 'Daging sapi segar'],
            ['daun jeruk', 10000, 'gambar-produk/daun-jeruk.png', 'Daun jeruk segar'],
            ['kaldu sapi', 30000, 'gambar-produk/kaldu-sapi.png', 'Kaldu sapi instan'],
            ['jintan bubuk', 25000, 'gambar-produk/jintan.png', 'Jintan bubuk segar'],
            ['merica bubuk', 25000, 'gambar-produk/merica.png', 'Merica bubuk segar'],
            ['lengkuas', 15000, 'gambar-produk/lengkuas.png', 'Lengkuas segar'],
            ['kayu manis', 40000, 'gambar-produk/kayu-manis.png', 'Kayu manis berkualitas'],
            ['gula merah', 20000, 'gambar-produk/gula-merah.png', 'Gula merah asli'],
            ['santan', 15000, 'gambar-produk/santan.png', 'Santan segar'],
            ['kemiri', 30000, 'gambar-produk/kemiri.png', 'Kemiri segar'],
            ['iga sapi', 100000, 'gambar-produk/iga-sapi.png', 'Iga sapi segar'],
            ['ketumbar', 15000, 'gambar-produk/ketumbar.png', 'Ketumbar segar'],
            ['merica', 20000, 'gambar-produk/merica-bulat.png', 'Merica bulat segar'],
            ['jintan', 20000, 'gambar-produk/jintan.png', 'Jintan segar'],
            ['keluak', 50000, 'gambar-produk/keluak.png', 'Keluak berkualitas'],
            ['kunyit', 15000, 'gambar-produk/kunyit.png', 'Kunyit segar'],
            ['pala', 45000, 'gambar-produk/pala.png', 'Pala berkualitas'],
            ['daun salam', 10000, 'gambar-produk/daun-salam.png', 'Daun salam segar'],
            ['asam jawa', 15000, 'gambar-produk/asam-jawa.png', 'Asam jawa segar'],
            ['ayam kampung', 90000, 'gambar-produk/ayam-kampung.png', 'Ayam kampung segar'],
            ['Kecap Manis', 20000, 'gambar-produk/kecap-manis.png', 'Kecap manis'],
            ['air', 5000, 'gambar-produk/air.png', 'Air mineral'],
            ['gula pasir', 15000, 'gambar-produk/gula-pasir.png', 'Gula pasir berkualitas'],
            ['minyak', 30000, 'gambar-produk/minyak.png', 'Minyak goreng'],
            ['kencur', 20000, 'gambar-produk/kencur.png', 'Kencur segar'],
            ['merica putih', 25000, 'gambar-produk/merica-putih.png', 'Merica putih segar'],
        ];

        foreach ($products as $product) {
            Produk::create([
                'store_id' => 1,
                'nama_produk' => $product[0],
                'harga_produk' => $product[1],
                'stock_produk' => 1,
                'foto_produk' => $product[2],
                'desc_produk' => $product[3],
            ]);
        }
    }
}