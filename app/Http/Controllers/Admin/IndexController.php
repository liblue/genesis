<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use Validator;
use Crypt;
use Illuminate\Support\Facades\Session;


class IndexController extends Controller
{
    //
    
    
    public function index(){
       
        $id=session('id');
        $admin=Admin::find($id);
        $role=explode('|',$admin->role);
        $type=$admin->type;
        return view('admin/index/index')->with('role',$role)->with('type',$type);
    }
    
    public  function login(Request $request){
       
        
        if($request->input()){
//            $request->session()->forget('account_num');
//            $request->session()->forget('admin_type');
//            $request->session()->forget('id');
//            $request->session()->forget('role');//重新登录挤掉
                         
            $data=$request->input();               
            $admin=Admin::where('account_num',$data['account_num'])->first(); 
            if(!count($admin)){
               return redirect()->back()->with('msg',"账号不存在");
            }
            if(Crypt::decrypt($admin->password)!=$data['password']){
              return redirect()->back()->with('msg',"密码错误");
            }    
            if($admin->is_stop=="已禁用"){
               return redirect()->back()->with('msg',"账号不存在");
            }
                 date_default_timezone_set("Asia/Shanghai");
                 
                 
                 $admin->last_session= Session::getId();
                 $admin ->last_login=date('Y-m-d h:m:i' );
                 $admin->save();                                                              
                 session(['account_num'=>$admin->account_num]);
                 session(['admin_type'=>$admin->type]);
                 session(['id'=>$admin->id]);
                 session(['role'=>$admin->role]);

           
            return redirect('admin/manage');
        }
     
        return view('admin/index/login');
    }
    
    
    
   protected function validateLogin(array $data)
    {
        return Validator::make($data, [
            'account_num' => 'required',
            'password' => 'required',
        ],
          [
            'required' => ':attribute 为必填项',
            'min' => ':attribute 长度不符合要求'
        ], [
            'account_num' => '账号',
            'password' => '密码'
        ]);
    }
    
    
    public  function   logout(Request $request){
        $request->session()->forget('account_num');
        $request->session()->forget('admin_type');
        $request->session()->forget('id');
        $request->session()->forget('role');
        return redirect('ad_login');
        
    }
    
  
    
    

           
}
