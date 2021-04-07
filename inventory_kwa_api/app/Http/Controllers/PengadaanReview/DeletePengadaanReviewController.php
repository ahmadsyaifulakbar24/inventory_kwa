<?php

namespace App\Http\Controllers\PengadaanReview;

use App\Http\Controllers\Controller;
use App\Models\PengadaanRequestItem;
use App\Models\PengadaanReview;
use App\Models\PengadaanReviewItem;
use Illuminate\Support\Facades\DB;

class DeletePengadaanReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke($pengadaan_review_id)
    {
        $pengadaan_review = PengadaanReview::find($pengadaan_review_id);
        
        if(!empty($pengadaan_review->first_approved_at)) {
            return response()->json([
                'message' => "can't delete this data"
            ], 401);
        }

        $result = DB::transaction(function () use ($pengadaan_review) {
            $pengadaan_review_items = PengadaanReviewItem::where('pengadaan_review_id', $pengadaan_review->id)->get();
            foreach ($pengadaan_review_items as $pengadaan_review_item) {
                $pengadaan_request_item = PengadaanRequestItem::find($pengadaan_review_item->pengadaan_request_item_id);
                $pengadaan_request_item->update([
                    'status' => 'pending'
                ]);
            }

            $pengadaan_review->delete();
            return response()->json([
                'message' => 'success delete data'
            ], 200);
        });

        return $result;
    }
}