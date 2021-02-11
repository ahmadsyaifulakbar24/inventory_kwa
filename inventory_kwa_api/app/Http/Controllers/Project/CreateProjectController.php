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
            'items.*.item_id' => [ 'required', 'numeric', 'exists:items,id'],
            'items.*.quantity' => ['required', 'numeric', 'min:1'],
            'provinsi_id' => ['required', 'exists:provinsi,id'],
            'kab_kota_id' => ['required', 'exists:kab_kota,id'],
            'items.*.category' => ['required', 'in:horizontal,vertical'],
            'kecamatan' => ['required', 'string']
        ]);

        $user_id = $request->user()->id;
        $project_input = $request->all();
        $project_input['user_id'] = $user_id;
        $project = Project::create($project_input);

        $items = $request->items;
        foreach($items as $key => $value) {
            $project_item = [
                'item_id' => $value['item_id'],
                'quantity' => $value['quantity'],
                'category' => $value['category'],
                'status' => 'pending',
            ];
            $project_items[] = $project_item;
        }
        $project->items()->attach($project_items);
        return new ProjectResource($project);
    }
}
