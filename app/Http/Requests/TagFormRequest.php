<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TagFormRequest extends Request
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
            'tag' => 'required'
        ];
    }

    /**
     * 验证中文提示
     * @return array
     */
    public function messages()
    {
        return [
            'tag.required' => 'tag名称不能为空'
        ];
    }


}
