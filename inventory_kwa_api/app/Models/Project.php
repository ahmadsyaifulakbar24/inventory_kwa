<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model 
{
    protected $table = 'projects';

    protected $fillable = [
        'user_id',
        'project_name'
    ];

    public function project_items()
    {
        return $this->hasMany('App\Models\ProjectItem', 'project_id');
    }
    // public function items()
    // {
    //     return $this->belongsToMany('App\Models\Item', 'project_items', 'project_id', 'item_id')->withPivot('id');
    // }
}
