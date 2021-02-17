<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlkerRequest extends Model 
{
    protected $table = 'alker_request';

    protected $fillable = [
        'alker_id',
        'sto_id',
        'teknisi_id',
        'kegunaan',
        'keterangan_id',
        'front_picture',
        'back_picture',
        'status',
    ];
}
