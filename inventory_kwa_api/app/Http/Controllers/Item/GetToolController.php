<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;

class GetToolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_all()
    {
       $item = Item::where('type_item', 'tool')->get();
       return ItemResource::collection($item);
    }

    public function get_by_id($id)
    {
        $item =  Item::where([['type_item', 'tool'], ['id', $id]])->first();
        if($item) {
            return new ItemResource($item);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
