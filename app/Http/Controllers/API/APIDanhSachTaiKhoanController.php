<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\DanhMuc;
use App\Models\DanhSachTaiKhoan;
use App\Models\QuyenChucNang;
use Exception;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;

class APIDanhSachTaiKhoanController extends Controller
{
    public function store(Request $request)
    {
        //gán id chức năng cho route chức năng tương ứng rồi check sau
        $id_chuc_nang = 106;
        $user_login = Auth::guard('admin')->user();

        //check thằng tài khoản này được cấp quyền gì trước r sau đó kiểm tra chức năng được cho phép của quyền đó
        $check = QuyenChucNang::where('id_quyen', $user_login->id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();

        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {

            $data   = $request->all();

            DanhSachTaiKhoan::create($data);
            DB::commit();

            return response()->json([
                'status'    => true,
                'message'   => 'Đã thêm mới phim thành công!'
            ]);
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        try {
            $danhSachTaiKhoan = DanhSachTaiKhoan::find($request->id);
            if ($danhSachTaiKhoan) {
                $data = $request->all();
                if (!empty($data['password'])) {
                    $data['password'] = bcrypt($data['password']);
                } else {
                    unset($data['password']);
                }
                $danhSachTaiKhoan->update($data);
                DB::commit();
                return response()->json([
                    'status'  => 1,
                    'message' => 'Cập nhật tài khoản thành công!'
                ]);
            } else {
                return response()->json([
                    'status'  => 0,
                    'message' => 'Tài khoản không tồn tại!'
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function data()
    {
        $data   = DanhSachTaiKhoan::get();

        return response()->json([
            'xxx'    => $data,
        ]);
    }

    public function status(Request $request)
    {
        DB::beginTransaction();
        try {

            $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);
            // dd($danhSachTaiKhoan);
            if ($danhSachTaiKhoan) {
                if ($danhSachTaiKhoan->tinh_trang == 1) {
                    $danhSachTaiKhoan->tinh_trang = 0;
                } else {
                    $danhSachTaiKhoan->tinh_trang = 1;
                }
                $danhSachTaiKhoan->save();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật trạng thái!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản không tồn tại!'
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function block(Request $request)
    {
        DB::beginTransaction();
        try {

            $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);
            // dd($danhSachTaiKhoan);
            if ($danhSachTaiKhoan) {
                if ($danhSachTaiKhoan->is_block == 1) {
                    $danhSachTaiKhoan->is_block = 0;
                } else {
                    $danhSachTaiKhoan->is_block = 1;
                }
                $danhSachTaiKhoan->save();
                DB::commit();

                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã cập nhật trạng thái!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản không tồn tại!'
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function info(Request $request)
    {
        //gán id chức năng cho route chức năng tương ứng rồi check sau
        $id_chuc_nang = 107;
        $user_login = Auth::guard('admin')->user();

        //check thằng tài khoản này được cấp quyền gì trước r sau đó kiểm tra chức năng được cho phép của quyền đó
        $check = QuyenChucNang::where('id_quyen', $user_login->id_quyen)
            ->where('id_chuc_nang', $id_chuc_nang)
            ->first();

        if (!$check) {
            return response()->json([
                'status'    => 0,
                'message'   => 'Bạn không có quyền cho chức năng này!',
            ]);
        }

        DB::beginTransaction();
        try {

            $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);
            if ($danhSachTaiKhoan) {
                DB::commit();
                return response()->json([
                    'status'    => 1,
                    'data'      => $danhSachTaiKhoan
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản không tồn tại!'
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {

            $danhSachTaiKhoan   = DanhSachTaiKhoan::find($request->id);

            if ($danhSachTaiKhoan) {
                $danhSachTaiKhoan->delete();
                DB::commit();
                return response()->json([
                    'status'    => 1,
                    'message'   => 'Đã xóa tài khoản thành công!'
                ]);
            } else {
                return response()->json([
                    'status'    => 0,
                    'message'   => 'Tài khoản không tồn tại!'
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }

    public function ClientRegister(RegisterRequest $request)
    {
        $check = DanhSachTaiKhoan::where('email', $request->email)->first();
        if (!$check) {
            $data               = $request->all();
            $data['is_block']   =   0;
            $data['tinh_trang'] =   1;
            $data['active_code'] = Str::uuid();

            $data['password']   = bcrypt($request->password);
            DanhSachTaiKhoan::create($data);

            return response()->json([
                'status'    => 1,
                'message'   => 'Đăng ký tài khoản thành công!',
            ]);
        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'email này đã được đăng ký tài khoản, vui lòng chọn email khác !',
            ]);
        }
    }

    public function ClientLogin(LoginRequest $request)
    {
        // $check  = Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password]);
        // if($check == true) {
        //     $user = Auth::guard('client')->user();
        //     if($user->tinh_trang == 1)
        //     {
        //         return response()->json([
        //             'status'    => 0,
        //             'message'   => 'Tài khoản chưa được kích hoạt!',
        //         ]);
        //     }
        //     if($user->is_block == 1)
        //     {
        //         return response()->json([
        //             'status'    => 0,
        //             'message'   => 'Tài khoản chưa đã bị khóa!',
        //         ]);
        //     }
        //     // Đã đúng email và mật khẩu + đã cấp session   => Biến session tên gì và dùng như thế nào?
        //     return response()->json([
        //         'status'    => 1,
        //         'message'   => 'Đã đăng nhập thành công!',
        //     ]);
        // } else {
        //     return response()->json([
        //         'status'    => 0,
        //         'message'   => 'Tài khoản hoặc mật khẩu không đúng!',
        //     ]);
        // }

        $check      =   DanhSachTaiKhoan::where('email', $request->email)
            // ->where('password', $request->password)
            ->first();
        if ($check) {
            $mk_luu     =   $check->password;
            $mk_nhap    =   $request->password;

            if (password_verify($mk_nhap, $mk_luu)) {
                if ($check->tinh_trang == 0) {
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Tài khoản chưa được kích hoạt!',
                    ]);
                }
                if ($check->is_block == 1) {
                    return response()->json([
                        'status'    => 0,
                        'message'   => 'Tài khoản chưa đã bị khóa!',
                    ]);
                }
                // Ở đây nghĩa là ta check email và password nó giống ở database
                // Ta cần tạo 1 biến auth và giá trị và thông tin tài khoản của user vừa đăng nhập
                // Session::start();
                Session::put('auth', $check);
                return response()->json([
                    'status'    => 1,
                    'message'   => 'đăng nhập thành công !',
                ]);
            }
            else
            return response()->json([
                'status'    => 0,
                'message'   => 'mật khẩu không hợp lệ!',
            ]);

        } else {
            return response()->json([
                'status'    => 0,
                'message'   => 'tài khoản không tồn tại!',
            ]);
        }
    }

    public function ClientLogout(Request $request)
    {
        session()->forget('auth');
        return response()->json([
            'status' => '1'
        ]);
    }

    public function checkmail(Request $request)
    {
        $taikhoan = DanhSachTaiKhoan::where('email', $request->email)->first();
        if ($taikhoan) {
            $taikhoan->change_password_code = Str::uuid();
            $taikhoan->save();

            $data['ho_va_ten'] = $taikhoan->ho_va_ten;
            $data['link']      = env('APP_URL') . '/home/reset-password/' . $taikhoan->change_password_code;
            Mail::to($taikhoan->email)->send(new SendMail('Khôi phục mật khẩu', 'client.pages.reset_password.active_reset_password', $data));
            // SendMailJob::dispatch($taikhoan->email, 'Khôi phục mật khẩu', 'client.pages.reset_password.active_reset_password', $data);
            return response()->json([
                'status' => 1,
                'message' => 'vui lòng kiểm tra mail của bạn'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Không tìm thấy email vui lòng nhập lại !'
            ]);
        }
    }

    public function changePassword(Request $request)
    {
        DB::beginTransaction();
        try {
            $taikhoan = DanhSachTaiKhoan::where('change_password_code', $request->id)->first();
            if ($taikhoan) {
                if ($request->password == $request->re_password) {
                    $taikhoan->password = bcrypt($request->password);
                    $taikhoan->save();
                    $taikhoan->change_password_code = null;
                    DB::commit();
                    return response()->json([
                        'status' => 1,
                        'message' => 'cập nhật mật khẩu thành công !'
                    ]);
                } else {
                    return response()->json([
                        'status' => 0,
                        'message' => 'Mật khẩu không trùng nhau vui lòng nhập lại !'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 0,
                    'message' => 'tài khoản không tồn tại'
                ]);
            }
        } catch (Exception $e) {
            Log::error($e);
            DB::rollBack();
        }
    }
}
