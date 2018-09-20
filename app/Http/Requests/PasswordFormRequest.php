<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PasswordFormRequest extends Request
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
            'new_password' => 'required | confirmed'
        ];
    }

    /**
     * 错误提示
     * @return array
     */
    public function messages()
    {
        return [
            'new_password.required' => '新密码不能为空!',
            'new_password.confirmed' => '新密码和确认密码不一致!'
        ];
    }
}
