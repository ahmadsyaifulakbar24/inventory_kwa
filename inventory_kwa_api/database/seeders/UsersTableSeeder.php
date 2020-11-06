<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ahmad Syaiful Akbar',
            'username' => 'syaiful',
            'email' => 'ipulbelcram@gmail.com',
            'user_level_id' => 1,
            'password' => Hash::make('12345678'),
            'profile' => NULL,
            'active' => true,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'user_level_id' => 100,
            'password' => Hash::make('12345678'),
            'profile' => NULL,
            'active' => true,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Direktur',
            'username' => 'direktur',
            'email' => 'direktur@gmail.com',
            'user_level_id' => 101,
            'password' => Hash::make('12345678'),
            'profile' => NULL,
            'active' => true,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Manager',
            'username' => 'manager',
            'email' => 'manager@gmail.com',
            'user_level_id' => 102,
            'password' => Hash::make('12345678'),
            'profile' => NULL,
            'active' => true,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
