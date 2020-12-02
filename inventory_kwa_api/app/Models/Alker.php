<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alker extends Model 
{
    protected $table = 'alker';

    protected $fillable = [
        'main_alker_id',
        'kode_alker',
        'status'
    ];

    public function main_alker() 
    {
        return $this->belongsTo('App\Models\MainAlker', 'main_alker_id');
    }

    public function detail_alker()
    {
        return $this->hasOne('App\Models\DetailAlker', 'alker_id');
    }
}
