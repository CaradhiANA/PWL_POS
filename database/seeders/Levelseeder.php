<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Levelseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['level_id'=>1,'level_kode'=>'ADM','level_nama'=>'Administrator'],
            ['level_id'=>1,'level_kode'=>'MNG','level_nama'=>'Manager'],
        ]
    }
}
