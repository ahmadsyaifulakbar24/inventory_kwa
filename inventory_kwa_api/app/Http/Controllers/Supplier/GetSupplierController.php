<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;

class GetSupplierController extends Controller
{
    public function __construct()
    {
        //
    }

    public function get_all()
    {
        $supplier = Supplier::all();
        return SupplierResource::collection($supplier);
    }

    public function get_by_id($supplier_id)
    {
        $supplier = Supplier::find($supplier_id);
        if($supplier) {
            return new SupplierResource($supplier);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
