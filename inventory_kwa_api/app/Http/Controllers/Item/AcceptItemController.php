<?php

namespace App\Http\Controllers\Item;

use App\Helpers\FileHelpers;
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

    public function __invoke(Request $request, $id)
    {
        $project_item = ProjectItem::find($id);
        if($project_item) {
            $this->validate($request, [
                'supplier_name' => ['required', 'string'],
                'supplier_contact' => ['required', 'numeric', 'digits_between:8,15'],
                'image1' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
                'image2' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
            ]);
            $item_id = $project_item->item_id;
            $quantity = $project_item->quantity;
            $item = Item::find($item_id);
            $stock = $item->stock;
            $path = 'images/items/';
            $image1 = FileHelpers::uploadFile($path, $request->image1);
            $image2 = FileHelpers::uploadFile($path, $request->image2);
            if($stock >= $quantity) {
                $sisa = $stock - $quantity;
                $item->update([
                    'stock' => $sisa,
                ]);
            } else {
                return response()->json([
                    'message' => 'jumlah stock kurang dari permintaan'
                ]);
            }
            $project_item->update([
                'status' => 'accepted',
                'supplier_name' => $request->supplier_name,
                'supplier_contact' => $request->supplier_contact,
                'image1' => $image1,
                'image2' => $image2,
                'date_approved' => \Carbon\Carbon::now()
            ]);

            $project = Project::find($project_item->project_id);
            return new ProjectResource($project);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
