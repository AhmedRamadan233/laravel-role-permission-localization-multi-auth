<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'super_admin',
            'email' => 'super_admin@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '01020412198',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
