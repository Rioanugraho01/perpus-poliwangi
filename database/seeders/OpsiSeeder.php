<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OpsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'opsi'=>'Sangat Baik',
                'points'=> 4
            ],
            [
                'opsi'=>'Baik',
                'points'=> 3
            ],
            [
                'opsi'=>'Kurang',
                'points'=> 2
            ],
            [
                'opsi'=>'Buruk',
                'points'=> 1
            ]
        ];
        DB::table('option')->insert($data);
    }
}
