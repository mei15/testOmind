<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username'          => 'admin',
            'email'             => 'admin@email.com',
            'email_verified_at' => Carbon::now(),
            'password'          => Hash::make('admin'),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
            'userable_id'       => 1,
            'userable_type'     => 'App\Models\Admin'
        ]);

        // --

        DB::table('users')->insert([
            'username'          => 'penjaga1',
            'email'             => 'penjaga1@email.com',
            'email_verified_at' => Carbon::now(),
            'password'          => Hash::make('penjaga1'),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
            'userable_id'       => 1,
            'userable_type'     => 'App\Models\Penjaga'
        ]);

        DB::table('users')->insert([
            'username'          => 'penjaga2',
            'email'             => 'penjaga2@email.com',
            'email_verified_at' => Carbon::now(),
            'password'          => Hash::make('penjaga2'),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
            'userable_id'       => 2,
            'userable_type'     => 'App\Models\Penjaga'
        ]);  
    }
}
