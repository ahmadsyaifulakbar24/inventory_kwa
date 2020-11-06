<?php

namespace App\Http\Controllers\ToolRequest;

use App\Http\Controllers\Controller;
use App\Http\Resources\ToolRequestResource;
use App\Models\ToolRequest;

class GetToolRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_all()
    {
        $tool_request = ToolRequest::paginate('15');
        return ToolRequestResource::collection($tool_request);
    }

    public function get_by_id($id)
    {
        $tool_request = ToolRequest::find($id);
        if($tool_request) {
            return new ToolRequestResource($tool_request);
        } return response()->json([
            'message' => 'data not found'
        ], 404);
    }
}
