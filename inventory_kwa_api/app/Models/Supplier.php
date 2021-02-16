<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model 
{
    protected $table = 'suppliers';

    protected $fillable = [
        'id',
        'name',
        'type',
        'contact'
    ];

    public function pengadaan_review()
    {
        return $this->hasMany(PengadaanReview::class, 'supplier_id');
    }

}
