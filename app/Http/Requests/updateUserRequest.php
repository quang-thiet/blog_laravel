<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateUserRequest extends FormRequest
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
            'name'  =>'required',
            'email' =>'required|email',
            'role'  =>'required',
            'thumbnail' => 'nullable|image'
        ];
    }

    public function messages()
    {
        return [
            'required'=>':attribute  vui lòng không bỏ trống',
            'email' => ':attribute sai định dạng',
            'image'=> ':attribute ảnh sai định dạng'
        ];
    }

    public function attributes()
    {
        return [
            'name' =>'Tên ',
            'email' => 'Email',
            'thumbnail'=> 'Image'
        ];
    }
}
