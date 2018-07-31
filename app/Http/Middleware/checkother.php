<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use App\Model\User;

class checkother
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
         if(session('user_id')){
        $id=session('user_id');        
         $user=User::find($id);
         
        if(Session::getId()!= $user->last_session){//如果浏览器传递上来的session_id和数据库中存储的进行比较
            $request->session()->forget('name');
            $request->session()->forget('nick_name');
            $request->session()->forget('user_id');
            $request->session()->forget('thumb');//重新登录挤掉          

            
            return redirect('shouye');
       }
        
         }
        return $next($request);
    }
}
