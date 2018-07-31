<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleRequest extends Request
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
            //
            'editorValue'=>'required',//验证密码
            'title'=>'required',
        ];
    }
    public function messages(){
        return [
            'editorValue.required' => '文章内容不能为空',
            'title.required' => '文章标题不能为空',
        ];
    }
}
