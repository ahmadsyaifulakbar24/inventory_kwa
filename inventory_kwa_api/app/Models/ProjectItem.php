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
        'status'
    ];
}
