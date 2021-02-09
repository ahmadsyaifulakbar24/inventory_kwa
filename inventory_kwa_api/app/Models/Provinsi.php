<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model 
{
    protected $table = 'provinsi';

    protected $fillable = [
        'provinsi'
    ];

    public $timestamps = false;

    public function kab_kota()
    {
        return $this->hasMany('App/Models/KabKota', 'provinsi_id');
    }
}
