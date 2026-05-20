<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThongKeController extends Controller
{
    //
    public function topProducts()
    {
        return view('admin.page.thong_ke.top_products');
    }

    public function revenue()
    {
        return view('admin.page.thong_ke.doanh_thu');
    }
}
