<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticelFormRequest extends Request
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
            'title' => 'required',
            'content' => 'required',
            'tag' => 'required'
        ];
    }

    /**
     * 验证提示
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => '文章标题不能为空',
            'content.required' => '文章内容不能为空',
            'tag.required' => 'Tag不能为空'
        ];
    }
}
