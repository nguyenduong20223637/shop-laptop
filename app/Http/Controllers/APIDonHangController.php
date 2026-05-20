<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonHang;
use App\Models\DonHang;
use App\Models\GioHang;
use App\Models\Product;
use App\Models\ProductVariants;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\Foreach_;
use Ramsey\Uuid\Type\Integer;

class APIDonHangController extends Controller
{
    //
    public function orderComplete(Request $request)
    {
        $data = $request->all();
        $info = $data['info'];
        $products = $data['products'];

        DB::beginTransaction();
        try {
            //tjao đơn hàng
            $donhang = DonHang::create([
                'user_id' => Session::get('auth')->id,
                'tong_tien' => $info['tong_tien'],
                'ten_nguoi_nhan' => $info['ten_nguoi_nhan'],
                'dia_chi'   => $info['dia_chi'],
                'so_dien_thoai' => $info['so_dien_thoai'],
                'hinh_thuc_thanh_toan' => $info['hinh_thuc_thanh_toan'],
                'trang_thai'    => 1,   //1: là đang xử lý
            ]);
            $donhang->id = 6969 + $donhang->id;
            $donhang->save();

            //tạo dữ liệu cho chi tiết đơn hàng
            foreach ($products as $key => $value) {
                ChiTietDonHang::create([
                    'don_hang_id' => $donhang->id,
                    'san_pham_id' => $value['product_id'],
                    'so_luong'    => $value['so_luong'],
                ]);

                //cập nhật lại số lượng sản phẩm
                $prodVar = ProductVariants::find($value['product_id']);
                $prodVar->so_luong = $prodVar->so_luong - $value['so_luong'];
                $prodVar->save();
            }

            //xóa hết sản phẩm trong giỏ hàng
            $products2 = GioHang::where('user_id', Session::get('auth')->id)->get();
            $products2 = GioHang::where('user_id', Session::get('auth')->id)->get();
            foreach ($products2 as $key => $value) {
                $value->delete();
            }

            DB::commit();

            // Kiểm tra phương thức thanh toán (2 = Chuyển khoản/VNPay)
            if ($info['hinh_thuc_thanh_toan'] == 2) {
                $paymentUrl = \App\Helpers\VNPayHelper::createPaymentUrl($donhang);
                return response()->json([
                    'status' => 2,
                    'message' => 'Chuyển hướng đến VNPay',
                    'payment_url' => $paymentUrl,
                ]);
            }

            return response()->json([
                'status' => 1,
                'message' => 'đặt hàng thành công',
            ]);
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
            return response()->json([
                'status' => 0,
                'message' => 'có lỗi xảy ra,Vui lòng kiểm tra lại !',
            ]);
        }
    }

    public function statusOrder(Request $request)
    {
        $check = DonHang::find($request->id);
        if ($check && (($request->trang_thai == 1) ||  ($request->trang_thai == 2) ||  ($request->trang_thai == 3) ||  ($request->trang_thai == 4) ||  ($request->trang_thai == 0))) {
            $check->trang_thai = $request->trang_thai;
            $check->save();
            return response()->json([
                'status' => 1,
                'message' => 'thay đổi trạng thái thành công !'
            ]);
        } else
            return response()->json([
                'status' => 0,
                'message' => 'Đơn hàng không tồn tại !'
            ]);
    }

    public function orderDelete(Request $request)
    {
        DB::beginTransaction();
        try {
            $check = DonHang::find($request->id);
            if ($check) {
                if ($check->trang_thai != 1) {
                    return response()->json([
                        'status' => 0,
                        'message' => 'đơn hàng đã đượn xác nhận, không thể hủy !',
                    ]);
                } else {
                    $chitietdonhang = ChiTietDonHang::where('don_hang_id', $check->id)->get();
                    foreach ($chitietdonhang as $key => $value) {
                        $san_pham = ProductVariants::find($value->san_pham_id);
                        $san_pham->so_luong += $value->so_luong;
                        $san_pham->save();
                        $value->delete();
                    }
                    $check->delete();
                    DB::commit();
                    return response()->json([
                        'status' => 1,
                        'message' => 'hủy thành công !',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'đơn hàng không tồn tại !',
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
            return response()->json([
                'status' => 0,
                'message' => 'có lỗi xảy ra,Vui lòng kiểm tra lại !',
            ]);
        }
    }

    public function infoOrder(Request $request)
    {
        $data = ChiTietDonHang::join('product_variants', 'product_variants.id', 'chi_tiet_don_hangs.san_pham_id')
            ->join('products', 'products.id', 'product_variants.product_id')
            ->join('cau_hinhs', 'cau_hinhs.id', 'product_variants.cau_hinh_id')
            ->join('mau_sacs', 'mau_sacs.id', 'product_variants.mau_sac_id')
            ->where('chi_tiet_don_hangs.don_hang_id', $request->id)
            ->select('chi_tiet_don_hangs.*', 'products.ten_san_pham', 'product_variants.gia_dieu_chinh', 'mau_sacs.ten_mau_sac', 'cau_hinhs.ten_cau_hinh')
            ->get();
        if ($data) {
            return response()->json([
                'status' => 1,
                'data' => $data,
            ]);
        } else
            return response()->json([
                'status' => 0,
                'message' => 'Không tìm thấy đơn hàng !',
            ]);
    }
    public function data(Request $request)
    {
        $user = session()->get('auth');
        $data = DonHang::where('user_id', $user->id)->orderBy('created_at', 'DESC')->get();
        return response()->json([
            'status' => 1,
            'data' => $data,
        ]);
    }

    public function allOrder(Request $request)
    {
        $data = DonHang::join('danh_sach_tai_khoans', 'danh_sach_tai_khoans.id', 'don_hangs.user_id')
            ->select('don_hangs.*', 'danh_sach_tai_khoans.ho_va_ten')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        return response()->json([
            'status' => 1,
            'data' => $data,
        ]);
    }

    public function deleteOrder(Request $request)
    {
        DB::beginTransaction();
        try {
            $check = DonHang::find($request->id);
            if ($check) {
                ChiTietDonHang::where('don_hang_id', $check->id)->delete();
                $check->delete();
                DB::commit();
                return response()->json([
                    'status' => 1,
                    'message' => 'Xóa đơn hàng thành công'
                ]);
            } else
                return response()->json([
                    'status' => 0,
                    'message' => 'Không tìm thấy đơn hàng !'
                ]);
        } catch (Exception $e) {
            Log::error('Lỗi nè'.$e);
            DB::rollBack();
        };
    }
    public function orderDetail(Request $request)
    {


        $data = ChiTietDonHang::join('product_variants', 'product_variants.id', 'chi_tiet_don_hangs.san_pham_id')
            ->join('products', 'products.id', 'product_variants.product_id')
            ->join('cau_hinhs', 'cau_hinhs.id', 'product_variants.cau_hinh_id')
            ->join('mau_sacs', 'mau_sacs.id', 'product_variants.mau_sac_id')
            ->where('chi_tiet_don_hangs.don_hang_id', $request->don_hang_id)
            ->select('chi_tiet_don_hangs.*', 'products.ten_san_pham', 'product_variants.gia_dieu_chinh', 'mau_sacs.ten_mau_sac', 'cau_hinhs.ten_cau_hinh')
            ->get();
        return response()->json([
            'status' => 1,
            'data' => $data,
        ]);
    }
}
