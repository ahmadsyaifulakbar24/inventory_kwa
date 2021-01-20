<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectItem extends Model 
{
    protected $table = 'project_items';

    protected $fillable = [
        'project_id',
        'item_id',
        'quantity',
        'status',
        'category',
        'supplier_id',
        'image1',
        'image2',
        'url',
        'date_approved'
    ];

    public function item()
    {
        return $this->belongsTo('App\Models\Item', 'item_id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier', 'supplier_id');
    }
}
