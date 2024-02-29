<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Barangseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 5,
                'barang_kode' => 'KRH01',
                'barang_nama' => 'Krayon hitam 1',
                'harga_beli' => 20000,
                'harga_jual' => 22000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 4,
                'barang_kode' => 'KRM01',
                'barang_nama' => 'Krayon merah 1',
                'harga_beli' => 25000,
                'harga_jual' => 27000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => 'KB01',
                'barang_nama' => 'Kertas A4',
                'harga_beli' => 5000,
                'harga_jual' => 6000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 1,
                'barang_kode' => 'PP01',
                'barang_nama' => 'Pensil 2B',
                'harga_beli' => 15000,
                'harga_jual' => 17000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 2,
                'barang_kode' => 'PG01',
                'barang_nama' => 'Penggaris 30 cm',
                'harga_beli' => 7000,
                'harga_jual' => 8000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 1,
                'barang_kode' => 'SK01',
                'barang_nama' => 'Spidol permanen',
                'harga_beli' => 30000,
                'harga_jual' => 32000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 5,
                'barang_kode' => 'PS01',
                'barang_nama' => 'Pensil warna 12 warna',
                'harga_beli' => 35000,
                'harga_jual' => 37000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 2,
                'barang_kode' => 'LM01',
                'barang_nama' => 'Lem stick',
                'harga_beli' => 10000,
                'harga_jual' => 12000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 2,
                'barang_kode' => 'MP01',
                'barang_nama' => 'Map plastik A4',
                'harga_beli' => 2000,
                'harga_jual' => 2500,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 3,
                'barang_kode' => 'BP01',
                'barang_nama' => 'Buku tulis 100 halaman',
                'harga_beli' => 7000,
                'harga_jual' => 8000,
            ],
        ];
            DB::table('m_barang')->insert($data);
    }
}

