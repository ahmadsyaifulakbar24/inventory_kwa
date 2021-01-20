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
        $type = $request->type;
        if($type == 'online') {
            $contact = ['nullable', 'numeric', 'digits_between:8,15'];
            $url = ['required', 'url'];
        } else {
            $contact = ['required', 'numeric', 'digits_between:8,15'];
            $url = ['nullable', 'url'];
        }

        $this->validate($request, [
            'name' => ['required', 'string'],
            'contact' => $contact,
            'type' => ['required', 'in:online,offline'],
            'url' => $url,
        ]);

        $supplier = Supplier::find($supplier_id);
        if($supplier) {
            $input['name'] = $request->name;
            $input['type'] = $request->type;
            if($type == 'online') {
                $input['url'] = $request->url;
                $input['contact'] = null;
            } else {
                $input['url'] = null;
                $input['contact'] = $request->contact;
            }

            $supplier->update($input);
            return new SupplierResource($supplier);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
