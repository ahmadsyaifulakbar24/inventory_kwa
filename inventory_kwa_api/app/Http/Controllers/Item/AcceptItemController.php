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
            $item_id = $project_item->item_id;
            $quantity = $project_item->quantity;
            $item = Item::find($item_id);
            $stock = $item->stock;
            if($stock >= $quantity) {
                $sisa = $stock - $quantity;
                $item->update([
                    'stock' => $sisa
                ]);
            } else {
                return response()->json([
                    'message' => 'jumlah stock kurang dari permintaan'
                ]);
            }
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
