<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\DanhMuc;
use App\Models\DanhSachTaiKhoan;
use App\Models\Giay;
use App\Models\MauSac;
use App\Models\Product;
use App\Models\ProductVariants;
use App\Models\ThuongHieu;
use Illuminate\Http\Request;

class TrangChuController extends Controller
{
    //
    public function index()
    {
        $bestSales = Product::where('tinh_trang', 1)
                        ->orderBy('luot_xem', 'DESC')
                        ->limit(16)
                        ->get();
        $ht_vv_products = Product::where('danh_muc_id', 2)
                        ->where('tinh_trang', 1)
                        ->orderBy('luot_xem', 'DESC')
                        ->limit(4)->get();
        $dh_kt_products = Product::where('danh_muc_id', 4)
                        ->where('tinh_trang', 1)
                        ->orderBy('luot_xem', 'DESC')
                        ->limit(4)->get();
        $gamming_products = Product::where('danh_muc_id', 1)
                        ->where('tinh_trang', 1)
                        ->orderBy('luot_xem', 'DESC')
                        ->limit(4)->get();
        $banners = Banner::where('trang_thai', 1)->orderBy('thu_tu')->get();
        return view('client.pages.home', compact('bestSales', 'ht_vv_products', 'dh_kt_products', 'gamming_products', 'banners'));
    }

    public function danhmucProducts($id)
    {
        $danhmuc = DanhMuc::find($id);
        if ($danhmuc) {
            $bestSales = Product::orderBy('luot_xem', 'DESC')->limit(4)->get();
            return view('client.pages.danhmuc_page.index', compact('danhmuc', 'bestSales'));
        } else {
            toastr()->error('Liên kết không tồn tại');
            return redirect('/');
        }
    }

    public function thuonghieuProducts($id)
    {
        $thuonghieu = ThuongHieu::find($id);
        if ($thuonghieu) {
            return view('client.pages.thuonghieu_page.index', compact('thuonghieu'));
        } else {
            toastr()->error('Liên kết không tồn tại');
            return redirect('/');
        }
    }


    public function login()
    {
        return view('client.pages.login.index');
    }
    public function contact()
    {
        return view('client.pages.contact.index');
    }
    public function about()
    {
        return view('client.pages.about.index');
    }

    public function register()
    {
        return view('client.pages.register.index');
    }

    public function detailGiay($id)
    {
        $prod = Product::find($id);
        if ($prod) {
            $options = ProductVariants::join('cau_hinhs', 'product_variants.cau_hinh_id', 'cau_hinhs.id')
                ->join('mau_sacs', 'product_variants.mau_sac_id', 'mau_sacs.id')
                ->where('product_variants.product_id', $prod->id)
                ->select('product_variants.*', 'cau_hinhs.ten_cau_hinh', 'mau_sacs.ten_mau_sac')
                ->get();
            $colors = ProductVariants::where('product_id', $prod->id)
                ->join('mau_sacs', 'product_variants.mau_sac_id', '=', 'mau_sacs.id')
                ->select('mau_sacs.id', 'mau_sacs.ten_mau_sac', 'product_variants.hinh_anh')
                ->distinct()
                ->get();

            return view('client.pages.product_detail', compact('prod', 'options', 'colors'));
        } else
            return redirect('/');
    }

    public function allProduct()
    {
        return view('client.pages.shop.all_product');
    }
    public function search($tt)
    {
        $ttsearch = Product::where('ten_san_pham', 'like', '%'.$tt.'%')
                ->get();

        // dd($ttsearch->toArray());
        return view('client.pages.shop.search_product', compact('ttsearch'));
    }
}
