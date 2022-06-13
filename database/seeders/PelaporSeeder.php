<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelaporSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelapors')->insert([
            'nama'=>'rida',
            'umur'=>20,
            'alamat'=>'Jl. Kasmat Lahay',
            'notelp'=>6536627,
        ]);
    }
}
