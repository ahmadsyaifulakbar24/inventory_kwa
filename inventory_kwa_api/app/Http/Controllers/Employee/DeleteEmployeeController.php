<<<<<<< HEAD
<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
class DeleteEmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke($employee_id)
    {
        $employee = Employee::find($employee_id);
        if($employee) {
            $employee->delete();
            return response()->json([
                'message' => 'success delete data'
            ], 200);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
=======
<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
class DeleteEmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke($employee_id)
    {
        $employee = Employee::find($employee_id);
        if($employee) {
            $employee->delete();
            return response()->json([
                'message' => 'success delete data'
            ], 200);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3
