<?php

namespace Database\Seeders;

use App\Models\UserLevel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void 
     */
    public function run()
    {
        $this->call([
            UserLevelSeeder::class,
            ParamSeeder::class,
            UsersTableSeeder::class,
            ItemSeeder::class,
            EmployeeSeeder::class,
            ProvinsiSeeder::class,
            KabKotaSeeder::class,
            MainAlkerSeeder::class,
        ]);
    }
}
