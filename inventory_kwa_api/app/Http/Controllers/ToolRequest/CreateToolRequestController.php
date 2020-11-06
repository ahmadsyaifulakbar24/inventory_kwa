<?php

namespace App\Http\Controllers\ToolRequest;

use App\Http\Controllers\Controller;
use App\Http\Resources\ToolRequestResource;
use App\Models\ToolRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class CreateToolRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        if($request->keterangan_id == 28) {
            $front_picture  = ['required', 'image', 'mimes:jpeg,bmp,png,jpg'];
            $back_picture = ['required', 'image', 'mimes:jpeg,bmp,png,jpg'];
        } else {
            $front_picture  = ['nullable', 'image', 'mimes:jpeg,bmp,png,jpg'];
            $back_picture = ['nullable', 'image', 'mimes:jpeg,bmp,png,jpg'];
        }

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
            'front_picture' => $front_picture,
            'back_picture' => $back_picture
        ]);

        $input = $request->all();
        if($request->keterangan_id == 28) {
            if($request->hasFile('front_picture')) {
               $front_picture =  $request->file('front_picture');
               $front_picture_name = $this->uploadFile('images/tools', $front_picture);
               $input['front_picture'] = $front_picture_name;
            }
    
            if($request->hasFile('back_picture')) {
                $back_picture =  $request->file('back_picture');
                $back_picture_name = $this->uploadFile('images/tools', $back_picture);
                $input['back_picture'] = $back_picture_name;
             }
        }

         $input['user_id'] = $request->user()->id;
         $input['status'] = 'pending';
         $tool_request = ToolRequest::create($input);
        return new ToolRequestResource($tool_request);
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
}
