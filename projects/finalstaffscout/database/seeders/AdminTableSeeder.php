<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('admins')->insert([
            'first_name' => "Humphrey",
            'last_name' => "Luchetu",
            'email' => 'humluchetu@gmail.com',
            'phone_number' => '0748905088',
            'password' => Hash::make('@Information10'),
        ]);
    }
}
