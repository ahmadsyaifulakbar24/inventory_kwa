<<<<<<< HEAD
<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class DeleteItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke($id)
    {
       $item = Item::find($id);
       if($item) {
           $item->delete();
           return response()->json([
               'message' => 'delete item success'
           ]);
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

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class DeleteItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke($id)
    {
       $item = Item::find($id);
       if($item) {
           $item->delete();
           return response()->json([
               'message' => 'delete item success'
           ]);
       } else {
           return response()->json([
               'message' => 'data not found'
           ], 404);
       }
    }
}
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3
