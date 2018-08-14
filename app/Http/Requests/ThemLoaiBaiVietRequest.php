<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemLoaiBaiVietRequest extends FormRequest
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
            'tenloai'=>'required|min:4|unique:loaibaiviets,tenloai',
        ];
    }
    public function messages(){
		return [
            'tenloai.required' => 'Tên loại bài viết không được để trống',
            'tenloai.min' => 'Tên loại bài viết quá ngắn',
            'tenloai.unique' => 'Tên loại bài viết đã tồn tại'
		];
	}
}
