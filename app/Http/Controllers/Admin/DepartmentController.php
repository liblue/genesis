<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;
use App\Model\Department;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;

class DepartmentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
           $role= explode('|',session('role'));
   
         if(!in_array('部门查看',$role)){    
       
            return redirect('admin/manage');
           
         }
        $data= Department::get();
        return view('admin/department/index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
    {   $role= explode('|',session('role'));
        if(!in_array('部门删除',$role)){   
           
            $msg='没有权限';
             return $msg;
         }
        
         $id=$request->input('data');     
         $user=User::where('department_id',$id)->get();
         if(count($user)){
         $msg="此部门存在用户";
         return $msg;

         }
                  Department::destroy($id);
           return $id; 
    }
      public function add(Request $request)
    {
        //
          
          $role= explode('|',session('role'));
          if(!in_array('部门添加',$role)){   
           
            $msg='没有权限';
             return $msg;
         }
        
         $name=  $request->input('data');   
          $department= Department::where('name',$name)->get();
          if(count($department)){
              return "部门已存在";
          }else{
          Department::create(['name'=>$name]);
          }
          return "添加成功";
    }
       public function set(Request $request)
    {
        //
           $role= explode('|',session('role'));
           if(!in_array('部门修改',$role)){   
           
            $msg='没有权限';
             return $msg;
         }
           
          $name=  $request->input('data');   
          $id= $request->input('id');   
          
       
          $department= Department::where('name',$name)->get();
          
          if(count($department)){ 
              if($department[0]->id!=$id){
              return "部门已存在";
              }
          }else{
       $department= Department::find($id);
       
       $department->name=$name;
       $department->save();
          }
          return "修改成功";
    }
    
    
}
