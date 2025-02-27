<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'role' => "dmin"
        ]);
        DB::table('users')->insert([
            'role' => "share_admin"
        ]);
        DB::table('users')->insert([
            'role' => "manager"
        ]);
    }
}
