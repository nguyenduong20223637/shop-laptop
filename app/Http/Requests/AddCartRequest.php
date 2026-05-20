<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCartRequest extends FormRequest
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
            'id' => 'required|numeric|not_in: -1',
            'so_luong' => 'required|numeric|between:1, 20'
        ];
    }

    public function messages()
    {
        return [
            'id.*' => 'vui lòng chọn cấu hình',
            'so_luong.*' => 'Vui lòng không bỏ trống hoặc nhập quá số lượng (1-20)!',
        ];
    }
}
