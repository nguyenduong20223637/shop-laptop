<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class APIBannerController extends Controller
{
    public function data()
    {
        return response()->json(['data' => Banner::orderBy('thu_tu')->get()]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            Banner::create([
                'ten_banner' => $request->ten_banner,
                'hinh_anh'   => $request->hinh_anh,
                'duong_dan'  => $request->duong_dan ?: '/home/all-product',
                'thu_tu'     => $request->thu_tu ?: 1,
                'trang_thai' => $request->trang_thai ?? 1,
            ]);
            DB::commit();
            return response()->json(['status' => 1, 'message' => 'Thêm banner thành công']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $banner = Banner::find($request->id);
            if (!$banner) return response()->json(['status' => 0, 'message' => 'Không tìm thấy']);
            $banner->update([
                'ten_banner' => $request->ten_banner,
                'hinh_anh'   => $request->hinh_anh,
                'duong_dan'  => $request->duong_dan ?: '/home/all-product',
                'thu_tu'     => $request->thu_tu ?: $banner->thu_tu,
                'trang_thai' => $request->trang_thai ?? $banner->trang_thai,
            ]);
            DB::commit();
            return response()->json(['status' => 1, 'message' => 'Cập nhật thành công']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            Banner::find($request->id)->delete();
            DB::commit();
            return response()->json(['status' => 1, 'message' => 'Xóa thành công']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }
    }

    public function status(Request $request)
    {
        $banner = Banner::find($request->id);
        $banner->trang_thai = !$banner->trang_thai;
        $banner->save();
        return response()->json(['status' => 1, 'message' => 'Cập nhật trạng thái thành công']);
    }
}
