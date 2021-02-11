<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailAlker extends Model 
{
    protected $table = 'detail_alker';

    protected $fillable = [
        'sto_id',
        'teknisi_id',
        'kegunaan'
    ];

    public function alker()
    {
        return $this->hasOne('App\Models\Alker', 'alker_id');
    }

    public function sto()
    {
        $this->belongsTo('App\Models\Param', 'sto_id');
    }

    public function teknisi()
    {
        $this->belongsTo('App\Models\Employee', 'teknisi_id');
    }
}
