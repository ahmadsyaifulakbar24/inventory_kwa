<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainAlker extends Model 
{
    protected $table = 'main_alker';

    protected $fillable = [
        'kode_main_alker',
        'nama_barang',
        'satuan'
    ];

    public $timestamps = false;
}
