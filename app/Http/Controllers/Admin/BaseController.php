<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Model\Admin;

class BaseController extends Controller
{
    //
    
    public function __construct(Request $request) {
  

        if(session('id'))
        {          
        $id=session('id');
        $admin=Admin::find($id);
        $role=explode('|',$admin->role);        
         $type=$admin->type;
        View::share(['role'=>$role,'type'=>$type]);
       
      
        }
    }
    
    public  function  checkrole($str){
         $role= explode('|',session('role'));
   
         if(!in_array($str,$role)){    
       
           return redirect('admin/manage');
         }
         
         return  0;
        
        
    }
}
