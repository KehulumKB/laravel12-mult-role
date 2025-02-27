<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "Kehulum",
            'email' => 'admin@gmail.com',
            'password' => Hash::make(12345678),
            'role_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => "Tilahun",
            'email' => 'sadmin@gmail.com',
            'password' => Hash::make(12345678),
            'role_id' => 2,
        ]);

        DB::table('users')->insert([
            'name' => "Asnake",
            'email' => 'manager@gmail.com',
            'password' => Hash::make(12345678),
            'role_id' => 3,
        ]);
    }
}
