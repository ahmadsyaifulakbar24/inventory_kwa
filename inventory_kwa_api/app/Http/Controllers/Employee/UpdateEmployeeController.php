<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateEmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request, $employee_id)
    {
        $employee = Employee::find($employee_id);
        if($employee) 
        {
            $this->validate($request, [
                'nik' => ['required', 'numeric', 'digits:16', 'unique:employees,nik,'.$employee_id],
                'name' => ['required', 'string'],
                'status' => ['nullable', 'in:Single,Married'],
                'alamat' => ['nullable', 'string'],
                'no_hp' => ['nullable', 'numeric'],
                'email' => ['nullable', 'email'],
                'jabatan_id' => [
                    'required',
                    Rule::exists('params', 'id')->where(function($query) {
                        $query->where('category_param', 'jabatan');
                    })
                ]
            ]);
    
            $input = $request->all();
            $employee->update($input);
            return new EmployeeResource($employee);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
