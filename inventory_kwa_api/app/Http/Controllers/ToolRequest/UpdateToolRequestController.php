<?php

namespace App\Http\Controllers\ToolRequest;

use App\Http\Controllers\Controller;
use App\Http\Resources\ToolRequestResource;
use App\Models\ToolRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class UpdateToolRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request, $id)
    {
        $tool_request = ToolRequest::find($id);

        if($tool_request) {
            $this->validate($request, [
                'item_id' => [
                    'required', 
                    'numeric', 
                    Rule::exists('items', 'id')->where(function ($query) {
                        $query->where('type_item', 'tool');
                    })
                ],
                'teknisi_id' => [
                    'required',
                    Rule::exists('employees', 'id')->where(function ($query) {
                        $query->where('jabatan_id', 29);
                    })
                ],
                'jenis' => [
                    'required',
                    Rule::exists('params', 'param')->where(function ($query) {
                        $query->where('category_param', 'jenis_alker');
                    })
                ],
                'keterangan_id' => [
                    'required',
                    Rule::exists('params', 'id')->where(function ($query) {
                        $query->where('category_param', 'keterangan_alker');
                    })
                ],
                'front_picture' => ['nullable', 'image', 'mimes:jpeg,bmp,png,jpg'],
                'back_picture' => ['nullable', 'image', 'mimes:jpeg,bmp,png,jpg']
            ]);
            $input = $request->all();
    
            if($request->keterangan_id == 28) {
                if($request->hasFile('front_picture')) {
                   $front_picture =  $request->file('front_picture');
                   $front_picture_name = $this->uploadFile('images/tools', $front_picture);
                   $input['front_picture'] = $front_picture_name;
                   $this->deleteFile('image/tools', $tool_request->front_picture);
                }
        
                if($request->hasFile('back_picture')) {
                    $back_picture =  $request->file('back_picture');
                    $back_picture_name = $this->uploadFile('images/tools', $back_picture);
                    $input['back_picture'] = $back_picture_name;
                    $this->deleteFile('image/tools', $tool_request->back_picture);
                 }
            } else if($request->keterangan_id == 32) {
                if($tool_request->front_picture != null) {
                    $this->deleteFile('images/tools', $tool_request->front_picture);
                }
                if($tool_request->back_picture != null) {
                    $this->deleteFile('images/tools', $tool_request->back_picture);
                }
                $tool_request->update([
                    'front_picture' => NULL,
                    'back_picture' => NULL
                ]);
            }
    
             $input['user_id'] = $request->user()->id;
             $input['status'] = 'pending';
             $tool_request->update($input);
             return new ToolRequestResource($tool_request);
        } else {
            return response()->json([
                'message' => 'data not found'
            ]);
        }
    }

    public function uploadFile($path, $requestFile)
    {
        $image = $requestFile;
        $ext = $image->getClientOriginalExtension();
        if($requestFile->isValid()) {
            $file_name = Str::random(20).".$ext";
            $upload_path = $path;
            $requestFile->move($upload_path, $file_name);
            return $file_name;
        } 
    }

    public function deleteFile($path, $data) 
    {
        $file = $path.'/'.$data;
        if(file_exists($file) ){
            unlink($file);
        }
    }
}
