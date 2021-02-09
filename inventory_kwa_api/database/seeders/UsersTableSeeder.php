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
            'name' => 'Ludo Lustrous',
            'username' => 'user_ludo',
            'email' => NULL,
            'user_level_id' => 101,
            'password' => Hash::make('Karlwig#1'),
            'profile' => NULL,
            'active' => true,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Bebek',
            'username' => 'user_manager1',
            'email' => NULL,
            'user_level_id' => 102,
            'password' => Hash::make('support1kwa'),
            'profile' => NULL,
            'active' => true,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Rivan',
            'username' => 'user_manager2',
            'email' => NULL,
            'user_level_id' => 102,
            'password' => Hash::make('support2kwa'),
            'profile' => NULL,
            'active' => true,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Aditya',
            'username' => 'user_admin1',
            'email' => NULL,
            'user_level_id' => 100,
            'password' => Hash::make('admin1kwa'),
            'profile' => NULL,
            'active' => true,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Richard',
            'username' => 'user_admin2',
            'email' => NULL,
            'user_level_id' => 100,
            'password' => Hash::make('admin2kwa'),
            'profile' => NULL,
            'active' => true,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
    }
}
