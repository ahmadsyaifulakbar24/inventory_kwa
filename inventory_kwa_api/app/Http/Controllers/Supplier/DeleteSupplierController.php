<<<<<<< HEAD
<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Supplier;

class DeleteSupplierController extends Controller
{
    public function __construct()
    {
        //
    }

    public function __invoke($supplier_id)
    {
        $supplier = Supplier::find($supplier_id);
        if($supplier) {
            $supplier->delete();
            return response()->json([
                'message' => 'delete success'
            ], 404);
        } else {
            return response()->json([
                'message' => 'data not found'
            ]);
        }
    }
}
=======
<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Supplier;

class DeleteSupplierController extends Controller
{
    public function __construct()
    {
        //
    }

    public function __invoke($supplier_id)
    {
        $supplier = Supplier::find($supplier_id);
        if($supplier) {
            $supplier->delete();
            return response()->json([
                'message' => 'delete success'
            ], 404);
        } else {
            return response()->json([
                'message' => 'data not found'
            ]);
        }
    }
}
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3
