<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CauHinhController extends Controller
{
    //
    public function index()
    {
        return view('admin.page.cau_hinh.index');
    }
}
