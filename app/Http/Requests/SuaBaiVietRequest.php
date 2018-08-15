<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuaBaiVietRequest extends FormRequest
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
            'tieude'=>'required|min:4',
            'noidung'=>'required'
        ];
    }
    public function messages(){
		return [
            'tieude.required' => 'Tiêu đề bài viết không được để trống',
            'tieude.min' => 'Tiêu đề bài viết quá ngắn',
            'noidung.required' => 'Nội dung không được để trống'
		];
	}
}
