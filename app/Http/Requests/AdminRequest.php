<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminRequest extends Request
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
            
            'name'=>'required',//验证密码
            'account_num'=>'required',
//            'gender'=>'required',
            'password'=>'required',
            'password2'=>'required',
//            'cellphone'=>'required',
           
        ];
    }
}
