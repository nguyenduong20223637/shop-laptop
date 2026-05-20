<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CauHinh;
use App\Models\ProductVariants;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class APICauHinhController extends Controller
{
    //
    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $check = CauHinh::where('ten_cau_hinh', $request->ten_cau_hinh)->first();
            if($check)
            {
                return response()->json([
                    'status' => 0,
                    'message' => 'cấu hình đã tồn tại !!',
                ]);
            }
            $data = $request->all();
            CauHinh::create($data);
            DB::commit();

            return response()->json([
                'status' => 1,
                'message' => 'Thêm mới thành công',
            ]);
        } catch (Exception $E) {
            Log::error($E);
            DB::rollBack();
            return response()->json([
                'status' => 0,
                'message' => 'Có lỗi xảy ra: ' . $E->getMessage(),
            ]);
        }
    }

    public function status(Request $request)
    {

        DB::beginTransaction();
        try {
            $CauHinh = CauHinh::find($request->id);
            if ($CauHinh) {
                $CauHinh->trang_thai = !$CauHinh->trang_thai;
                $CauHinh->save();
                DB::commit();
                return response()->json([
                    'status' => 1,
                    'message' => 'Cập nhật trạng thái thành công',
                ]);
            } else
                return response()->json([
                    'status' => 0,
                    'message' => 'Cập nhật trạng thái thất bại!!',
                ]);

        } catch (Exception $E) {
            Log::error($E);
            DB::rollBack();
            return response()->json([
                'status' => 0,
                'message' => 'Có lỗi xảy ra: ' . $E->getMessage(),
            ]);
        }
    }

    public function update(Request $request)
    {

        DB::beginTransaction();
        try {
            $data = $request->all();
            $CauHinh = CauHinh::find($request->id);
            $check = CauHinh::where('ten_cau_hinh', $request->ten_cau_hinh)
                                ->where('id', '!=', $request->id)->first();
            if ($CauHinh && !$check) {
                $CauHinh->update($data);
                DB::commit();
                return response()->json([
                    'status' => 1,
                    'message' => 'Cập nhật thành công',
                ]);
            } else
                return response()->json([
                    'status' => 0,
                    'message' => 'trùng cấu hình, hoặc sai id vui lòng nhập lại!!',
                ]);

        } catch (Exception $E) {
            Log::error($E);
            DB::rollBack();
            return response()->json([
                'status' => 0,
                'message' => 'Có lỗi xảy ra: ' . $E->getMessage(),
            ]);
        }
    }

    public function destroy(Request $request)
    {

        DB::beginTransaction();
        try {
            $giays = ProductVariants::where('cau_hinh_id', $request->id)->first();
            $CauHinh = CauHinh::find($request->id);
            if ($CauHinh && !$giays) {
                $CauHinh->delete();
                DB::commit();
                return response()->json([
                    'status' => 1,
                    'message' => 'Xóa thành công',
                ]);
            } else
                return response()->json([
                    'status' => 0,
                    'message' => 'Có sản phẩm sử dụng cấu hình này, xóa thất bại !!',
                ]);

        } catch (Exception $E) {
            Log::error($E);
            DB::rollBack();
            return response()->json([
                'status' => 0,
                'message' => 'Có lỗi xảy ra: ' . $E->getMessage(),
            ]);
        }
    }


    public function data(Request $request)
    {
        $data = CauHinh::orderBy('ten_cau_hinh', 'asc')->get();
        return response()->json([
            'data' => $data
        ]);
    }
}
