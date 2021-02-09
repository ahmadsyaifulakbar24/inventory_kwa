<<<<<<< HEAD
<?php

namespace App\Http\Controllers;

use App\Models\HistoryAlker;

class HistoryController extends Controller
{
    public static function createHistory($request)
    {
        HistoryAlker::create([
            'alker_id' => $request['alker_id'],
            'alker_request_id' => !empty($request['alker_request_id']) ? $request['alker_request_id'] : NULL,
            'status' => $request['status']
        ]);
        return;
    }
}
=======
<?php

namespace App\Http\Controllers;

use App\Models\HistoryAlker;

class HistoryController extends Controller
{
    public static function createHistory($request)
    {
        HistoryAlker::create([
            'alker_id' => $request['alker_id'],
            'alker_request_id' => !empty($request['alker_request_id']) ? $request['alker_request_id'] : NULL,
            'status' => $request['status']
        ]);
        return;
    }
}
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3
