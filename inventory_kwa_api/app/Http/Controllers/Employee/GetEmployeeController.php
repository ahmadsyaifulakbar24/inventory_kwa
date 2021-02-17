<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class GetEmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_all(Request $request)
    {
        $limit = $request->limit;
        $search = $request->search;
        if($limit) {
            $employee = Employee::orderBy('id', 'DESC')->paginate($limit);
        } else if($search) {
            $employee = Employee::where('name', 'like', '%'.$search.'%')->orWhere('nik', 'like', '%'.$search.'%')->get();
        } else {
            $employee = Employee::orderBy('id', 'DESC')->get();
        }
        return EmployeeResource::collection($employee);
    }

    public function get_by_id($id)
    {
        $employee = Employee::find($id);
        if($employee) {
            return new EmployeeResource($employee);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
