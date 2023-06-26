<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'          => 'required',
            'email'         => 'required|unique:users,email',
            'role'          => 'required',
            'thumbnail'     => 'required|mimes:jpeg,png,jpg'
        ];
    }

    public function messages()
    {
        return [
            'required'      => ':attribute bắt buộc phải có',
            'mimes'         => 'Sai định dạng hình ảnh cho phép',
            'image'         => ':attribute bắt buộc phải là ảnh',
            'unique'        =>':attribute đã tồn tại'
        ];
    }

    public function attributes()
    {
        return [
            'name'          => 'Tên',
            'email'         => 'Email',
            'role'          => 'Vai trò',
            'thumbnail'     => 'Ảnh đại diện'
        ];
    }
}
