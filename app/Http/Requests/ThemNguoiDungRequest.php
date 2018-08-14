<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemNguoiDungRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'hoten'=>'required|min:4',
            'email'=>'required|email',
            'matkhau'=>'required|min:8',
            'diachi'=>'required|min:15',
            'sdt'=>'required|min:9|max:12'
        ];
    }
    public function messages(){
		return [
            'hoten.required' => 'Họ tên không được để trống',
            'hoten.min' => 'Họ tên quá ngắn',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không phù hợp',
            'matkhau.required' => 'Mật khẩu không được để trống',
            'matkhau.min' => 'Mật khẩu quá ngắn',
            'diachi.required' => 'Địa chỉ không được để trống',
            'diachi.min' => 'Địa chỉ quá ngắn',
            'sdt.required' => 'Số điện thoại không được để trống',
            'sdt.min' => 'Số điện thoại không phù hợp',
            'sdt.max' => 'Số điện thoại không phù hợp',
		];
	}
}
