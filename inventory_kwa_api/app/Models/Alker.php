<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alker extends Model 
{
    protected $table = 'alker';

    protected $fillable = [
        'main_alker_id',
        'kode_alker'
    ];
}
