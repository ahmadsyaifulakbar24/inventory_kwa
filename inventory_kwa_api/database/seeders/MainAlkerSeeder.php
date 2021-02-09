<?php

namespace Database\Seeders;

use App\Models\MainAlker;
use Illuminate\Database\Seeder;

class MainAlkerSeeder extends Seeder
{
    public function run()
    {
        MainAlker::create([
            'kode_main_alker' => 'OPM-FO',
            'nama_barang' => 'Optical Power Meter Fiber Optik',
            'satuan' => 'Unit',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'OLS',
            'nama_barang' => 'Optical Light Source Fiber Optik',
            'satuan' => 'Unit',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'PHONE-TEST',
            'nama_barang' => 'Phone Test',
            'satuan' => 'Unit',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'SAFETY-BELT',
            'nama_barang' => 'Safety Belt / Sabuk Pengaman / Safety Harness',
            'satuan' => 'Unit',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'TANGGA',
            'nama_barang' => 'Tangga Teleskopik 5.3M',
            'satuan' => 'Unit',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'HELM',
            'nama_barang' => 'Helm USA Merah Fasetrack',
            'satuan' => 'Unit',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'TANG-PTG',
            'nama_barang' => 'Tang Potong Kabel 8 Inchi Tekiro',
            'satuan' => 'Unit',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'VFL-LASER',
            'nama_barang' => 'Visual Fault Locator 10mWÂ ',
            'satuan' => 'Unit',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'LC-CLEAN',
            'nama_barang' => 'One Click Cleaner Pen Cleaner Konektor LC Connector FO',
            'satuan' => 'Unit',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'CLEAVER-FO',
            'nama_barang' => 'Cleaver Fiber Optic',
            'satuan' => 'Unit',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'STRIPPER-FO',
            'nama_barang' => 'Fiber Optic Stripper',
            'satuan' => 'Unit',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'DCSTRIP-PLIER',
            'nama_barang' => 'DC Stripper Plier',
            'satuan' => 'Unit',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'SPLICER-FO',
            'nama_barang' => 'COMWAY A3 Fiber Fusion Splicer ',
            'satuan' => 'Unit',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'OTDR',
            'nama_barang' => 'Optical Time-Domain Reflectometer',
            'satuan' => 'Unit',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'KABEL-VALDAT',
            'nama_barang' => 'Kabel Power USB to Male Plug 4x1.7mm - Black',
            'satuan' => 'Pcs',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'BATT-VALDAT',
            'nama_barang' => 'Power Bank 2A',
            'satuan' => 'Unit',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'SERAGAM-M',
            'nama_barang' => 'Seragam Indihome M',
            'satuan' => 'Pcs',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'SERAGAM-L',
            'nama_barang' => 'Seragam L',
            'satuan' => 'Pcs',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'SERAGAM-XL',
            'nama_barang' => 'Seragam Indihome XL',
            'satuan' => 'Pcs',
        ]);

        MainAlker::create([
            'kode_main_alker' => 'SERAGAM-XXL',
            'nama_barang' => 'Seragam Indihome XXL',
            'satuan' => 'Pcs',
        ]);
    }
}
