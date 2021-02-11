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
        $type = $request->type;
        if($type == 'online') {
            $contact = ['nullable', 'numeric', 'digits_between:8,15'];
        } else {
            $contact = ['required', 'numeric', 'digits_between:8,15'];
        }
        
        $this->validate($request, [
            'name' => ['required', 'string'],
            'contact' => $contact,
            'type' => ['required', 'in:online,offline'],
        ]);

        $input['name'] = $request->name;
        $input['type'] = $request->type;
        if($type == 'online') {
            $input['contact'] = null;
        } else {
            $input['contact'] = $request->contact;
        }

        $supplier = Supplier::create($input);
        return new SupplierResource($supplier);
    }
}
