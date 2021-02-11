<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectItem;

class DeleteProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke($id)
    {
        $project = Project::find($id);
        if($project) {
            $status_item = ProjectItem::where([['project_id', $project->id], ['status', 'accepted']])->count();
            if($status_item >= 1) {
                return response()->json([
                    'message' => "can't delete this project"
                ]);
            } else {
                $project->delete();
                return response()->json([
                    'message' => 'delete success'
                ], 200);
            }
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
