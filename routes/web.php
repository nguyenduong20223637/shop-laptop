<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CauHinhController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DanhSachTaiKhoanController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\GiayController;
use App\Http\Controllers\GioHangController;
use App\Http\Controllers\KichThuocController;
use App\Http\Controllers\LoaiGiayController;
use App\Http\Controllers\MauSacController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuyenController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\ThuongHieuController;
use App\Http\Controllers\TrangChuController;
use App\Models\DanhSachTaiKhoan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/test', [TestController::class, 'index']);
Route::get('/admin/login', [AdminController::class, 'login']);
Route::get('/', [TrangChuController::class, 'index']);
Route::get('/active-account/{id}', [DanhSachTaiKhoanController::class, 'active']);

Route::group(['prefix' => '/home'], function(){
    Route::group(['prefix' => 'danh-muc'], function(){
        Route::get('/{id}', [TrangChuController::class, 'danhmucProducts']);
    });
    Route::group(['prefix' => 'thuong-hieu'], function(){
        Route::get('/{id}', [TrangChuController::class, 'thuonghieuProducts']);
    });
    Route::group(['prefix' => 'cart'], function(){
        Route::get('/', [GioHangController::class, 'index']);
        Route::get('/check-out/{id}', [DonHangController::class, 'checkout']);
        Route::get('/order-complete', [DonHangController::class, 'orderComplete']);
    });

    Route::group(['prefix' => 'order'], function(){
        Route::get('/', [DonHangController::class, 'index']);
        Route::get('/detail/{id_don_hang}', [DonHangController::class, 'detail']);
    });

    Route::get('/contact', [TrangChuController::class, 'contact']);
    Route::get('/about-us', [TrangChuController::class, 'about']);
    Route::get('/all-product', [TrangChuController::class, 'allProduct']);
    Route::get('/search/{tt}', [TrangChuController::class, 'search']);
    Route::get('/forgot-password', [DanhSachTaiKhoanController::class, 'forgotPassword']);
    Route::get('/reset-password/{id}', [DanhSachTaiKhoanController::class, 'resetPassword']);

    Route::get('/product-detail/{id}', [TrangChuController::class, 'detailGiay']);
    Route::get('/login', [TrangChuController::class, 'login']);
    Route::get('/register', [TrangChuController::class, 'register']);
});


Route::group(['prefix' => '/admin', 'middleware' => 'APIAdmin'],function() {

    Route::get('/', [AdminController::class, 'index']);

    Route::group(['prefix' => '/product'], function(){
        Route::get('/', [ProductController::class, 'addProduct']);
    });

    Route::group(['prefix' => '/banner'], function(){
        route::get('/', function(){ return view('admin.page.banner.index'); })->name('adminBanner');
    });

    Route::group(['prefix' => '/thuong-hieu'], function(){
        route::get('/', [ThuongHieuController::class, 'index']);
    });

    Route::group(['prefix' => '/mau-sac'], function(){
        route::get('/', [MauSacController::class, 'index']);
    });

    Route::group(['prefix' => '/don-hang'], function(){
        route::get('/', [DonHangController::class, 'orderManager']);
    });

    Route::group(['prefix' => '/kich-thuoc'], function(){
        route::get('/', [KichThuocController::class, 'index']);
    });

    Route::group(['prefix' => '/cau-hinh'], function(){
        route::get('/', [CauHinhController::class, 'index']);
    });

    Route::group(['prefix' => '/danh-muc'], function(){
        route::get('/', [DanhMucController::class, 'index']);
    });

    Route::group(['prefix' => '/danh-sach-tai-khoan'], function(){
        route::get('/', [DanhSachTaiKhoanController::class, 'index']);
    });

    Route::group(['prefix' => '/quyen'], function(){
        route::get('/', [QuyenController::class, 'index']);
    });

    Route::group(['prefix' => '/thong-ke'], function(){
        route::get('/top-products', [ThongKeController::class, 'topProducts']);
        route::get('/doanh-thu', [ThongKeController::class, 'revenue']);
    });
});


