<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\ProjectItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request, $id)
    {
        $project = Project::find($id);
        if($project) {
            $this->validate($request, [
                'project_name' => ['required', 'string'],
                'items' => ['required', 'array'],
                'items.*.item_id' => [
                    'required', 
                    'numeric', 
                    Rule::exists('items', 'id')->where(function ($query) {
                        $query->where('type_item', 'goods');
                    })
                ],
                'items.*.quantity' => ['required', 'numeric', 'min:1']
            ]);
            $project_input['project_name'] = $request->project_name;
            $project->update($project_input);

            $project_items = $request->items;
            $project_detach = ProjectItem::where([['project_id', $project->id], ['status', 'accepted']])->pluck('item_id', 'id')->toArray();
            $old_project = ProjectItem::where([['project_id', $project->id], ['status', 'pending']])->pluck('item_id', 'id')->toArray();
            $project_filter = array_diff_key($project_items, $project_detach);
            
            // Create Project Items
            $create_project = array_diff_key($project_filter, $old_project);
            $project->items()->attach($create_project);
            
            // Update Project Items
            $update_project = array_keys(array_intersect_key($old_project, $project_filter));
            foreach($update_project as $key) {
                ProjectItem::where('id', $key)->update([
                    'item_id' => $project_items[$key]['item_id'],
                    'quantity' => $project_items[$key]['quantity'],
                ]);
            }

            // Delete Project Items
            $delete_project =  array_keys(array_diff_key($old_project, $project_filter));
            if($delete_project) {
                ProjectItem::whereIn('id', $delete_project)->delete();
            }

            return new ProjectResource($project);
        } else {
            return response()->json([
                'message' => 'data no found'
            ], 404);
        }
    }
}
