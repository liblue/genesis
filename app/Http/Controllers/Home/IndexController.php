<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Model\User;
use App\Model\Department;
use App\Model\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Crypt;
use App\Model\Comment;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    //
    public function index(){
    	
    	 $data=Article::where('type','G友')->where('is_stop','已启用')->get();
         
       
    	
        
         return view('home/index/index')->with('data',$data);
    }
     public function shouye(){
    	
    	 $data=Article::where('type','G友')->where('is_stop','已启用')->get();

         return view('home/index/index')->with('data',$data);
    }
    public function notice(){
    	  $notice=Article::where('type','通知')->where('is_stop','已启用')->take(6)->get();                 
    	  $announcement=Article::where('type','动态')->where('is_stop','已启用')->get();
    	  return view('home/index/notice')->with('notice',$notice)->with('announcement',$announcement);
    }
     public function share(Request $request){
          $department=Department::all();
    	  $query=Article::where('type','分享')->where('is_stop','已启用');

         if($request->has('bumen')){           
            $bumen=$request->input('bumen');    
            $query= Article::join('users', 'articles.user_id','=','users.id')->where('users.department_id',$bumen)->select('articles.*','users.name','users.thumb');
        }
         if($request->has('plnum')){
             
             $query->orderby('plnum');
             
         }
         if($request->has('click')){
             
             $query->orderby('click');
             
         }
         if($request->has('like')){
             
             $query->orderby('like');
             
         }
        
          $data= $query->get();
     
       
    	  return view('home/index/share')->with('data',$data)->with('department',$department);
    }
     public function gyou(Request $request){
          $department=Department::all();
    	 $query=Article::where('type','G友')->where('is_stop','已启用');
//       
         if($request->has('bumen')){           
            $bumen=$request->input('bumen');    
            $query= Article::join('users', 'articles.user_id','=','users.id')->where('users.department_id',$bumen)->select('articles.*','users.name','users.thumb');
        }
         if($request->has('plnum')){
             $query->orderby('plnum','desc');
         }
         if($request->has('click')){
             $query->orderby('click','desc');
             
         }
         if($request->has('like')){
             $query->orderby('like','desc');
         }
        
          $data= $query->get();
    
       
    	  return view('home/index/gyou')->with('data',$data)->with('department',$department);
    }
  
    public function content($id){
//        $hot=DB::table('articles')->selectRaw('(like+click+plnum) as hot')->orderBy('hot', 'desc')->where('is_stop','已启用')->take(5)->get();
    	  $hot=Article::orderby('click')->where('is_stop','已启用')->take(5)->get();
    	  $data=Article::find($id);
        
          $data->click=$data->click+1;
          $data->save(); 
       
          
          
          $comment=$data->comment()->where('parent_id',0)->orderby('created_at','desc')->paginate(5);
          $comment1=$data->comment()->where('parent_id',"<>" ,0)->orderby('created_at','desc')->get();
          
         foreach($comment as $key=>& $value){
                $count=0;
                $recomment=[] ;
          foreach($comment1 as $k=>$v){
            if($v->parent_id===$value->id){
                if($count<5){
                 $recomment[]=$v;
                }else{                   
                    break;
                }
               $count++;
            }
          }                 
          $value->recomment=$recomment;
          }
//          $comment=$data->comment()->where('parent_id',0)->orderby('created_at')->get();

         
      
    	  return view('home/index/content')->with('data',$data)->with('comment',$comment)->with('hot',$hot);
    }
  
    public function login(Request $request){
        
        
          if($request->input()){
              
              
                      
           return redirect('/');
              
              
          }
        
          return view('home/index/login');
        
    }
    
    
       public  function   logout(Request $request){
           
        $url=url()->previous();
        $request->session()->forget('user_id');
        $request->session()->forget('nick_name');
        $request->session()->forget('name');
        $request->session()->forget('thumb');
        return redirect('/');
        
    }
    
    public   function search(Request $request){
        $title=$request->input('title');
       
        $data=Article::where('title','like','%'.$title.'%')->where('is_stop','已启用')->get();  
     
       
        return view('home/index/search')->with('data',$data);
        
    }
    
    public function  user_login(Request $request){
       
        $password=$request->input('password'); 
        $account_num=$request->input('account_num');
        $user=User::where('account_num',$account_num)->where('is_stop','已启用')->first();
    
             if($user){
    
                if(Crypt::decrypt($user->password)!= $password){
                 return "密码错误";
                }
                
                
              $user->last_session= Session::getId();  
              $user->save();
              session(['user_id'=>$user->id]);
              session(['nick_name'=>$user->nick_name]);
              session(['name'=>$user->name]);
              session(['thumb'=>$user->thumb]);
                  return 'ok';
              }else{                 
                  return "查无此人";
              }
         
      
    }
    
    
      public  function   geterror(Request $request){
        
        
        $request->session()->forget('account_num');
        $request->session()->forget('admin_type');
        $request->session()->forget('id');
        $request->session()->forget('role');
        return view('home/index/geterror');
        
    }
}
