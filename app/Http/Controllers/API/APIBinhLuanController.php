<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BinhLuanRequest;
use App\Models\BinhLuan;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class APIBinhLuanController extends Controller
{
    //
    public function data(Request $request)
    {
        $data = BinhLuan::join('danh_sach_tai_khoans', 'danh_sach_tai_khoans.id', 'binh_luans.user_id')
            ->where('binh_luans.product_id', $request->payload['product_id'])
            ->select('danh_sach_tai_khoans.ho_va_ten', 'binh_luans.*')
            ->orderBy('binh_luans.created_at', 'DESC')
            ->paginate(10);

        $arrRating = BinhLuan::where('binh_luans.product_id', $request->payload['product_id'])
                    ->select('ratting', DB::raw('COUNT(ratting) as rating_count'))
                    ->groupBy('ratting')
                    ->orderBy('ratting')
                    ->get();

        $starts = 0;
        $totalRatingCount = $arrRating->sum('rating_count');
        foreach ($arrRating as $key => $value) {
            $value->percent = number_format(($value->rating_count/$totalRatingCount)*100, 2);
            $starts += ($value->ratting * $value->rating_count);
        }

        $tbstart = (int)($starts/$totalRatingCount);


        return response()->json([
            'status' => 1,
            'data' => $data,
            'ratings' => $arrRating,
            'totalRatingCount' => $totalRatingCount,
            'tbstart' => $tbstart,
        ]);
    }
    public function add(BinhLuanRequest $request)
    {

        DB::beginTransaction();
        try {
            $check = Product::find($request->product_id);
            if ($check) {
                BinhLuan::create([
                    'user_id' => Session::get('auth')->id,
                    'product_id' => $request->product_id,
                    'ratting'   => $request->ratting,
                    'content' => $request->content,
                ]);

                DB::commit();
                return response()->json([
                    'status' => 1,
                    'message' => 'Bình luận thành công',
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
}
