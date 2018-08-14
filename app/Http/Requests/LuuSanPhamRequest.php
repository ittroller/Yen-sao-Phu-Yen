<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LuuSanPhamRequest extends FormRequest
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
            'tensp'=>'required',
        ];
    }
    public function messages(){
		return [
            'tensp.required' => 'Tên sản phẩm không được để trống',
		];
	}
}
