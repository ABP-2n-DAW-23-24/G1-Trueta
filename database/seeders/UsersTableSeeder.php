<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'surnames' => 'admin',
            'email' => 'administrador@trueta.cat',
            'password' => Hash::make('administrador'),
            'isAdmin' => '1',
            'isManager' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'surnames' => 'user',
            'email' => 'user@trueta.cat',
            'password' => Hash::make('user'),
        ]);
    }
}
