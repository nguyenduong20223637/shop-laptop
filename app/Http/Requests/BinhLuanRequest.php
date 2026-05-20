<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BinhLuanRequest extends FormRequest
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
            'content' => 'required|between:10,255|string',
            'product_id' => 'required|integer',
            'ratting'   =>  'required|digits_between:1,5'
        ];
    }

    public function messages()
    {
        return [
            'content.required'  => 'vui lòng nhập nội dung bình luận',
            'content.between'       => 'vui lòng nhập nội dung có độ dài từ 10-255 ký tự',
            'product_id.*'      => 'thiếu hoặc sai product id kìa bro',
            'ratting.*'         => 'Vui lòng chọn sao đánh giá !'
        ];
    }
}
