<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengadaanReview extends Model 
{
    protected $table = 'pengadaan_reviews';

    protected $fillable = [
        'code',
        'supplier_id',
        'url',
        'first_approved_at',
        'second_approved_at',
        'status',
    ];

    public function pengadaan_review_item()
    {
        return $this->hasMany(PengadaanReviewItem::class, 'pengadaan_review_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }

    public function  pengadaan_review_file()
    {
        return $this->hasMany(PengadaanReviewFile::class, 'pengadaan_review_id');
    }
}
