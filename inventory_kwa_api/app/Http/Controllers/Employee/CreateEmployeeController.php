<<<<<<< HEAD
<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateEmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'nik' => ['required', 'numeric', 'digits:16', 'unique:employees,nik'],
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
        $employee = Employee::create($input);
        return new EmployeeResource($employee);
    }
}
=======
<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateEmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'nik' => ['required', 'numeric', 'digits:16', 'unique:employees,nik'],
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
        $employee = Employee::create($input);
        return new EmployeeResource($employee);
    }
}
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3
