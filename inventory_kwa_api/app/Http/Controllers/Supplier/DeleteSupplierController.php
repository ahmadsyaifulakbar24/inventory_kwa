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
