<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class Kategoriseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1,
                'kategori_kode' => 'AT01',
                'kategori_nama' => 'Alat Tulis',
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'ABT02',
                'kategori_nama' => 'Alat Lainnya',
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'BT03',
                'kategori_nama' => 'Buku Tulis',
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'BG04',
                'kategori_nama' => 'Buku Gambar',
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'AG05',
                'kategori_nama' => 'Alat Gambar',
            ],
        ];

        DB::table('m_kategori')->insert($data);
    }
}
