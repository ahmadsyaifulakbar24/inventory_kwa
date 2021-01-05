<?php

namespace App\Http\Controllers\MainAlker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Alker\MainAlkerResource;
use App\Models\MainAlker;

class GetMainAlkerController extends Controller
{
    public function __construct()
    {
        //
    }

    public function get_all()
    {
        $main_alker = MainAlker::paginate(10);
        return MainAlkerResource::collection($main_alker);
    }

    public function get_by_id($main_alker_id)
    {
        $main_alker = MainAlker::find($main_alker_id);
        return new MainAlkerResource($main_alker);
    }
}
