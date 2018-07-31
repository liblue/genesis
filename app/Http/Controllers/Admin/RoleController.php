<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Role;
use App\Model\Department;
use App\Model\User;

class RoleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index(Request $request)
    {
        //
        
         $role= explode('|',session('role'));
   
         if(!in_array('角色查看',$role)){    
            return redirect('admin/manage');
         }
         
         $department=Department::all();
        $query= Role::query();
        if($request->has('department_id')){
            
            $department_id=$request->input('department_id');
            $query->where('department_id',$department_id);
        }
        
        $data=$query->get();
        return view('admin/department/role')->with('data',$data)->with('department',$department);
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
         $department=Department::all();
         if(!in_array('角色添加',$role)){    
       
            return redirect('admin/manage');
           
         }   
         return view('admin/department/role_add')->with('department',$department);
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
          $role= explode('|',session('role'));
          if(!in_array('角色添加',$role)){   
           return redirect()->back()->with('msg','没有权限');
         }
       $name=$request->input('name'); 
       $department_id=$request->input('department_id'); 
    
       $role=Role::where('name',$name)->where('department_id',$department_id)->get();
       
     
          if(count($role)){
              
         
              return redirect()->back()->with('msg','部门已存在本角色');
          }else{
          Role::create(['name'=>$name,'department_id'=>$department_id]);
          }
          return redirect()->back()->with('msg','添加成功');
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
    {
         
      
        $role= explode('|',session('role'));
        if(!in_array('角色删除',$role)){   
           
            $msg='没有权限';
             return $msg;
         }
        
         $id=$request->input('data');     
         $user=User::where('role_id',$id)->get();
         if(count($user)){
         $msg="此角色存在用户";
         return $msg;

         }
         Role::destroy($id);
           return $id; 
         
         
    }
    
     public function set(Request $request)
    {
        //
           $role= explode('|',session('role'));
           if(!in_array('角色修改',$role)){   
            $msg='没有权限';
             return $msg;
         }
          $name=  $request->input('data');   
          $id= $request->input('id');   
          $role= Role::where('name',$name)->get();
          if(count($role)){ 
              if($role[0]->id!=$id){
              return "角色已存在";
              }
          }else{
       $role= Role::find($id);
       $role->name=$name;
       $role->save();
          }
          return "修改成功";
    }
}
