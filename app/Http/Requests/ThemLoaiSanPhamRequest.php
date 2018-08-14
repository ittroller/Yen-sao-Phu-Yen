<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemLoaiSanPhamRequest extends FormRequest
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
            'tenloai'=>'required|min:4|unique:loaisanphams,tenloai',
        ];
    }
    public function messages(){
		return [
            'tenloai.required' => 'Tên loại sản phẩm không được để trống',
            'tenloai.min' => 'Tên loại sản phẩm quá ngắn',
            'tenloai.unique' => 'Tên loại sản phẩm đã tồn tại'
		];
	}
}
