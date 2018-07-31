<?php

namespace App\Http\Middleware;


use App\Model\Admin; 
use Closure;
use Illuminate\Support\Facades\Session;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if (!session('id')) {
            return redirect('ad_login');
        }
        $id=session('id');        
        $admin=Admin::find($id);
        $role=explode('|',$admin->role);  
        if(Session::getId()!= $admin->last_session){//如果浏览器传递上来的session_id和数据库中存储的进行比较
            $request->session()->forget('account_num');
            $request->session()->forget('admin_type');
            $request->session()->forget('id');
            $request->session()->forget('role');//重新登录挤掉          
//清除session
          return redirect('welcome');
       }
//         $url=$request->getPathInfo();
//        
//         $array=['/admin/article'=>'文章查看',''
//             '/admin/article/notice'=>'公告查看','/admin/department'=>'部门查看','/admin/comment'=>'评论查看','/admin/user'=>'用户查看','/admin/ad_admin'=>'管理员查看'，]; 
//       
//         $name=$array[$url];
//        
//          if(!in_array($name, $role)){
//        
//            return redirect('admin/manage');
//            
//        }
        

        return $next($request);
    }
}
