<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use Illuminate\Http\Request;

class EditSupplierController extends Controller
{
    public function __construct()
    {
        //
    }

    public function __invoke(Request $request, $supplier_id)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'contact' => ['required', 'numeric', 'digits_between:8,15']
        ]);
        $input = $request->all();
        $supplier = Supplier::find($supplier_id);
        if($supplier) {
            $supplier->update($input);
            return new SupplierResource($supplier);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
