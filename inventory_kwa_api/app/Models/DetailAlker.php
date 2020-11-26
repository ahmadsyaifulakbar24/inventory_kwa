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
}
