<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Model\Admin;
use Crypt;

class AdminController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
//    public function __construct() {

//       if(session('id'))
//        {
//        $id=session('id');
//        $admin=Admin::find($id);
//        $role=explode('|',$admin->role);
//        if(session('admin_type')=='普通管理员'){
//            return  redirect()->back();
//        }
//        View::share(['role'=>$role]);
//        }else{
//        return redirect('ad_login');
//        }
//    }
    public function index(Request $request)
    {   
        $role= explode('|',session('role'));

       if(!in_array('管理员查看',$role)){     
           
         
           return redirect('admin/manage');
         }
        $query=Admin::query();
        if($request->has('name')){
            $name=$request->input('name'); 
            if($this->is_account($name)){
            $query->where('account_num', 'like','%'.$name.'%');  
            }else{
            $query->where('name', 'like','%'.$name.'%');
            }
        }
        $data=$query->type()->get();   
        return view('admin/admin/index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role= explode('|',session('role'));
 
       if(!in_array('管理员添加',$role)){   
           
          
           return redirect('admin/manage');
         }
       
        return view('admin/admin/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       
    
        date_default_timezone_set("Asia/Shanghai");
        $data=$request->except(['_token','password2']);
        $data['password']=Crypt::encrypt($data['password']);
             
        $new=Admin::where('account_num',$data['account_num'])->get();
      
        if(count($new)!=0){
          return redirect()->back()->with('msg','账号已存在');
        }
        //保存权限
       
        $data['role']=implode("|", $data['role']);
     
    
       $role= explode('|',session('role'));
       if(!in_array('管理员添加',$role)){          
           return redirect('admin/manage');
         }
        Admin::create($data);
        return redirect()->back()->with('status','ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        
        $role= explode('|',session('role'));
        if(!in_array('管理员修改',$role)){          
           return redirect('admin/manage');
         }
        $data=Admin::find($id);
        $data->role=explode('|',$data->role);
        return view('admin/admin/edit')->with('data',$data); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
     
         
        
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
       
    }
     public function delete(Request $request)
    {
        //
          $role= explode('|',session('role'));
        if(!in_array('管理员删除',$role)){          
           return redirect('admin/manage');
         }

         $id=  $request->input('data');         
         Admin::destroy($id);
         return $id; 
    }
    public function check(Request $request){
        $account_num=  $request->input('data');         
        $admin=Admin::where('account_num',$account_num)->get();
        
        $count=count($admin);
       if($count==0){
           return "1";
           
       }else
           return "2";
    }
    //判断是账号还是姓名
    function  is_account($name){
      if (preg_match("/[\x7f-\xff]/", $name)) { 
       return false;
      }else{ 
        return true;
      }   
        
    }
    
    function info(){
          
       $id=session('id');
       $admin=Admin::find($id);
       $admin['role']=explode('|',$admin['role']);
        return view('admin/admin/info')->with('admin',$admin);
        }
        
       // 管理员修改自己信息
    function modify(Request $request){
        $id=session('id');
        $admin=Admin::find($id);
        if($request->input()){
           $password=$request->input('password');
           if($password!==Crypt::decrypt($admin->password)){
           return redirect()->back()->with('msg','密码错误');
               }
           $up_admin = Admin::find($id);
           $up_admin->name=$request->input('name');
           if($request->has('password1')){
           $up_admin->password=Crypt::encrypt($request->input('password1')); 
            }
           $up_admin->save();
           return redirect()->back()->with('status','修改成功');
        }
         return view('admin/admin/modify')->with('admin',$admin);  
    }
    //超级管理员修改普通管理员信息
      public function set(Request $request, $id)
    {
        //
          
           $role= explode('|',session('role'));
        if(!in_array('管理员修改',$role)){          
           return redirect('admin/manage');
         }
        $up_admin = Admin::find($id);
        if( $request->has('name')){
        $up_admin->name=$request->input('name');
        }
        if($request->has('password')){
           $up_admin->password=Crypt::encrypt($request->input('password')); 
           }
        if($request->has('role')){
           $up_admin->role=implode('|',$request->input('role')); 
        }
        $up_admin->save();
        return redirect()->back()->with('msg','修改成功');
        
    }
    
    public function is_stop(Request $request){
        
        
         $role= explode('|',session('role'));
         if(!in_array('管理员禁用',$role)){          
            $msg='没有权限';
             return $msg;
          }
        $data=$request->input('data');
        
      
        $admin=Admin::find($data);
        if($admin->is_stop=="已启用"){
            
           
            $admin->is_stop="已禁用";
        }else{
           
             $admin->is_stop="已启用"; 
        }
        $admin->save();
        return $data;       
    }
    
}
