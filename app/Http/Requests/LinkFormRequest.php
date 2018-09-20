<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LinkFormRequest extends Request
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
            'links_name' => 'required',
            'links_url' => 'required'
        ];
    }

    /**
     * 中文信息提示
     *
     * @return array
     */
    public function messages()
    {
        return [
            'links_name.required' => '友情链接名称不能为空',
            'links_url.required' => '友情链接地址不能为空'
        ];
    }


}
