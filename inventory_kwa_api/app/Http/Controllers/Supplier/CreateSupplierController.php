<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use Illuminate\Http\Request;

class CreateSupplierController extends Controller
{
    public function __construct()
    {
        //
    }

    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string'],
            'contact' => ['required', 'numeric', 'digits_between:8,15']
        ]);

        $input = $request->all();
        $supplier = Supplier::create($input);
        return new SupplierResource($supplier);
    }
}
