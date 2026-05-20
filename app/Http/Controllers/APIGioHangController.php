<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCartRequest;
use App\Models\DanhSachTaiKhoan;
use App\Models\GioHang;
use App\Models\Product;
use App\Models\ProductVariants;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Str;

class APIGioHangController extends Controller
{
    //
    public function data(Request $request)
    {
        $data = GioHang::join('product_variants', 'gio_hangs.product_id', 'product_variants.id')
            ->join('products', 'product_variants.product_id', 'products.id')
            ->join('cau_hinhs', 'product_variants.cau_hinh_id', 'cau_hinhs.id')
            ->join('mau_sacs', 'product_variants.mau_sac_id', 'mau_sacs.id')
            ->where('gio_hangs.user_id', Session::get('auth')->id)
            ->select(
                'gio_hangs.*',
                'products.ten_san_pham',
                'products.gia',
                'product_variants.hinh_anh',
                'mau_sacs.ten_mau_sac',
                'cau_hinhs.ten_cau_hinh',
                'product_variants.gia_dieu_chinh',
                DB::raw('(products.gia + product_variants.gia_dieu_chinh) as gia')
            )
            ->get();
        return response()->json([
            'status' => 1,
            'data' => $data,
        ]);
    }

    public function add(AddCartRequest $request)
    {
        DB::beginTransaction();
        try {
            //kiểm tra sản phẩm đã tồn tại chưa nếu chưa thì tạo mới còn không thì cộng dồn số lượng vào
            $check = GioHang::where('user_id', Session::get('auth')->id)
                ->where('product_id', $request->id)
                ->first();
            if ($check) {
                $check->so_luong += $request->so_luong;
                $check->save();
            } else {
                $giohang = GioHang::create([
                    'user_id'   => Session::get('auth')->id,
                    'product_id' => $request->id,
                    'so_luong'  => $request->so_luong,
                ]);
            }

            DB::commit();
            return response()->json([
                'status' => 1,
                'message' => 'Đã thêm vào giỏ hàng !'
            ]);
        } catch (Exception $e) {
            Log::error($e);
            return response()->json([
                'status' => 0,
                'message' => 'Thêm thất bại !'
            ]);
            DB::rollBack();
        }
    }

    public function count(Request $request)
    {
        $count = GioHang::where('user_id', Session::get('auth')->id)
            ->sum('so_luong');

        return response()->json([
            'status' => 1,
            'data' => $count,
        ]);
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            //gì cũng phải check trước khi làm bất kỳ cái gì
            $check = GioHang::where('user_id', $request->user_id)
                            ->where('id', $request->id)
                            ->first();
            if($check)
            {
                $check->delete();
                DB::commit();
                return response()->json([
                    'status' => 1,
                    'message'=> 'Xóa sản phẩm khỏi giỏ thành công !'
                ]);
            }
            else
            {
                return response()->json([
                    'status' => 0,
                    'message'=> 'Xóa sản phẩm khỏi giỏ thất bại !'
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function createCode(Request $request)
    {
        $list_prod = $request['list_prod'];
        if ($list_prod) {
            foreach ($list_prod as $key => $value) {
                $check = ProductVariants::find($value['product_id']);
                if($check->so_luong <  $value['so_luong'])
                {
                    $getProductName = Product::find('id', $check->product_id);
                    return response()->json([
                        'status' => 0,
                        'message' => 'Số lượng sản phẩm '.$getProductName->ten_san_pham.' vượt quá số lượng trong kho !',
                    ]);
                }
            }
            $taikhoan = DanhSachTaiKhoan::where('id', Session::get('auth')->id)->first();
            $taikhoan->checkout_code = Str::uuid();
            $taikhoan->save();

            return response()->json([
                'status' => 1,
                'id'    => $taikhoan->checkout_code,
            ]);
        }
        else
        {
            return response()->json([
                'status' => 0,
                'message'    => 'Không có sản phẩm nào trong giỏ hàng !',
            ]);
        }
    }
}
