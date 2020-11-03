<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
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

        $user_id = $request->user()->id;
        $project_input['user_id'] = $user_id;
        $project_input['project_name'] = $request->project_name;
        $project = Project::create($project_input);

        $items = $request->items;
        foreach($items as $key => $value) {
            $project_item = [
                'item_id' => $value['item_id'],
                'quantity' => $value['quantity'],
                'status' => 'pending',
            ];
            $project_items[] = $project_item;
        }
        $project->items()->attach($project_items);
        return new ProjectResource($project);
    }
}
