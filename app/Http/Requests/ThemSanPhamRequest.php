<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemSanPhamRequest extends FormRequest
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
            'tensp'=>'required|min:10',
            'soluong' => 'required',
            'gia' => 'required'
        ];
    }
    public function messages(){
		return [
            'tensp.required' => 'Tên sản phẩm không được để trống',
            'tensp.min' => 'Tên sản phẩm quá ngắn',
            'gia.required' => 'Phải nhập giá cho sản phẩm',
            'soluong.required' => 'Phải nhập số lượng'
		];
	}
}
