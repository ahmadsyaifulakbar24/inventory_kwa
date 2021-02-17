<?php

namespace App\Http\Controllers\PengadaanReview;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HistoryController;
use App\Http\Resources\PengadaanReview\PengadaanReviewResource;
use App\Models\Alker;
use App\Models\Item;
use App\Models\MainAlker;
use App\Models\PengadaanRequestItem;
use App\Models\PengadaanReview;

class FinishPengadaanReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke($pengadaan_review_id)
    {
        $pengadaan_review = PengadaanReview::find($pengadaan_review_id);
        if($pengadaan_review) {
            if($pengadaan_review->status != 'finish') {
                if($pengadaan_review->first_approved_at && $pengadaan_review->second_approved_at) {
                    // update status pengadaan review (finish)
                    $pengadaan_review->update([ 'status' => 'finish' ]);
    
                    // update status pengadaan request items
                    $pengadaan_review_items = $pengadaan_review->pengadaan_review_item;
                    foreach($pengadaan_review_items as $review_item) {
                        $review_item->pengadaan_request_item_id;
                        $pengadaan_request_item = PengadaanRequestItem::find($review_item->pengadaan_request_item_id);
                        $pengadaan_request_item->update([ 
                            'approved_at' => \Carbon\Carbon::now(),
                            'status' => 'approve'
                        ]);
    
                        // update stok alker & salker / material
                        $main_alker_id = $pengadaan_request_item->main_alker_id;
                        if($main_alker_id) {
                            $main_alker = MainAlker::find($main_alker_id);
                            $cek_alker = Alker::where('main_alker_id', $main_alker_id)->count();
                            if($cek_alker > 0) {
                                $last_alker = Alker::where('main_alker_id', $main_alker_id)->orderBy('id', 'DESC')->first();
                                $kode = explode("/",$last_alker->kode_alker);
                                $dataAlker['kode_alker'] = $kode[0]+1 .'/'.$main_alker->kode_main_alker;
                            } else {
                                $dataAlker['kode_alker'] = "1/".$main_alker->kode_main_alker;
                            }
                            $dataAlker['status'] = 'in';
                            $dataAlker['main_alker_id'] = $main_alker_id;
                            $alker = Alker::create($dataAlker);
                            $history['alker_id'] = $alker->id;
                            $history['status'] = 'create_goods';
                            HistoryController::createHistory($history);
                        } else if($pengadaan_request_item->item_id) {
                            $item = Item::find($pengadaan_request_item->item_id);
                            $stock_awal = $item->stock;
                            $item->update([
                                'stock' => $stock_awal + $pengadaan_request_item->total
                            ]);
                        }
                    }
    
                    return new PengadaanReviewResource($pengadaan_review);
                } else {
                    return response()->json([
                        'message' => "can't finish pengadaan review because not yet approved"
                    ], 401);
                }
            } else {
                return response()->json([
                    'message' => 'pengadaan revies already finished'
                ], 401);
            }
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}