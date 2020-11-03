<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run()
    {
        Item::create([
            'id' => 1,
            'kode' => 'AC-OF-SM-12-SC',
            'type_item' => 'goods',
            'nama_barang' => 'Kabel Fiber Optic 12 Core',
            'keterangan' => 'Kabel Udara Fiber Optik Single Mode 12 core G 652 D',
            'satuan' => 'Meter',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 2,
            'kode' => 'AC-OF-SM-24-SC',
            'type_item' => 'goods',
            'nama_barang' => 'Kabel Fiber Optic 24 Core',
            'keterangan' => 'Kabel Udara Fiber Optik Single Mode 24 core G 652 D',
            'satuan' => 'Meter',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 3,
            'kode' => 'DC-OF-SM-1C',
            'type_item' => 'goods',
            'nama_barang' => 'Kabel Fiber Optic 1 Core',
            'keterangan' => 'Pengadaan dan pemasangan Kabel Serat Optic Penanggal Single Mode 1 core dgn pelindung pipa G 657 A (indoor) - 1000 meter',
            'satuan' => 'Roll',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 4,
            'kode' => 'PC-75',
            'type_item' => 'goods',
            'nama_barang' => 'Precon 75m',
            'keterangan' => 'Kabel Precon Fiber Optik 75m 75 Meter Dropcore Single Core 1 Core',
            'satuan' => 'Pcs',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 5,
            'kode' => 'PC-80',
            'type_item' => 'goods',
            'nama_barang' => 'Precon 80m',
            'keterangan' => 'Kabel Precon Fiber Optik 80m 80 Meter Dropcore Single Core 1 Core',
            'satuan' => 'Pcs',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 6,
            'kode' => 'PC-100',
            'type_item' => 'goods',
            'nama_barang' => 'Precon 100m',
            'keterangan' => 'Kabel Precon Fiber Optik 100m 100 Meter Dropcore Single Core 1 Core',
            'satuan' => 'Pcs',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 7,
            'kode' => 'PC-150',
            'type_item' => 'goods',
            'nama_barang' => 'Precon 150m',
            'keterangan' => 'Kabel Precon Fiber Optik 150m 150 Meter Dropcore Single Core 1 Core',
            'satuan' => 'Pcs',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 8,
            'kode' => 'PC-175',
            'type_item' => 'goods',
            'nama_barang' => 'Precon 175m',
            'keterangan' => 'Kabel Precon Fiber Optik 175m 175 Meter Dropcore Single Core 1 Core',
            'satuan' => 'Pcs',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 9,
            'kode' => 'PC-UPC-6202-2',
            'type_item' => 'goods',
            'nama_barang' => 'Patchcord 20 Meter',
            'keterangan' => 'Patchcord 20 meter, (FC/LC/SC-UPC To FC/LC/SC-UPC), G.652D',
            'satuan' => 'Pcs',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 10,
            'kode' => 'PC-UPC-652-2',
            'type_item' => 'goods',
            'nama_barang' => 'Patchcord 5 Meter',
            'keterangan' => 'Patchcord 5 meter, (FC/LC/SC-UPC To FC/LC/SC-UPC), G.652D',
            'satuan' => 'Pcs',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 11,
            'kode' => 'PIG-SC-UPC',
            'type_item' => 'goods',
            'nama_barang' => 'Pigtail SC',
            'keterangan' => 'Pigtail SC UPC Fiber Optic 1 Pack',
            'satuan' => 'Pcs',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 12,
            'kode' => 'FAST-SC',
            'type_item' => 'goods',
            'nama_barang' => 'Fast Con SC',
            'keterangan' => 'Fast Connector SC UPC SOC Fiber Optic FTTH',
            'satuan' => 'Pcs',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 13,
            'kode' => 'SOC-FO',
            'type_item' => 'goods',
            'nama_barang' => 'SOC Fiber Optic',
            'keterangan' => 'splice on connector / SOC FIBER OPTIC/ FAST CONNECTOR SOC / SOC FO/SOC',
            'satuan' => 'Pcs',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 14,
            'kode' => 'SC-UPC',
            'type_item' => 'goods',
            'nama_barang' => 'SC UPC Adaptor',
            'keterangan' => 'Adapter SC/UPC SM Simplex\nFlangeless SC SX fiber optic adapter',
            'satuan' => 'Pcs',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 15,
            'kode' => 'PROTECT-SLV',
            'type_item' => 'goods',
            'nama_barang' => 'Protector Sleeve',
            'keterangan' => 'PROTECTION SLEEVE CORE\nDigunakan untuk melindungi hasil sambungan kabel fiber optik dengan cara dipanaskan\n\nDiameter: 4mm\nPanjang: 6Cm\n\n1 Pack (50 Pcs).',
            'satuan' => 'Pack',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 16,
            'kode' => 'HS-TB-2MM',
            'type_item' => 'goods',
            'nama_barang' => 'Solasi Bakar',
            'keterangan' => 'Heat Shrink Tubing Black 2mm SALIPT\n\nSetelah dipanaskan menjadi 1mm',
            'satuan' => 'Meter',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 17,
            'kode' => 'RS-IN-SC-1P',
            'type_item' => 'goods',
            'nama_barang' => 'Roset ',
            'keterangan' => 'Roset/Indoor Optical Outlet with SC Adaptor - kap 1 port ',
            'satuan' => 'Pcs',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 18,
            'kode' => 'TK-20M',
            'type_item' => 'goods',
            'nama_barang' => 'TREKPER KABEL',
            'keterangan' => 'PANCINGAN KABEL 20 METER - TREKPER 20 METER - WIRE GUIDER 20M',
            'satuan' => 'Pcs',
            'jenis' => 'Kabel',
            'stock' => 0
        ]);

        Item::create([
            'id' => 19,
            'kode' => 'GB-G3',
            'type_item' => 'goods',
            'nama_barang' => 'Grounding ODC',
            'keterangan' => 'Grounding 3 titik rod pada ODC dengan tahanan maks 1 ohm',
            'satuan' => 'Set',
            'jenis' => 'ODC',
            'stock' => 0
        ]);

        Item::create([
            'id' => 20,
            'kode' => 'HH-PIT-P-ODC',
            'type_item' => 'goods',
            'nama_barang' => 'Hand Hole Pit',
            'keterangan' => 'Hand Hole Pit Portable ODC beserta aksesorisnya',
            'satuan' => 'Pcs',
            'jenis' => 'ODC',
            'stock' => 0
        ]);

        Item::create([
            'id' => 21,
            'kode' => 'ODC-C-144',
            'type_item' => 'goods',
            'nama_barang' => 'ODC Outdoor 144 Core',
            'keterangan' => 'Kabinet ODC (Outdoor) kap 144 core dengan space untuk spliter modular termasuk material adaptor SC, pigtail, pondasi berlapis keramik, lantai kerja keramik, patok pengaman (5 buah), berikut pelabelan',
            'satuan' => 'Pcs',
            'jenis' => 'ODC',
            'stock' => 0
        ]);

        Item::create([
            'id' => 22,
            'kode' => 'ODC-C-288',
            'type_item' => 'goods',
            'nama_barang' => 'ODC Outdoor 288 Core',
            'keterangan' => 'Kabinet ODC (Outdoor) Kap 288 core dengan space untuk spliter modular termasuk material adaptor SC, pigtail, pondasi berlapis keramik, lantai kerja keramik, patok pengaman (5 buah).',
            'satuan' => 'Pcs',
            'jenis' => 'ODC',
            'stock' => 0
        ]);

        Item::create([
            'id' => 23,
            'kode' => 'ODC-PROT-288',
            'type_item' => 'goods',
            'nama_barang' => 'Pengaman ODC 288 Core',
            'keterangan' => 'Pengaman ODC 288 (Besi siku 4cmx4cmx4mm, besi beton 10mm (jarak antar besi beton 10cm, engsel besar, baut ram set 14mm dan kunci gembok 50mm',
            'satuan' => 'Set',
            'jenis' => 'ODC',
            'stock' => 0
        ]);

        Item::create([
            'id' => 24,
            'kode' => 'ODP-A-16',
            'type_item' => 'goods',
            'nama_barang' => 'ODP Indoor 16 Core',
            'keterangan' => 'ODP type Indoor/wall Kap 16 core berikut space 2 pasive spliter (1:8), adapter SC,berikut pelabelan dan penempelan QR code (disediakan oleh Telkom)',
            'satuan' => 'Set',
            'jenis' => 'ODP',
            'stock' => 0
        ]);

        Item::create([
            'id' => 25,
            'kode' => 'ODP-A-8',
            'type_item' => 'goods',
            'nama_barang' => 'ODP Indoor 8 Core',
            'keterangan' => 'ODP type Indoor/wall Kap 8 core berikut space pasive spliter (1:8), adapter SC,berikut pelabelan dan penempelan QR code (disediakan oleh Telkom)',
            'satuan' => 'Set',
            'jenis' => 'ODP',
            'stock' => 0
        ]);

        Item::create([
            'id' => 26,
            'kode' => 'ODP-PB-16',
            'type_item' => 'goods',
            'nama_barang' => 'ODP Outdoor 16 Core',
            'keterangan' => 'ODP type outdoor/wall dan Pole Kap 16 core berikut space 2 pasive spliter (1:8), adapter SC,berikut pelabelan',
            'satuan' => 'Set',
            'jenis' => 'ODP',
            'stock' => 0
        ]);

        Item::create([
            'id' => 27,
            'kode' => 'ODP-PB-8',
            'type_item' => 'goods',
            'nama_barang' => 'ODP Outdoor 8 Core',
            'keterangan' => 'ODP type outdoor/wall dan Pole Kap 8 core berikut space pasive spliter (1:8), adapter SC,berikut pelabelan',
            'satuan' => 'Set',
            'jenis' => 'ODP',
            'stock' => 0
        ]);

        Item::create([
            'id' => 28,
            'kode' => 'ODP-PL-16',
            'type_item' => 'goods',
            'nama_barang' => 'ODP Pilar 16 Core',
            'keterangan' => 'ODP ( Pilar ) kap  16 core termasuk pigtail, berikut space 2 splitter (1:8),  pelabelan penempelan QR code (disediakan oleh Telkom)',
            'satuan' => 'Set',
            'jenis' => 'ODP',
            'stock' => 0
        ]);

        Item::create([
            'id' => 29,
            'kode' => 'ODP-PL-8',
            'type_item' => 'goods',
            'nama_barang' => 'ODP Pilar 8 Core',
            'keterangan' => 'ODP ( Pilar ) kap  8 core termasuk pigtail, berikut space 1 splitter (1:8),  pelabelan penempelan QR code (disediakan oleh Telkom)',
            'satuan' => 'Set',
            'jenis' => 'ODP',
            'stock' => 0
        ]);

        Item::create([
            'id' => 30,
            'kode' => 'ODP-Solid-PB-16',
            'type_item' => 'goods',
            'nama_barang' => 'ODP Solid 16 Core',
            'keterangan' => 'ODP type SOLID Kap 16 core adaptor SC/UPC terdiri dari 2 Box Spliter (termasuk 2 spliter 1:8) beserta Accessories, berikut pelabelandan penempelan QR code (disediakan oleh Telkom)',
            'satuan' => 'Set',
            'jenis' => 'ODP',
            'stock' => 0
        ]);

        Item::create([
            'id' => 31,
            'kode' => 'ODP-Solid-PB-8',
            'type_item' => 'goods',
            'nama_barang' => 'ODP Solid 8 Core',
            'keterangan' => 'ODP type SOLID Kap 8 core adaptor SC/UPC terdiri dari 1 Box Spliter (termasuk 1 spliter 1:8), 1 Box Dummy beserta Accessories, berikut pelabelan dan penempelan QR code (disediakan oleh Telkom)',
            'satuan' => 'Set',
            'jenis' => 'ODP',
            'stock' => 0
        ]);

        Item::create([
            'id' => 32,
            'kode' => 'PS-1-16-ODP',
            'type_item' => 'goods',
            'nama_barang' => 'Passive Splitter 1:16',
            'keterangan' => 'Passive Splitter 1:16, type modular SC/UPC, for ODP, termasuk pigtail',
            'satuan' => 'Pcs',
            'jenis' => 'ODP',
            'stock' => 0
        ]);

        Item::create([
            'id' => 33,
            'kode' => 'PS-1-4-ODC',
            'type_item' => 'goods',
            'nama_barang' => 'Passive Splitter 1:4',
            'keterangan' => 'Passive Splitter 1:4, type modular SC/UPC, for ODC, termasuk pigtail ',
            'satuan' => 'Pcs',
            'jenis' => 'ODP',
            'stock' => 0
        ]);

        Item::create([
            'id' => 34,
            'kode' => 'PS-1-8-ODP',
            'type_item' => 'goods',
            'nama_barang' => 'Passive Splitter 1:8',
            'keterangan' => 'Passive Splitter 1:8, type modular SC/UPC, for ODP, termasuk pigtail ',
            'satuan' => 'Pcs',
            'jenis' => 'ODP',
            'stock' => 0
        ]);

        Item::create([
            'id' => 35,
            'kode' => 'PS-1-2-ODP',
            'type_item' => 'goods',
            'nama_barang' => 'Passive Splitter 1:2',
            'keterangan' => 'Passive Splitter 1:2, type modular SC/UPC, for ODP, termasuk pigtail ',
            'satuan' => 'Pcs',
            'jenis' => 'ODP',
            'stock' => 0
        ]);

        Item::create([
            'id' => 36,
            'kode' => 'TC-SM-48',
            'type_item' => 'goods',
            'nama_barang' => 'OTB 46 Core',
            'keterangan' => 'OTB termasuk terminasi dan penyambungan kabel optik Single mode kap 48 core serta Adapter (SC Connector), pigtail dan protection sleeve pada cassette/box ',
            'satuan' => 'Set',
            'jenis' => 'OTB',
            'stock' => 0
        ]);

        Item::create([
            'id' => 37,
            'kode' => 'TC-SM-96',
            'type_item' => 'goods',
            'nama_barang' => 'OTB 96 Core',
            'keterangan' => 'OTB termasuk terminasi dan penyambungan kabel optik Single mode kap 96 core serta Adapter (SC Connector), pigtail dan protection sleeve pada cassette/box',
            'satuan' => 'Set',
            'jenis' => 'OTB',
            'stock' => 0
        ]);

        Item::create([
            'id' => 38,
            'kode' => 'BA-FISH',
            'type_item' => 'goods',
            'nama_barang' => 'BAUT FISHER Sekrup',
            'keterangan' => 'Skrup + fisher untuk pasang rakitan rel/siku dinding tembok plafon',
            'satuan' => 'Pack',
            'jenis' => 'Pipa',
            'stock' => 0
        ]);

        Item::create([
            'id' => 39,
            'kode' => 'CL-PIPE-01',
            'type_item' => 'goods',
            'nama_barang' => 'CLAMP Klem Pipa Conduit',
            'keterangan' => 'CLAMP Klem Pipa Conduit 20mmÂ isi 100',
            'satuan' => 'Pack',
            'jenis' => 'Pipa',
            'stock' => 0
        ]);

        Item::create([
            'id' => 40,
            'kode' => 'DD-HDPE-40-1',
            'type_item' => 'goods',
            'nama_barang' => 'Pipa HDPE',
            'keterangan' => 'Pipa  HDPE  40/33 mm 1 pipa dengan kedalaman 1,5 meter',
            'satuan' => 'Batang',
            'jenis' => 'Pipa',
            'stock' => 0
        ]);

        Item::create([
            'id' => 41,
            'kode' => 'DD-PVC-CON',
            'type_item' => 'goods',
            'nama_barang' => 'Pipa Conduit',
            'keterangan' => 'Pipa Conduit Putih ',
            'satuan' => 'Batang',
            'jenis' => 'Pipa',
            'stock' => 0
        ]);

        Item::create([
            'id' => 42,
            'kode' => 'FLEX-AC',
            'type_item' => 'goods',
            'nama_barang' => 'Selang Flexible',
            'keterangan' => 'Selang Flexible AC Spiral',
            'satuan' => 'Roll',
            'jenis' => 'Pipa',
            'stock' => 0
        ]);

        Item::create([
            'id' => 43,
            'kode' => 'SCK-PIPE',
            'type_item' => 'goods',
            'nama_barang' => 'Sock Pipa Conduit ',
            'keterangan' => 'SOK 20 MM/SOK PIPA CONDUIT 20 MM isi 100',
            'satuan' => 'Pack',
            'jenis' => 'Pipa',
            'stock' => 0
        ]);

        Item::create([
            'id' => 44,
            'kode' => 'TC-02-ODC',
            'type_item' => 'goods',
            'nama_barang' => 'Galvanis atau Riser Pipe',
            'keterangan' => 'Riser Pipe untuk pengaman kabel optik ke ODC Pole / titik naik KU diamater 2 inch  panjang 3 meter',
            'satuan' => 'Batang',
            'jenis' => 'Pipa',
            'stock' => 0
        ]);

        Item::create([
            'id' => 45,
            'kode' => 'PU-AS',
            'type_item' => 'goods',
            'nama_barang' => 'Asesoris Tiang',
            'keterangan' => 'Asesoris tiang eksisting',
            'satuan' => 'Set',
            'jenis' => 'Tiang',
            'stock' => 0
        ]);

        Item::create([
            'id' => 46,
            'kode' => 'PU-S7.0-140',
            'type_item' => 'goods',
            'nama_barang' => 'Tiang Besi 7 Meter',
            'keterangan' => 'Tiang Besi 7 meter, berikut cat & cor pondasi dan assesories dengan kekuatan tarik 140 kg',
            'satuan' => 'Batang',
            'jenis' => 'Tiang',
            'stock' => 0
        ]);

        Item::create([
            'id' => 47,
            'kode' => 'PU-S9.0-140',
            'type_item' => 'goods',
            'nama_barang' => 'Tiang Besi 9 Meter',
            'keterangan' => 'Tiang Besi 9 meter, berikut cat & cor dan assesories dengan kekuatan tarik 140 kg',
            'satuan' => 'Batang',
            'jenis' => 'Tiang',
            'stock' => 0
        ]);

        Item::create([
            'id' => 48,
            'kode' => 'OPM-FO',
            'type_item' => 'tool',
            'nama_barang' => 'Optical Power Meter Fiber Optik',
            'keterangan' => '',
            'satuan' => 'Unit',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 49,
            'kode' => 'OLS',
            'type_item' => 'tool',
            'nama_barang' => 'Optical Light Source Fiber Optik',
            'keterangan' => '',
            'satuan' => 'Unit',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 50,
            'kode' => 'PHONE-TEST',
            'type_item' => 'tool',
            'nama_barang' => 'Phone Test',
            'keterangan' => '',
            'satuan' => 'Unit',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 51,
            'kode' => 'SAFETY-BELT',
            'type_item' => 'tool',
            'nama_barang' => 'Safety Belt / Sabuk Pengaman / Safety Harness',
            'keterangan' => '',
            'satuan' => 'Unit',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 52,
            'kode' => 'TANGGA',
            'type_item' => 'tool',
            'nama_barang' => 'Tangga Teleskopik 5.3M',
            'keterangan' => '',
            'satuan' => 'Unit',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 53,
            'kode' => 'HELM',
            'type_item' => 'tool',
            'nama_barang' => 'Helm USA Merah Fasetrack',
            'keterangan' => '',
            'satuan' => 'Unit',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 54,
            'kode' => 'TANG-PTG',
            'type_item' => 'tool',
            'nama_barang' => 'Tang Potong Kabel 8 Inchi Tekiro',
            'keterangan' => '',
            'satuan' => 'Unit',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 55,
            'kode' => 'VFL-LASER',
            'type_item' => 'tool',
            'nama_barang' => 'Visual Fault Locator 10mWÂ ',
            'keterangan' => '',
            'satuan' => 'Unit',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 56,
            'kode' => 'LC-CLEAN',
            'type_item' => 'tool',
            'nama_barang' => 'One Click Cleaner Pen Cleaner Konektor LC Connector FO',
            'keterangan' => '',
            'satuan' => 'Unit',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 57,
            'kode' => 'CLEAVER-FO',
            'type_item' => 'tool',
            'nama_barang' => 'Cleaver Fiber Optic',
            'keterangan' => '',
            'satuan' => 'Unit',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 58,
            'kode' => 'STRIPPER-FO',
            'type_item' => 'tool',
            'nama_barang' => 'Fiber Optic Stripper',
            'keterangan' => '',
            'satuan' => 'Unit',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 59,
            'kode' => 'DCSTRIP-PLIER',
            'type_item' => 'tool',
            'nama_barang' => 'DC Stripper Plier',
            'keterangan' => '',
            'satuan' => 'Unit',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 60,
            'kode' => 'SPLICER-FO',
            'type_item' => 'tool',
            'nama_barang' => 'COMWAY A3 Fiber Fusion Splicer ',
            'keterangan' => '',
            'satuan' => 'Unit',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 61,
            'kode' => 'OTDR',
            'type_item' => 'tool',
            'nama_barang' => 'Optical Time-Domain Reflectometer',
            'keterangan' => '',
            'satuan' => 'Unit',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 62,
            'kode' => 'KABEL-VALDAT',
            'type_item' => 'tool',
            'nama_barang' => 'Kabel Power USB to Male Plug 4x1.7mm - Black',
            'keterangan' => '',
            'satuan' => 'Pcs',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 63,
            'kode' => 'BATT-VALDAT',
            'type_item' => 'tool',
            'nama_barang' => 'Power Bank 2A',
            'keterangan' => '',
            'satuan' => 'Unit',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 64,
            'kode' => 'SERAGAM-M',
            'type_item' => 'tool',
            'nama_barang' => 'Seragam Indihome M',
            'keterangan' => '',
            'satuan' => 'Pcs',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 65,
            'kode' => 'SERAGAM-L',
            'type_item' => 'tool',
            'nama_barang' => 'Seragam L',
            'keterangan' => '',
            'satuan' => 'Pcs',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 66,
            'kode' => 'SERAGAM-XL',
            'type_item' => 'tool',
            'nama_barang' => 'Seragam Indihome XL',
            'keterangan' => '',
            'satuan' => 'Pcs',
            'jenis' => '',
            'stock' => 0
        ]);

        Item::create([
            'id' => 67,
            'kode' => 'SERAGAM-XXL',
            'type_item' => 'tool',
            'nama_barang' => 'Seragam Indihome XXL',
            'keterangan' => '',
            'satuan' => 'Pcs',
            'jenis' => '',
            'stock' => 0
        ]);
    }
}
