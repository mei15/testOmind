<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class TempatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tempat')->insert([
            'name'    => 'Pos Satpam',
            'penjaga_id' => 1,
            'date' => Carbon::now(),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);

        DB::table('tempat')->insert([
            'name'    => 'Ruang Server',
            'penjaga_id' => 2,
            'date' => Carbon::now(),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);
    
    }
}
