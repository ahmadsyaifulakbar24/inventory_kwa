<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengadaanReviewItem extends Model 
{
    protected $table = 'pengadaan_review_items';

    protected $fillable = [
        'pengadaan_review_id',
        'pengadaan_request_item_id',
        'price'
    ];

    public $timestamps = false;

}
