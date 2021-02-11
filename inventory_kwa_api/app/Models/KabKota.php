<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KabKota extends Model 
{
    protected $table = 'kab_kota';

    protected $fillable = [
        'provinsi_id',
        'kab_kota',
        'type',
        'ibu_kota'
    ];

    public $timestamps = false;

    public function provinsi()
    {
        return $this->belongsTo('App\Models\Provinsi', 'provinsi_id');
    }

}
