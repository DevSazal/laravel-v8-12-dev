<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// add user for Authenticate
use Illuminate\Support\Facades\DB;
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
        // add maliha
        DB::table('users')->insert([
          'name' => 'Maliha Mou',
          'email' => 'maliha@gmail.com',
          'password' => Hash::make('123456')
        ]);
    }
}
