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

    public function pengadaan_review()
    {
        return $this->belongsTo(PengadaanReview::class, 'pengadaan_review_id');
    }

    public function  pengadaan_request_item()
    {
        return $this->belongsTo(PengadaanRequestItem::class, 'pengadaan_request_item_id');
    }
}
