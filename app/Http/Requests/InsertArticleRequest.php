<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InsertArticleRequest extends Request
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
            'descript' => 'required',
            'cate_id' => 'numeric'
        ];
    }
    public function messages()
    {
        return[
        'title.required' => '文章标题不能为空',
        'content.required' => '文章内容不能为空',
        'descript.required' => '文章描述不能为空,',
        'cate_id.numeric' => '文章的分类参数有误'
        ];
    }
}
