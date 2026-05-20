<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThongKeRequest extends FormRequest
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
            'begin' => 'required|date|before:end',
            'end'   => 'required|date|after:begin',
        ];
    }

    public function messages()
    {
        return [
            'begin.required' => 'Vui lòng chọn ngày bắt đầu.',
            'begin.date' => 'Ngày bắt đầu phải có định dạng ngày tháng.',
            'begin.before' => 'Ngày bắt đầu không được sau ngày kết thúc.',
            'end.required' => 'Vui lòng chọn ngày kết thúc.',
            'end.date' => 'Ngày kết thúc phải có định dạng ngày tháng.',
            'end.after' => 'Ngày kết thúc không được trước ngày bắt đầu.',
        ];
    }
}
