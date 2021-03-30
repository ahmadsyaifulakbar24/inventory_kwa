<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model 
{
    protected $table = 'projects';

    protected $fillable = [
        'user_id',
        'project_name',
        'provinsi_id',
        'kab_kota_id',
        'kecamatan'
    ];

    public function items()
    {
        return $this->belongsToMany('App\Models\Item', 'project_items', 'project_id', 'item_id')->withPivot('id', 'quantity', 'status', 'category', 'image1', 'image2', 'url', 'date_approved', 'created_at');
    }

    public function provinsi()
    {
        return $this->belongsTo('App\Models\Provinsi', 'provinsi_id');
    }

    public function kab_kota()
    {
        return $this->belongsTo('App\Models\KabKota', 'kab_kota_id');
    }
}
