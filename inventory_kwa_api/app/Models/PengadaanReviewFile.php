<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengadaanReviewFile extends Model 
{
    protected $table = 'pengadaan_review_files';

    protected $fillable = [
        'pengadaan_review_item_id',
        'type_file_id',
        'file'
    ];

    public function pengadaan_review()
    {
        return $this->belongsTo(PengadaanReview::class, 'pengadaan_review_id');
    }

    public function  type_file()
    {
        return $this->belongsTo(Param::class, 'type_file_id');
    }

}