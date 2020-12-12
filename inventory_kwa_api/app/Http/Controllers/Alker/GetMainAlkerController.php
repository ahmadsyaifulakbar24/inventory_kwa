<?php

namespace App\Http\Controllers\Alker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Alker\MainAlkerResource;
use App\Models\MainAlker;

class GetMainAlkerController extends Controller
{
    public function __invoke()
    {
        $main_alker = MainAlker::orderBY('id', 'DESC')->get();
        return MainAlkerResource::collection($main_alker);
    }
}