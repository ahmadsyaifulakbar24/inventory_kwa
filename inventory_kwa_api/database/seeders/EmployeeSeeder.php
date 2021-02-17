<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        DB::table("employees")->insert([
            'nik' => 17020190191,
            'name' => 'Muhammad  Ridwan',
            'status' => 'Single',
            'alamat' => 'Puri Citayam Permai B. 9/10 RT 006 RW 011',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190011,
            'name' => 'Andriansyah  Andriansyah',
            'status' => 'Single',
            'alamat' => 'Kp. Cilangkap RT 005/014 Cilangkap Tapos',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190028,
            'name' => 'Hari  Saprudin',
            'status' => 'Married',
            'alamat' => 'Kp. Nyencle RT 06/012 Cilangkap Tapos kota Depok',
            'no_hp' => 89670149754,
            'email' => 'harisaprudin2@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190024,
            'name' => 'Saepudin  Saepudin',
            'status' => 'Single',
            'alamat' => 'Kp. Nyencle RT 003/001 Cilangkap Tapos Depok',
            'no_hp' => 89688161869,
            'email' => 'saepudin.aput@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190029,
            'name' => 'Stevanus Johanis Lengkong',
            'status' => 'Married',
            'alamat' => 'Bukit Pabuaran Blok K5 no 4 RT 14/17 Pabuaran Cibinong Bogor',
            'no_hp' => 8568183558,
            'email' => 'stev.gold51@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190035,
            'name' => 'Pardamean  Siahaan',
            'status' => 'Single',
            'alamat' => 'Kp. Jatijajar RT 007/007 Jatijajar Tapos',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190042,
            'name' => 'Deddi  Kurniawan',
            'status' => 'Married',
            'alamat' => 'Kp',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190036,
            'name' => 'Muhtar  Mustofa',
            'status' => 'Married',
            'alamat' => 'Kp. Pondok Manggis 002/001 Bojongbaru',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190048,
            'name' => 'Syahril  Pulungan',
            'status' => 'Married',
            'alamat' => 'jl kaften yusuf kp. Cimangglid Rt 01/02 gg. Purnama kec. Taman sari ka',
            'no_hp' => 82279775864,
            'email' => 'Sahrilpulungan1@gmail.Com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190103,
            'name' => 'Irfan  Purnawan',
            'status' => 'Married',
            'alamat' => 'Mekarsari Barat RT 004/017 Mekarsari Tambun Barat',
            'no_hp' => 89604749449,
            'email' => 'Irfanpurnawan729@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190104,
            'name' => 'Burhanuddin  Burhanuddin',
            'status' => 'Married',
            'alamat' => 'Kp. Cikempong RT 004/011 ',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190111,
            'name' => 'Ustman  Affan',
            'status' => 'Married',
            'alamat' => '',
            'no_hp' => NULL,
            'email' => NULL,
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190117,
            'name' => 'Joni  Joni',
            'status' => 'Married',
            'alamat' => 'Kp Bojong Keji RT 002 RW 001 Sukagalih Megamendung',
            'no_hp' => 895411942,
            'email' => 'anjanianjani57335@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020170007,
            'name' => 'Mohamad Tri Sutrisno',
            'status' => 'Married',
            'alamat' => 'Cimpaeun RT 001/013 Tapos',
            'no_hp' => 81380466123,
            'email' => 'navyasaharsutrisno@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190129,
            'name' => 'Ijul  Fitriyadi',
            'status' => 'Single',
            'alamat' => 'Jl. Holtikultura RT 008/006 Kel. Jatipadang',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702900139,
            'name' => 'Aria Rahman Putra',
            'status' => 'Single',
            'alamat' => 'Komp. BPN Blok B/1 RT 006/007',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190161,
            'name' => 'Saliyo  Saliyo',
            'status' => 'Married',
            'alamat' => 'Jl. Ranca Bentang RT 003/ RW 013 . Cibeureum',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702900143,
            'name' => 'Dedin  Fajaryanto',
            'status' => 'Single',
            'alamat' => 'Jl. Persahaban Cikumpa Rt 01/10',
            'no_hp' => 89655193080,
            'email' => 'DedinFajar23@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190144,
            'name' => 'Hendri  Kencana',
            'status' => 'Single',
            'alamat' => 'Jl. Kemang Swatama Rt. 02 Rw 06 Kec. Cilodong',
            'no_hp' => 89616717920,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190145,
            'name' => 'Abdul  Aziz',
            'status' => 'Single',
            'alamat' => 'Jl. Pondok Manggis Rt 02 Rw 04 Bojong Gede',
            'no_hp' => 89506811279,
            'email' => 'Azis57828@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702900146,
            'name' => 'Rohman  Hidhayah',
            'status' => 'Single',
            'alamat' => 'Komp. DIT BRKANG Rt 02 Rw 05',
            'no_hp' => 87788249726,
            'email' => 'rohmanhidhayah@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190148,
            'name' => 'Dimas  Hermawan',
            'status' => 'Single',
            'alamat' => 'Cilangkap',
            'no_hp' => 85217787936,
            'email' => 'dh3996576@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702900150,
            'name' => 'Ibnu  Kurniawan',
            'status' => 'Single',
            'alamat' => 'Kp. Cihideng Kecil',
            'no_hp' => 89663113909,
            'email' => 'ibnukurniawan323@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190151,
            'name' => 'Nurrahman  Nurrahman',
            'status' => 'Single',
            'alamat' => 'Cilodong',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702900152,
            'name' => 'Bimo  Pakisworo',
            'status' => 'Single',
            'alamat' => 'Villa Ciomas Indah Blok K4 No. 12A',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702900153,
            'name' => 'Muhammad  Ramadhan',
            'status' => 'Single',
            'alamat' => 'Kp. Cihideung Kecil RT002/RW004',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190154,
            'name' => 'Guntur Indra Laksana',
            'status' => 'Single',
            'alamat' => 'Cilodong',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702900155,
            'name' => 'Kresna Bayu Fikriansyah',
            'status' => 'Single',
            'alamat' => 'Jl. Damai IV RT 006/002',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702900157,
            'name' => 'Ismi  Harif',
            'status' => 'Single',
            'alamat' => 'Jl. Kota Baru RT 002/RW 009 ',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702900158,
            'name' => 'Simson Petrus Munte',
            'status' => 'Single',
            'alamat' => 'Griya Bukit Jaya Blok M13/05',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702900159,
            'name' => 'Ahmad  Sugiaditya',
            'status' => 'Single',
            'alamat' => 'Cilodong',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702700070,
            'name' => 'Mohamad Bayu Gelar',
            'status' => 'Single',
            'alamat' => 'Kp. Cikereteg RT 001/004 Ciderum. Caringin',
            'no_hp' => 85710061009,
            'email' => 'bayugelar@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190044,
            'name' => 'Krisna  Ardiansyah',
            'status' => 'Single',
            'alamat' => 'Kp. Bali Matraman RT 013/001',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702190091,
            'name' => 'Kristian  Sakti',
            'status' => 'Single',
            'alamat' => 'Parungbingung RT 003/010 Rangkapan Jaya Baru ',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702190110,
            'name' => 'Fauzi  Rahman',
            'status' => 'Single',
            'alamat' => 'Mampang RT 001/009 Pancoran Mas',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190199,
            'name' => 'Rifal  Firdaus',
            'status' => 'Single',
            'alamat' => 'Jatijajar RT 005/003 Tapos',
            'no_hp' => 8,
            'email' => 'Keishaananda057@yahoo.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190137,
            'name' => 'Muhamad Rizkia Par\'i',
            'status' => 'Single',
            'alamat' => 'Kp. Pabuaran RT 003 RW 009 Cicadas',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702190140,
            'name' => 'Suwandi  Suwandi',
            'status' => 'Married',
            'alamat' => 'Kp. Surupan RT 001/005',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702019015,
            'name' => 'Abdul Hasan Maulana',
            'status' => 'Single',
            'alamat' => 'Kp. Batok RT 006/ RW 002',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702190162,
            'name' => 'Ahmad  Aqshal',
            'status' => 'Single',
            'alamat' => 'Kp. Muara RT 001/003 Sindangrasa',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190018,
            'name' => 'Rohmat  Rohmat',
            'status' => 'Single',
            'alamat' => '',
            'no_hp' => NULL,
            'email' => NULL,
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190172,
            'name' => 'Guntur  Cahyono',
            'status' => 'Married',
            'alamat' => 'Cempaka VI No.35 RT 004/RW 003',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190173,
            'name' => 'DWI  KUNNANDA',
            'status' => 'Single',
            'alamat' => 'Bangetayu Wetan RT 003/RW 002',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190174,
            'name' => 'EDI  HERMAWAN',
            'status' => 'Single',
            'alamat' => 'Gerjen RT 005/RW 002',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702190164,
            'name' => 'Ade Reza Setiawan',
            'status' => 'Single',
            'alamat' => 'Cilodong',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190165,
            'name' => 'Diaz  Bagaswanto',
            'status' => 'Single',
            'alamat' => 'Kp. Sidamukti Rt 03/10 No. 35 Kel. Sukamaju Kec. Cilodong Kota Depok',
            'no_hp' => 8569028398,
            'email' => 'diaz.bagaswanto@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702190166,
            'name' => 'Alimansah  Alimansah',
            'status' => 'Single',
            'alamat' => 'Sidamukti RT 004/ RW 003',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702190167,
            'name' => 'Fahry  Ramadhan',
            'status' => 'Single',
            'alamat' => 'Perum Kalibaru Permai',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190179,
            'name' => 'Sahril  Sahril',
            'status' => 'Single',
            'alamat' => 'Cilodong RT 04 RW 05 Kel.kalibaru Kec.cilodong Depok',
            'no_hp' => 81297123054,
            'email' => 'Sahriljoy21@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190178,
            'name' => 'Gowo Rizki Aritonang',
            'status' => 'Single',
            'alamat' => 'Kp.manggah rt 002/012 Depok',
            'no_hp' => 85697774512,
            'email' => 'Gowoarios1993@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020170097,
            'name' => 'PUTRI EKA SAFITRI',
            'status' => 'Single',
            'alamat' => 'Lingkungan cipayung gg swadaya raya kel.abadijaya kec. Sukmajaya rt 0',
            'no_hp' => 85889275930,
            'email' => 'esyahekaputri@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190181,
            'name' => 'Andrianto  Andrianto',
            'status' => 'Single',
            'alamat' => 'Kp. Kedung Jiwa RT 05 RW 06 Kel. Kedungwaringin Kec. Bojong Gede',
            'no_hp' => 8997027630,
            'email' => 'garrachuda117@yahoo.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190018,
            'name' => 'Mohamad Repi Saftiandi',
            'status' => 'Single',
            'alamat' => 'Desa pasir jambu RT 006 RW 001 Pangkalan 4 Kab. Bogor',
            'no_hp' => 89601613436,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190183,
            'name' => 'Dendra  Setyadi',
            'status' => 'Single',
            'alamat' => 'Jl.Haji Dmun Raya Rt.003/Rw.024 Kel.Sukamaju Kec.Cilodong Depok Jawa B',
            'no_hp' => 89681769160,
            'email' => 'dendrasetyadi@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190182,
            'name' => 'Rudy Rudolf Sengkey',
            'status' => 'Married',
            'alamat' => 'Jln. Kranji timur',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190184,
            'name' => 'Projo  Naryono',
            'status' => 'Married',
            'alamat' => 'Kp.Cikempong Rt.002/Rw.011 Kel.Pakansari Kec.Cibinong Bogor',
            'no_hp' => 8,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190185,
            'name' => 'Rahmat  Ramadani',
            'status' => 'Married',
            'alamat' => 'Taman Raya Citayam Blok E.3 No.39 Rt.007/Rw.012 Ds.Rawa Panjang Kec.Bo',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190186,
            'name' => 'Tony  Bahriyanto',
            'status' => 'Married',
            'alamat' => 'Turunan Rt.03 Rw. 03 Gentan Kec. Susukan Kab. Semarang',
            'no_hp' => 82332941378,
            'email' => 'tonybahriyanto@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190187,
            'name' => 'Fendi  Pratama',
            'status' => 'Single',
            'alamat' => 'Clapar Purwodadi Tegalrejo Magelang',
            'no_hp' => 85710945782,
            'email' => 'fendipratama800@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702190191,
            'name' => 'Andreza Setya Putra',
            'status' => 'Single',
            'alamat' => 'Jln raya wangung kp lebak kongsi rt 1/7 Kel.Sindangsari Kec.Kota Bogor',
            'no_hp' => 83811168609,
            'email' => 'reza.rk202@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702190094,
            'name' => 'Firdaus  Firdaus',
            'status' => 'Married',
            'alamat' => 'Kp.Sidamukti Rt.001/Rw.019 Kel.Sukamaju Kec.Cilodong Depok',
            'no_hp' => 89636554737,
            'email' => 'firdaus180183@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190096,
            'name' => 'Muhamad  Ariansyah',
            'status' => 'Single',
            'alamat' => 'KP.KEDUNG JIWA RT 05/06 KEDUNG WARINGIN (BOJONG GEDE)',
            'no_hp' => 8,
            'email' => 'putrisilvana0@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190097,
            'name' => 'Bahari Dody Alfaid',
            'status' => 'Single',
            'alamat' => 'Komplek pabuaran',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190198,
            'name' => 'DIKI GERI GUNAWAN',
            'status' => 'Single',
            'alamat' => 'CILODONG RT.003/Rw.002 Kel.Kalibaru Kec.Cilodong Depok Jawa Barat',
            'no_hp' => 89652403063,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190200,
            'name' => 'Vhicy Septian Dwi Surya',
            'status' => 'Single',
            'alamat' => 'komplek inkopad blok L 4 no 1 rt 001/007 desa sasak PANJANG kec.tajur',
            'no_hp' => 85213776555,
            'email' => 'vickyseptian117@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190201,
            'name' => 'Andhika Yoga Priatama',
            'status' => 'Single',
            'alamat' => 'kp.bojong puspanegara 04 ',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190202,
            'name' => 'Andri  Surahman',
            'status' => 'Single',
            'alamat' => 'kp.bojong rt 03/07 puspanegara citeureup bogor',
            'no_hp' => 82113831639,
            'email' => 'bondray24coy@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190204,
            'name' => 'Muhamad Rasyiid Perdana',
            'status' => 'Single',
            'alamat' => 'kp.bojong puspanegara rt.06 rw.07 citeureup-bogor',
            'no_hp' => 85811053205,
            'email' => 'rasyidmuhamad49@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190205,
            'name' => 'FIRMANSYAH  FIRMANSYAH',
            'status' => 'Single',
            'alamat' => 'KP. BOJONG RT 04/07 Bogor',
            'no_hp' => 83893681835,
            'email' => 'firman123702@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190207,
            'name' => 'JONO  JONO',
            'status' => 'Married',
            'alamat' => 'GRIYA BUKIT JAYA 2 BLOK E13 NO 03A RT/RW 006/001 TLAJUNG UDIK',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190210,
            'name' => 'DWIKY WAHYU GURITNO',
            'status' => 'Single',
            'alamat' => 'Kp. Bojong rt07/07 kec. Citeureup kab. Bogor',
            'no_hp' => 8889821802,
            'email' => 'katakata9140@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190211,
            'name' => 'Sendi  Ardiansyah',
            'status' => 'Single',
            'alamat' => 'Kp. Bojong RT 05/08 Kec. Citeureup Kab. Bogor',
            'no_hp' => 85694010335,
            'email' => 'sendiardiansyah1407@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190212,
            'name' => 'Yogi  Zakaria',
            'status' => 'Single',
            'alamat' => 'Gang.Nangka Rt02/02 karang asem timur kec.citeureup kab.bogor',
            'no_hp' => 89501212575,
            'email' => 'yogizakaria5@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190209,
            'name' => 'Eka  Pratama',
            'status' => 'Single',
            'alamat' => 'Kp.Bojong Rt 03 Rw 07 Citeureup',
            'no_hp' => 82298090282,
            'email' => 'ekaaeb0543@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 1702190213,
            'name' => 'Faiz Akbar Mufassir',
            'status' => 'Single',
            'alamat' => 'antariksa permai blok d5 no.3a',
            'no_hp' => 89608768274,
            'email' => 'akbarfaiz299@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190214,
            'name' => 'Izul Kurnia Arrahman',
            'status' => 'Single',
            'alamat' => 'Jl. Karanggan muda Rt 03/01',
            'no_hp' => 89605626680,
            'email' => 'izulkurniaarrahman@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190215,
            'name' => 'Mohamad Dicky Fernando',
            'status' => 'Single',
            'alamat' => 'Kp. Cimpaeun RT 02/06 Kel. Cimpaeun Kec. TAPOS',
            'no_hp' => 8786818341,
            'email' => 'dicky.fernando383@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190216,
            'name' => 'Erlangga Rizky Varezy',
            'status' => 'Single',
            'alamat' => 'Graha Puspasari 1 JL. Puspanegara NO. 8 RT 02/14 Citeureup',
            'no_hp' => 89614509541,
            'email' => 'langgarocker@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190217,
            'name' => 'Farhan Nur Shiddiq',
            'status' => 'Single',
            'alamat' => 'desa sanja Rt 02/01 kec. Citeureup',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190218,
            'name' => 'Adi  Hanawan',
            'status' => 'Single',
            'alamat' => 'Jl.Sirkuit Sentul',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190219,
            'name' => 'Ilham  Firdaus',
            'status' => 'Single',
            'alamat' => 'Kp.Tegal Rt07/09 Citeureup Bogor',
            'no_hp' => 81290898340,
            'email' => 'ifirdaus221@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190220,
            'name' => 'Rifky Jerzy Hizrotul',
            'status' => 'Single',
            'alamat' => 'perum tatya asri',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190221,
            'name' => 'Dimas  Nugroho',
            'status' => 'Single',
            'alamat' => 'Kp.Kedep Rt/Rw :002/021 Kel.Tlajung Udik Kec.Gunung Putri',
            'no_hp' => 81297643441,
            'email' => 'dimaskedep46@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190222,
            'name' => 'Mario Wahyu Anindito',
            'status' => 'Single',
            'alamat' => 'Griya Alam Sentul Block C7 No.7',
            'no_hp' => 82297656365,
            'email' => 'mariowahyu257@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190223,
            'name' => 'Gilang Wahyu Rizky Pratama',
            'status' => 'Single',
            'alamat' => 'Jl.Prum Griya Estatika II Blok A2 No.25 RT 007/002',
            'no_hp' => 8568408813,
            'email' => 'gilangwrpidco@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190224,
            'name' => 'YAYAN  ASMIYAN',
            'status' => 'Married',
            'alamat' => 'Kedung Halang rt.006/rw.008 kel.Kedung halang Kec.Kota Bogor Utara',
            'no_hp' => 85781066377,
            'email' => 'marsonomarsono831@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020170202,
            'name' => 'Junaidi  Junaidi',
            'status' => 'Single',
            'alamat' => 'Jln.Kh.An-Nawawi',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190225,
            'name' => 'Andi  Rahmadi',
            'status' => 'Married',
            'alamat' => 'cileksa Utara',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190226,
            'name' => 'Yana  Radiyana',
            'status' => 'Single',
            'alamat' => 'kebon kopi.RT 04.RW 09 Kel.Kebonkelapa Kec.Kota Bogor Tengah',
            'no_hp' => 85717025231,
            'email' => 'adityayans@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190227,
            'name' => 'Rachmat Whyradharma Abadidja',
            'status' => 'Married',
            'alamat' => 'Kebon Kopi Rt.005/Rw.009 Kel.Kebonkelapa Kec. Kota Bogor Tengah',
            'no_hp' => 89501018785,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190228,
            'name' => 'Rafli  Ismail',
            'status' => 'Single',
            'alamat' => 'Dusun Jembatan 1 rt/rw 001/001 kec.Citeureup kab. Bogor',
            'no_hp' => 83807097258,
            'email' => 'rafli456456@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190229,
            'name' => 'Ryan  Alfiansyah',
            'status' => 'Single',
            'alamat' => 'kp. Pondok manggis rt03/01 desa bojong baru kec. Bojonggede',
            'no_hp' => 6,
            'email' => 'ryankuro94@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190235,
            'name' => 'Rafli Aulia Hafiz',
            'status' => 'Single',
            'alamat' => 'Perumahan Cibinong City Blok C no 12',
            'no_hp' => 87741346810,
            'email' => 'rafliaulia4@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190231,
            'name' => 'Topan  Iqbal',
            'status' => 'Single',
            'alamat' => 'Desa Pasir Jambu',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190232,
            'name' => 'Yeri Chikal Persada',
            'status' => 'Single',
            'alamat' => 'Jl.Swadarma Raya Rt05 RW 05 Blok E No 10',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190233,
            'name' => 'Ahmad  Jayadi',
            'status' => 'Married',
            'alamat' => 'kp.kaumsari rt rw 002/005 Cibuluh',
            'no_hp' => 8970236509,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190234,
            'name' => 'Caca  Suryadi',
            'status' => 'Married',
            'alamat' => 'kp.ceger rt rw 001/011 Kel.Tegalgundil Kec.Kota Bogor Utara',
            'no_hp' => 8,
            'email' => 'cacasuryadi65@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190257,
            'name' => 'Irkham Muhamad Sayuti',
            'status' => NULL,
            'alamat' => 'Dusun Kebon Kopi Rt01/09 Desa Puspasari Kec Citeureup',
            'no_hp' => 87745424499,
            'email' => 'irkham.ms1995@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190262,
            'name' => 'Andri Taufik Mulyana',
            'status' => 'Single',
            'alamat' => 'Mutiara gading timur Blok C 12/2 RT 002/RW 024',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190258,
            'name' => 'Lukmanul  Hakim',
            'status' => NULL,
            'alamat' => 'kpg.leungsir rt.002/008 Kel.Sukanegara Kec. Jonggol Bogor Jawa Barat',
            'no_hp' => 81381051211,
            'email' => 'alfiansyah141414@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190237,
            'name' => 'Angga Agung Wijanto',
            'status' => 'Single',
            'alamat' => 'Kp. Cikempong Rt 02/011 Kec. Cibinong Kel. Pakansari Kab. Bogor',
            'no_hp' => 8,
            'email' => 'anggoy1305@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190243,
            'name' => 'Syahronih  Syahronih',
            'status' => NULL,
            'alamat' => 'kp.pondok mangis Rt02Rw01 Bojong baru Bogor Jawa Barat',
            'no_hp' => 89634832363,
            'email' => 'aqilpadilah@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190249,
            'name' => 'Muhamad  Rizki',
            'status' => 'Single',
            'alamat' => 'kp. Pabuaran rt04 rw02 Desa Cimandala',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190269,
            'name' => 'Mohammad Yusuf Manchor',
            'status' => 'Single',
            'alamat' => 'Kp. Cibuyutan RT 001/RW 008',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190270,
            'name' => 'Ardiansyah  Daulay',
            'status' => 'Married',
            'alamat' => 'Kp. Bojonggede Timur',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190264,
            'name' => 'Apriyan Visnu Wardani',
            'status' => 'Single',
            'alamat' => 'Sidamukti RT 005/RW 003',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190268,
            'name' => 'Dede  Sulaeman',
            'status' => 'Married',
            'alamat' => 'Kp. Sanja RT 005/001',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190267,
            'name' => 'Agung Dwi Risanto',
            'status' => 'Single',
            'alamat' => 'Perum Bukit Putra Blok E3 No. 12 RT 003/RW 010',
            'no_hp' => 83818162615,
            'email' => 'Welehagung1521@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190281,
            'name' => 'Ahmad  Hidayat',
            'status' => 'Married',
            'alamat' => 'Cisalak Pasar RT 003 RW 003',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190280,
            'name' => 'Roby  Sinpar',
            'status' => 'Married',
            'alamat' => 'Kp. Cilangkap RT 003 RW 018',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190279,
            'name' => 'Singgih Surtiawan Pamungkas',
            'status' => 'Married',
            'alamat' => 'Jl.swadaya 005/003 cisalak pasar cimanggis depok',
            'no_hp' => 85697829918,
            'email' => 'gueajja79@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190278,
            'name' => 'Muhammad  Nasri',
            'status' => 'Married',
            'alamat' => 'Cisalak Pasar RT 004 RW 003',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190277,
            'name' => 'Budi  Santoso',
            'status' => 'Married',
            'alamat' => 'Jln Bulak duren Rt 06/03 .no 5A cimanggis depok',
            'no_hp' => 89674586024,
            'email' => 'budi46711@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190276,
            'name' => 'Gerald Restu Nandika',
            'status' => 'Married',
            'alamat' => 'Cisalak Pasar RT 004 RW 003',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190275,
            'name' => 'Eko  Suprianto',
            'status' => 'Married',
            'alamat' => 'Kp. Babakan RT 003 RW 024',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190272,
            'name' => 'Maulana  Yusup',
            'status' => 'Single',
            'alamat' => 'Kp. Cibogo II RT 005 RW 006',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190271,
            'name' => 'Jefri Yuswir Putra',
            'status' => 'Single',
            'alamat' => 'Kp. Tegal Pasir Ipis Rt 003 RW 008',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190241,
            'name' => 'Asep  Saepul',
            'status' => 'Single',
            'alamat' => 'Kp. Leuwinutug rt.003/rw.002 Ds. Leuwinutug Kac. Citeureup Kab. Bogor',
            'no_hp' => 89649371559,
            'email' => 'asep13500@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190283,
            'name' => 'Nur Fadli Abdilah',
            'status' => NULL,
            'alamat' => 'Kp. Nyencle RT 003 RW 012',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190274,
            'name' => 'Asep  Sunandar',
            'status' => 'Single',
            'alamat' => 'Kp. Pasir Angin Gadog',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190297,
            'name' => 'Rifqi Dwi Putra',
            'status' => 'Single',
            'alamat' => 'Pekayon RT 005 RW 002',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190287,
            'name' => 'Nurrogo  Wahyu',
            'status' => 'Single',
            'alamat' => 'kp. Babakan RT.03/RW.024 Sukatani Tapos Depok',
            'no_hp' => 85716408337,
            'email' => 'nurrogodjati81@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190289,
            'name' => 'Andhika Setya Mohamad',
            'status' => 'Single',
            'alamat' => 'Cimanggu Hejo No. C2 RT 004 RW 016',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190292,
            'name' => 'Nurhasan  Nurhasan',
            'status' => 'Married',
            'alamat' => 'Jl. Maliki 1',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190293,
            'name' => 'Muladi Enjelo Thomas',
            'status' => 'Single',
            'alamat' => 'Kp. Cilangkap RT 003 RW 017',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190294,
            'name' => 'Donny  Saputra',
            'status' => 'Single',
            'alamat' => 'Kp Cilangkap RT 01/03 Tapos',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190295,
            'name' => 'Aep Yuyu Ramdani',
            'status' => 'Single',
            'alamat' => 'Kp. Bojong RT 007 RW 007',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190287,
            'name' => 'Maman  Suryana',
            'status' => 'Married',
            'alamat' => '',
            'no_hp' => NULL,
            'email' => NULL,
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190291,
            'name' => 'Saputra  Saputra',
            'status' => 'Married',
            'alamat' => 'Jl. Danau Batur V No. 135 RT 005 RW 005',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190298,
            'name' => 'Andriansyah  15',
            'status' => 'Married',
            'alamat' => 'Palsigunung rt 03/01 no 30',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190299,
            'name' => 'Suhandri  Suhandri',
            'status' => 'Married',
            'alamat' => 'Jl. Wijaya 2 RT 004 RW 006',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190300,
            'name' => 'Andika  Widianto',
            'status' => 'Single',
            'alamat' => 'Ds.Cijujung Jl.Alkarimah Rt.04 Rw.13 Kec.Sukaraja Kab.Bogor no.44',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190301,
            'name' => 'Heriansyah  Heriansyah',
            'status' => NULL,
            'alamat' => 'Cisalak pasar No : 67 RT/002 RW/004',
            'no_hp' => 8,
            'email' => 'Dowerajjah@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190303,
            'name' => 'Endang  Priyatna',
            'status' => 'Single',
            'alamat' => 'Kp.bojong puspanegara rt3/rw7 kecamatan: citeureup',
            'no_hp' => 8,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190304,
            'name' => 'Mochamad  Marsan',
            'status' => 'Married',
            'alamat' => 'Kp. Kramat RT 006 RW 004',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190305,
            'name' => 'Miftah Zafran Irwan',
            'status' => 'Single',
            'alamat' => 'padurenan 02/07 kel.pabuaran kec.cibinong Kab.Bogor Indonesia',
            'no_hp' => 81388056557,
            'email' => 'miftahzafran@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190306,
            'name' => 'Hasanih  Hasan',
            'status' => 'Married',
            'alamat' => 'cisalak pasar RT 004/03',
            'no_hp' => 0,
            'email' => 'hsnhasanih@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190307,
            'name' => 'Feby Dika Ramadhan',
            'status' => NULL,
            'alamat' => 'Jl.Koja RT 004 RW 003 cisalak pasar',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190308,
            'name' => 'Muhamad  Wahyudi',
            'status' => 'Married',
            'alamat' => 'Jl. Cisalak pasar Koja rt 05/03',
            'no_hp' => 0,
            'email' => 'wahyubabe111@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190309,
            'name' => 'Ahmad Fahrizal Juniardi',
            'status' => 'Single',
            'alamat' => 'Jl. Koja RT 04/03 Cisalak Pasar',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190310,
            'name' => 'Harry Tri Setiawan',
            'status' => 'Single',
            'alamat' => 'Perum Pondok Cileungsi Permai',
            'no_hp' => 0,
            'email' => '',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190302,
            'name' => 'Mochamad  Syaifulloh',
            'status' => 'Married',
            'alamat' => 'Jln. Ampel no. 20 Rt. 004/006 Lubang buaya cipayung Jakarta Timur',
            'no_hp' => 81212100736,
            'email' => 'm.syaifullohLXXIII@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190316,
            'name' => 'HAMDAN FADHIL MAULANA',
            'status' => NULL,
            'alamat' => '',
            'no_hp' => 85773057761,
            'email' => 'hamdan.fadhil.90@gmail.com',
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190318,
            'name' => 'Gumelar  Ramadhan',
            'status' => NULL,
            'alamat' => '',
            'no_hp' => NULL,
            'email' => NULL,
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190324,
            'name' => 'Yadih  Suryadih',
            'status' => NULL,
            'alamat' => '',
            'no_hp' => NULL,
            'email' => NULL,
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190325,
            'name' => 'Hengky Anggoro Yuniarto',
            'status' => NULL,
            'alamat' => '',
            'no_hp' => NULL,
            'email' => NULL,
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190314,
            'name' => 'Yahya  Yahya',
            'status' => NULL,
            'alamat' => '',
            'no_hp' => NULL,
            'email' => NULL,
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190313,
            'name' => 'Abdul  Rozak',
            'status' => NULL,
            'alamat' => '',
            'no_hp' => NULL,
            'email' => NULL,
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        DB::table("employees")->insert([
            'nik' => 17020190349,
            'name' => 'Muhammad  Rejeki',
            'status' => NULL,
            'alamat' => '',
            'no_hp' => NULL,
            'email' => NULL,
            'jabatan_id' => 29,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);
    }
}
