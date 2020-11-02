<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;

class GetProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_all()
    {
        $project = Project::orderBy('id', 'DESC')->paginate(15);
        return ProjectResource::collection($project);
    }

    public function get_by_id($id)
    {
        $project = Project::find($id);
        if($project) {
            return new ProjectResource($project);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
