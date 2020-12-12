<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryAlker extends Model 
{
    protected $table = 'history_alker';

    protected $fillable = [
        'alker_id',
        'alker_request_id',
        'status'
    ];
}
