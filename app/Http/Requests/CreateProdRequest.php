<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'sanpham'               => 'required|array',
            'sanpham.ten_san_pham'  => 'required|min:5|max:255|unique:products,ten_san_pham',
            'sanpham.hinh_anh'      => 'required',
            'sanpham.mo_ta'         => 'required',
            'sanpham.danh_muc_id'   => 'required|numeric|exists:danh_mucs,id',
            'sanpham.thuong_hieu_id'=> 'required|numeric|exists:thuong_hieus,id',
            'sanpham.gia'           => 'required|numeric|min:0',
            'sanpham.tinh_trang'    => 'required|in:0,1',

            'options'               => 'required|array|min:1',
            'options.*.cau_hinh_id'   => 'required|numeric|exists:cau_hinhs,id',
            'options.*.gia_dieu_chinh'=> 'required|numeric',
            'options.*.mau_sac_id'    => 'required|numeric|exists:mau_sacs,id',
            'options.*.so_luong'      => 'required|numeric|gt:0|max:9999',
            'options.*.hinh_anh'      => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'sanpham.required' => 'Dữ liệu sản phẩm không được để trống!',
            'sanpham.ten_san_pham.required'  => 'Tên sản phẩm không được để trống!',
            'sanpham.ten_san_pham.min'  => 'Tên sản phẩm phải có ít nhất 5 ký tự!',
            'sanpham.ten_san_pham.unique'      => 'Tên sản phẩm đã tồn tại!',
            'sanpham.hinh_anh.required' => 'Hình ảnh không được để trống!',
            'sanpham.mo_ta.required'         => 'Mô tả không được để trống!',
            'sanpham.danh_muc_id.required'   => 'Vui lòng chọn danh mục!',
            'sanpham.danh_muc_id.exists'   => 'Danh mục không tồn tại!',
            'sanpham.thuong_hieu_id.required'=> 'Vui lòng chọn thương hiệu!',
            'sanpham.thuong_hieu_id.exists'=> 'Thương hiệu không tồn tại!',
            'sanpham.gia.required'           => 'Giá không được để trống!',
            'sanpham.gia.numeric'           => 'Giá phải là số!',
            'sanpham.gia.min'           => 'Giá phải lớn hơn 0!',
            'sanpham.tinh_trang.required'    => 'Vui lòng chọn tình trạng!',
            'sanpham.tinh_trang.in'    => 'Tình trạng không hợp lệ!',

            'options.required'                   => 'Vui lòng thêm ít nhất 1 biến thể sản phẩm!',
            'options.min'                   => 'Vui lòng thêm ít nhất 1 biến thể sản phẩm!',
            'options.*.cau_hinh_id.required'   => 'Vui lòng chọn cấu hình!',
            'options.*.cau_hinh_id.exists'   => 'Cấu hình không tồn tại!',
            'options.*.gia_dieu_chinh.required'=> 'Giá điều chỉnh không được để trống!',
            'options.*.gia_dieu_chinh.numeric'=> 'Giá điều chỉnh phải là số!',
            'options.*.mau_sac_id.required'      => 'Vui lòng chọn màu sắc!',
            'options.*.mau_sac_id.exists'      => 'Màu sắc không tồn tại!',
            'options.*.so_luong.required'        => 'Số lượng không được để trống!',
            'options.*.so_luong.gt'        => 'Số lượng phải lớn hơn 0!',
            'options.*.so_luong.max'        => 'Số lượng không được vượt quá 9999!',
        ];
    }
}
