<?php

namespace App\Http\Controllers\PengadaanRequest;

use App\Http\Controllers\Controller;
use App\Http\Resources\PengadaanRequest\PengadaanRequestResource;
use App\Models\PengadaanRequest;
use App\Models\PengadaanRequestItem;
use Illuminate\Http\Request;

class UpdatePengadaanRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request, $pengadaan_request_id)
    {
        $pengadaan_request = PengadaanRequest::find($pengadaan_request_id);

        if($pengadaan_request) {
            if($pengadaan_request->jenis_pengadaan_id == 33) {
                $main_alker_id = ['required', 'numeric', 'exists:main_alker,id'];
                $item_id = ['nullable', 'numeric', 'exists:items,id'];
                $data_barang = 'main_alker_id';
            } else {
                $main_alker_id = ['nullable', 'numeric', 'exists:main_alker,id'];
                $item_id = ['required', 'numeric', 'exists:items,id'];
                $data_barang = 'item_id';
            }
            $this->validate($request, [
                'pengadaan_request_item' => ['required', 'array'],
                'pengadaan_request_item.*.main_alker_id' => $main_alker_id,
                'pengadaan_request_item.*.item_id' => $item_id,
                'pengadaan_request_item.*.total' => ['required', 'numeric'],
                'pengadaan_request_item.*.description' => ['nullable', 'string'],
            ]);
    
            $pengadaan_request_item = $request->pengadaan_request_item;
            $pengadaan_request_item_detach = $pengadaan_request->pengadaan_request_item()->where('status', 'approve')->pluck($data_barang,'id')->toArray();
            $old_pengadaan_request_item = $pengadaan_request->pengadaan_request_item()->whereIn('status', ['pending', 'decline'])->pluck($data_barang, 'id')->toArray();
            $pengadaan_request_item_filter = array_diff_key($pengadaan_request_item, $pengadaan_request_item_detach);
    
            // Create Pengadaan Request Items
            $create_pengadaan_request_item = array_keys(array_diff_key($pengadaan_request_item_filter, $old_pengadaan_request_item));
            if($create_pengadaan_request_item) {
                foreach($create_pengadaan_request_item as $key) {
                    $new_create_pengadaan_request_item = [
                        'main_alker_id' => !empty($pengadaan_request_item_filter[$key]['main_alker_id']) ? $pengadaan_request_item_filter[$key]['main_alker_id'] : NULL,
                        'item_id' => !empty($pengadaan_request_item_filter[$key]['item_id']) ? $pengadaan_request_item_filter[$key]['item_id'] : NULL,
                        'total' => $pengadaan_request_item_filter[$key]['total'],
                        'description' => $pengadaan_request_item_filter[$key]['description'],
                        'status' => 'pending'
                    ];
    
                    $new_create_pengadaan_request_items[] = $new_create_pengadaan_request_item;
                }
                $pengadaan_request->pengadaan_request_item()->createMany($new_create_pengadaan_request_items);
            }
    
            // Update Pengadaan Request Items
            $update_pengadaan_request_item = array_keys(array_intersect_key($old_pengadaan_request_item, $pengadaan_request_item_filter));
            foreach($update_pengadaan_request_item as $key) {
                PengadaanRequestItem::where('id', $key)->update([
                    'main_alker_id' => !empty($pengadaan_request_item_filter[$key]['main_alker_id']) ? $pengadaan_request_item_filter[$key]['main_alker_id'] : NULL,
                    'item_id' => !empty($pengadaan_request_item_filter[$key]['item_id']) ? $pengadaan_request_item_filter[$key]['main_alker_id'] : NULL,
                    'total' => $pengadaan_request_item_filter[$key]['total'],
                    'description' => $pengadaan_request_item_filter[$key]['description']
                ]);
            }
    
            // Delete Pengadaan Request Items
            $delete_pengadaan_request_item =  array_keys(array_diff_key($old_pengadaan_request_item, $pengadaan_request_item_filter));
            if($delete_pengadaan_request_item) {
                PengadaanRequestItem::whereIn('id', $delete_pengadaan_request_item)->delete();
            }
    
            return new PengadaanRequestResource($pengadaan_request);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
