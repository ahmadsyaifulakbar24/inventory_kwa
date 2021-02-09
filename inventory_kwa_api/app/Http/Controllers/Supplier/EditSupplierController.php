<<<<<<< HEAD
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
        } else {
            $contact = ['required', 'numeric', 'digits_between:8,15'];
        }

        $this->validate($request, [
            'name' => ['required', 'string'],
            'contact' => $contact,
            'type' => ['required', 'in:online,offline'],
        ]);

        $supplier = Supplier::find($supplier_id);
        if($supplier) {
            $input['name'] = $request->name;
            $input['type'] = $request->type;
            if($type == 'online') {
                $input['contact'] = null;
            } else {
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
=======
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
        } else {
            $contact = ['required', 'numeric', 'digits_between:8,15'];
        }

        $this->validate($request, [
            'name' => ['required', 'string'],
            'contact' => $contact,
            'type' => ['required', 'in:online,offline'],
        ]);

        $supplier = Supplier::find($supplier_id);
        if($supplier) {
            $input['name'] = $request->name;
            $input['type'] = $request->type;
            if($type == 'online') {
                $input['contact'] = null;
            } else {
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
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3
