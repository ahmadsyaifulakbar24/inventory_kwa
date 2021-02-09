<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengadaanReview extends Model 
{
    protected $table = 'pengadaan_reviews';

    protected $fillable = [
        'code',
        'supplier_id',
        'status',
    ];

}
