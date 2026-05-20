<?php

namespace App\Http\Controllers;

use App\Models\DanhSachTaiKhoan;
use App\Models\DonHang;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class DonHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index()
     {
       $user =  session()->get('auth');
        if($user)
        {
            return view('client.pages.don_hang.index');
        }else{
            toastr()->error('vui lòng đăng nhập để sử dụng chức năng này !');
            return redirect('/');
        }
     }

    public function checkout($id)
    {
        //
        $check = DanhSachTaiKhoan::where('checkout_code', $id)->first();
        if($check)
        {
            $check->checkout_code = null;
            $check->save();
            return view('client.pages.cart.checkout');
        }
        else
        {
            toastr()->error('Liên kết không tồn tại !');
            return redirect('/');
        }
    }

    public function detail($id_don_hang)
    {
        $user =  session()->get('auth');
        if($user)
        {
            return view('client.pages.don_hang.detail', compact('id_don_hang'));
        }else{
            toastr()->error('vui lòng đăng nhập để sử dụng chức năng này !');
            return redirect('/');
        }
    }
    public function orderComplete()
    {
        return view('client.pages.cart.OrderComplete');
    }

    public function orderManager(Request $request)
    {
        return view('admin.page.don_hang.index');
    }

    /**
     * Show the form for creating a new resource.
     */

}
