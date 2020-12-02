<?php

namespace App\Http\Controllers\Alker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Alker\AlkerRequestResource;
use App\Models\AlkerRequest;

;

class GetAlkerRequestController extends Controller
{
    public function get_all()
    {
        $alker_request = AlkerRequest::paginate(10);
        return AlkerRequestResource::collection($alker_request);
    }

    public function get_by_id($alker_request_id) 
    {
        $alker_request = AlkerRequest::find($alker_request_id);
        if($alker_request) {
            return new AlkerRequestResource($alker_request);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}