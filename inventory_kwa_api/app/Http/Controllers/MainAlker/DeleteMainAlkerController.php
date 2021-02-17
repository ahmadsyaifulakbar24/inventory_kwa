<?php

namespace App\Http\Controllers\MainAlker;

use App\Http\Controllers\Controller;
use App\Models\MainAlker;

class DeleteMainAlkerController extends Controller
{
    public function __invoke($main_alker_id)
    {
        $main_alker = MainAlker::find($main_alker_id);
        if($main_alker) {
            $main_alker->delete();
            return response()->json([
                'message' => 'delete success'
            ], 200);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
