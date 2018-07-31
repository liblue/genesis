<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Model\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;
use Crypt;
use App\Model\User_message;
use Illuminate\Support\Facades\DB;

use Faker\Provider\Image;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
     
        $user=User::find(session('user_id'));
       
        return view('home/user/user_info')->with('user',$user);
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
    
    
     public function news()
    {
        //
         
       $user_id=session('user_id');
       $user=User::find(session('user_id'));
       $news=User_message::where('user_id',$user_id)->where('is_read','未读')->orderby('created_at','desc')->get();
     
        return view('home/user/news')->with('news',$news)->with('user',$user);
    } 
    public function readed_news()
    {
        //
          $user_id=session('user_id');
        $news=User_message::where('user_id',$user_id)->where('is_read','已读')->orderby('created_at','desc')->paginate(10);
        return view('home/user/readed_news')->with('news',$news);
    }
    public function setyidu(Request $request)
    {
        $user_id=session('user_id');
//        User_message::where('user_id', $user_id) ->update(['is_read' =>'已读']);
        $notices = DB::update(DB::raw("UPDATE user_messages SET is_read = '已读' WHERE user_id = $user_id AND is_read ='未读'"));
//        file_put_contents('2.txt',3);
        return $user_id;
    }
    
     public function set(Request $request)
    {
          
      $data=$request->input();
    
      $user=User::find(session('user_id'));
      $user->name=$data['name'];
      $user->nick_name=$data['nick_name'];    
      $user->cellphone=$data['cellphone'];  
      $user->save();
      
      
      session(['nick_name'=>$user->nick_name]);
      session(['name'=>$user->name]);
      return redirect()->back()->with('msg',"修改成功");
    }
      
     public function setpsw(Request $request)
    {
          
      $data=$request->input();
   
      $user=User::find(session('user_id'));
           if(Crypt::decrypt($user->password)!=$data['password']){
               return redirect()->back()->with('msg',"原密码错误"); 
           }
      
      
//      if($data['password']==)
      $user->password=Crypt::encrypt($data['password1']);
      
     
      $user->save();     
      return redirect()->back()->with('msg',"修改成功");
    }
    
    public function thumb(Request $request){
        
        return view('home/user/thumb');
        
    }
     public function move_thumb(Request $request){
         
        $user_id=session('user_id');
        $user=User::find($user_id);
        $acount_num=$user->account_num;
        $imgstr=$request->input('data');
        $imgdata = substr($imgstr,strpos($imgstr,",") + 1);
        $decodedData = base64_decode($imgdata);
        $path='cache/'.$acount_num.'.png';
        file_put_contents($path,$decodedData );
        $user->thumb=$path;
        $user->save();
        $request->session()->forget('thumb');
        session(['thumb'=>$path]);
        return  3;
        
    }
      
 
}
