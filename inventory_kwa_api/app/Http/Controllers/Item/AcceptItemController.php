<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Http\Resources\ProjectItemResource;
use App\Http\Resources\ProjectResource;
use App\Models\Item;
use App\Models\Project;
use App\Models\ProjectItem;
use Illuminate\Http\Request;

class AcceptItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke($id)
    {
        $project_item = ProjectItem::find($id);
        if($project_item) {
            $input['status'] = 'accepted';
            $project_item->update($input);

            $project = Project::find($project_item->project_id);
            return new ProjectResource($project);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
