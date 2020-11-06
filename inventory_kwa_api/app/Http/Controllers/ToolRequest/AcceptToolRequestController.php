<?php

namespace App\Http\Controllers\ToolRequest;

use App\Http\Controllers\Controller;
use App\Http\Resources\ToolRequestResource;
use App\Models\ToolRequest;

class DeleteToolRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke($id)
    {
        $tool_request = ToolRequest::find($id);
        if($tool_request) {
            $tool_request->update([
                'status' => 'accepted'
            ], 200);
            return new ToolRequestResource($tool_request);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
