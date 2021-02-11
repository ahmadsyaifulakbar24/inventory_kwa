<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParamSeeder extends Seeder
{
    public function run()
    {
        DB::table('params')->insert([
            'category_param' => 'sto',
            'param' => 'CBI',
            'order' => 1,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'sto',
            'param' => 'BJD',
            'order' => 2,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'sto',
            'param' => 'KHL',
            'order' => 3,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'sto',
            'param' => 'KHL',
            'order' => 4,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'sto',
            'param' => 'STL',
            'order' => 5,
            'active' => true
        ]);
        DB::table('params')->insert([
            'category_param' => 'sto',
            'param' => 'CTR',
            'order' => 6,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'sto',
            'param' => 'GPI',
            'order' => 7,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'sto',
            'param' => 'CLS',
            'order' => 8,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'sto',
            'param' => 'CSN',
            'order' => 9,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'sto',
            'param' => 'JGL',
            'order' => 10,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'sto',
            'param' => 'CAU',
            'order' => 11,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'satuan',
            'param' => 'Unit',
            'order' => 1,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'satuan',
            'param' => 'Pcs',
            'order' => 2,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'satuan',
            'param' => 'Meter',
            'order' => 3,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'satuan',
            'param' => 'Pack',
            'order' => 4,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'satuan',
            'param' => 'Set',
            'order' => 5,
            'active' => true
        ]);
        
        DB::table('params')->insert([
            'category_param' => 'satuan',
            'param' => 'Batang',
            'order' => 6,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'satuan',
            'param' => 'Roll',
            'order' => 7,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'jenis_item',
            'param' => 'Kabel',
            'order' => 1,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'jenis_item',
            'param' => 'ODC',
            'order' => 2,
            'active' => true
        ]);
        DB::table('params')->insert([
            'category_param' => 'jenis_item',
            'param' => 'ODP',
            'order' => 3,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'jenis_item',
            'param' => 'OTB',
            'order' => 4,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'jenis_item',
            'param' => 'Pipa',
            'order' => 5,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'jenis_item',
            'param' => 'Tiang',
            'order' => 6,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'jenis_alker',
            'param' => 'PSB',
            'order' => 1,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'jenis_alker',
            'param' => 'Migrasi',
            'order' => 2,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'jenis_alker',
            'param' => 'OSP',
            'order' => 3,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'keterangan_alker',
            'param' => 'No Good (NG)',
            'order' => 1,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'jabatan',
            'param' => 'teknisi',
            'order' => 1,
            'active' => true
        ]);

        DB::table('params')->insert([
            'category_param' => 'jabatan',
            'param' => 'Admin',
            'order' => 2,
            'active' => false
        ]);

        DB::table('params')->insert([
            'category_param' => 'jabatan',
            'param' => 'Sales',
            'order' => 3,
            'active' => false
        ]);

        DB::table('params')->insert([
            'category_param' => 'keterangan_alker',
            'param' => 'Request',
            'order' => 2,
            'active' => true
        ]);
    }
}
