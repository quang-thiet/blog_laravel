<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' =>'required|',
            'email' =>'required|unique:users,email',
            'password'=>'required | min:6 | max:20',
            'password-2' => 'required | min:6 | max:20'

        ];
    }

    public function messages()
    {
        return [
            'required' => 'vui lòng không bỏ trống :attribute',
            'unique' =>':attribute đã tồn tại',
            'min' => ':attribute tối thiểu 6 ký tự',
            'max' => ' :attribute tối đa chỉ 20 ký tự '
        ];
    }


    public function attributes()
    {
        return [
            
            'name'=>'Tên',
            'email' =>'Email',
            'password' =>'Mật khẩu',
            'password-2' => 'Mật khẩu nhập lại '
            
        ];
    }
}
