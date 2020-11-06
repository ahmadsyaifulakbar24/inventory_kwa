<?php

namespace App\Http\Controllers\ToolRequest;

use App\Http\Controllers\Controller;
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
            if($tool_request->front_picture != null) {
                $this->deleteFile('images/tools', $tool_request->front_picture);
            }
            if($tool_request->back_picture != null) {
                $this->deleteFile('images/tools', $tool_request->back_picture);
            }
             $tool_request->delete();
             return response()->json([
                 'message' => 'delete success'
             ], 200);
        } else {
            return response()->json([
                'message' => 'data not found'
            ]);
        }
    }

    public function deleteFile($path, $data) 
    {
        $file = $path.'/'.$data;
        if(file_exists($file) ){
            unlink($file);
        }
    }
}
