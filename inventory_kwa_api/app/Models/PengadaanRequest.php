<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengadaanRequest extends Model 
{
    protected $table = 'pengadaan_requests';

    protected $fillable = [
        'code',
        'user_id',
        'jenis_pengadaan_id'
    ];

    public function pengadaan_request_item()
    {
        return $this->hasMany(PengadaanRequestItem::class, 'pengadaan_request_id');
    }

    public function jenis_pengadaan()
    {
        return $this->belongsTo(Param::class, 'jenis_pengadaan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
