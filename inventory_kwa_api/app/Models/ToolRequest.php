<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolRequest extends Model 
{
    protected $table = 'tool_requests';

    protected $fillable = [
        'user_id',
        'item_id',
        'nik_teknisi',
        'jenis',
        'keterangan',
        'front_picture',
        'back_picture',
        'status'
    ];
}
