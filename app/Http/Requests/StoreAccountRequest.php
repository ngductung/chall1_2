<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'username' => 'bail|required|min:5|max:50|unique:accounts,username|',
            'password' => 'bail|required|min:5|max:50|'
        ];
    }

    public function messages()
    {
        return [
            // 'username.unique' => 'Đã tồn tại username',
            // 'password.min' => 'Mật khẩu chưa đủ độ dài'
        ];
    }
}
