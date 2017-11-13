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
     * @return array
     */
    public function rules()
    {
        return [
            'txtPass' => 'required',
            'txtRePass' => 'required|same:txtPass',
            'txtPhone' =>'required',
            'txtAddress' => 'required',
            'txtEmail' => 'required|unique:users,email|regex:/^[a-z][a-z0-9]*(_[a-z0-9]+)*(\.[a-z0-9]+)*@[a-z0-9]([a-z0-9][a-z0-9]+)*(\.[a-z]{2,4}){1,2}$/ '
        ];
    }
    public function messages(){
       return [
        'txtPass.required'=> "Hãy nhập vào mật khẩu . ",
        'txtRePass.required'=> "Hãy nhập vào xác nhận mật khẩu . ",
        'txtRePass.same'=> "Mật khẩu không trùng khớp .",
        'txtPhone.required'=> "Hãy nhập vào phone . ",
        'txtAddress.required'=> "Hãy nhập vào address . ",
        'txtEmail.required'=> "Hãy nhập vào email . ",
        'txtEmail.unique'=> "Email đã tồn tại  .",
        'txtEmail.regex'=> "Email không đúng định dạng "
       ];
    }
}
