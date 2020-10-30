<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model 
{
    protected $table = 'items';
    
    protected $fillable = [
        'kode',
        'type_item',
        'nama_barang',
        'keterangan',
        'satuan',
        'jenis',
        'stock'
    ];
}
