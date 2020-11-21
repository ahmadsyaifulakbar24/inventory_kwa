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
                'items.*.quantity' => ['required', 'numeric', 'min:1'],
                'provinsi_id' => ['required', 'exists:provinsi,id'],
                'kab_kota_id' => ['required', 'exists:kab_kota,id'],
                'kecamatan' => ['required', 'string']
            ]);
            $project_input = $request->all();
            $project->update($project_input);

            $project_items = $request->items;
            foreach($project_items as $key => $value) {
                $new_project_items[substr($key, 1)] = [
                    'item_id' => $value['item_id'],
                    'quantity' => $value['quantity'],
                    'cek' => substr($key,0, 1)
                ];
            }
            $project_detach = ProjectItem::where([['project_id', $project->id], ['status', 'accepted']])->pluck('item_id', 'id')->toArray();
            $old_project = ProjectItem::where([['project_id', $project->id], ['status', 'pending']])->pluck('item_id', 'id')->toArray();
            $project_filter = array_diff_key($new_project_items, $project_detach);
            
            // Create Project Items
            foreach($project_filter as $key => $value) {
                if($value['cek'] == 'u') {
                    $new_key = $key;
                } else {
                    $new_key = 'n'.$key;
                }
                $new_project_filter[$new_key] = [
                    'item_id' => $value['item_id'],
                    'quantity' => $value['quantity']
                ];
            }
            
            $create_project = array_keys(array_diff_key($new_project_filter, $old_project));
            if($create_project) {
                foreach($create_project as $key) {
                    $new_create_project = [
                        'item_id' => $new_project_filter[$key]['item_id'],
                        'quantity' => $new_project_filter[$key]['quantity'],
                        'status' => 'pending',
                    ];
                    $new_create_projects[] = $new_create_project;
                }
                $project->items()->attach($new_create_projects);
            }
            
            // Update Project Items
            $update_project = array_keys(array_intersect_key($old_project, $new_project_filter));
            foreach($update_project as $key) {
                ProjectItem::where('id', $key)->update([
                    'item_id' => $new_project_filter[$key]['item_id'],
                    'quantity' => $new_project_filter[$key]['quantity'],
                ]);
            }

            // Delete Project Items
            $delete_project =  array_keys(array_diff_key($old_project, $new_project_filter));
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
