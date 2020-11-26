<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model 
{
    protected $table = 'items';
    
    protected $fillable = [
        'kode',
        'nama_barang',
        'keterangan',
        'satuan',
        'jenis',
        'stock'
    ];

    public $timestamps = false;

    public function project()
    {
        return $this->belongsToMany('App\Models\Project', 'project_items', 'item_id', 'project_id')->withPivot('is');
    }

    public function project_items()
    {
        return $this->hasMany('App\Models\ProjectItem', 'item_id');
    }

    public function item_tool_request()
    {
        return $this->hasMany('App\Models\ToolRequest', 'item_id');
    }

    public function teknisi_tool_request()
    {
        return $this->hasMany('App\Models\ToolRequest', 'teknisi_id');
    }

    public function keterangan_tool_request()
    {
        return $this->hasMany('App\Models\ToolRequest', 'keterangan_id');
    }
}
