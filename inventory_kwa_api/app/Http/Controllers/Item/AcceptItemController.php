<<<<<<< HEAD
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
                'supplier_id' => ['required', 'exists:suppliers,id'],
                'image1' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
                'image2' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
                'url' => ['nullable', 'url'],
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
                'supplier_id' => $request->supplier_id,
                'image1' => $image1,
                'image2' => $image2,
                'url' => $request->url,
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
=======
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
                'supplier_id' => ['required', 'exists:suppliers,id'],
                'image1' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
                'image2' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
                'url' => ['nullable', 'url'],
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
                'supplier_id' => $request->supplier_id,
                'image1' => $image1,
                'image2' => $image2,
                'url' => $request->url,
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
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3
