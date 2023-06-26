<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'         => 'required',
            'slug'          => 'required',
            'content'       => 'required',
            'categories'    => 'required',
            'thumbnail'     => 'required|mimes:jpeg,png,jpg'
        ];
    }

    public function messages()
    {
        return[
            'required'      => ':attribute bắt buộc phải có',
            'mimes'         => 'Sai định dạng hình ảnh cho phép',
            'image'         => ':attribute bắt buộc phải là ảnh'
        ];
    }

    public function attributes()
    {
        return[
            'title'         => 'Tiêu đề',
            'slug'          => 'Đường dẫn',
            'content'       => 'Nội dung',
            'categories'    => 'Danh mục',
            'thumbnail'     => 'Ảnh đại diện'
        ];
    }
}
