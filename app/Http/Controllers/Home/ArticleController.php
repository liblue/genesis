<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Article;
use App\Model\Comment;
use App\Model\User_message;
use Illuminate\Support\Facades\DB;
use App\Model\User;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id=session('user_id');
        $user=User::find(session('user_id'));
        $data=Article::where('user_id',$user_id)->where('is_stop','已启用')->paginate(12);
        return view('home/article/index')->with('data',$data)->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
         $user=User::find(session('user_id'));
        return view('home/article/add')->with('user',$user);
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
        $data=$request->input();
        $data['content']=$data['editorValue'];
        unset($data['editorValue']);
        $data['user_id']=session('user_id');
        $data['imgurl']='home/img/shouye/thumb.png';
        Article::create($data);
        
      
        return redirect('/article');
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
        $article=Article::find($id);
        $user=User::find(session('user_id'));
        return view('home/article/edit')->with('article',$article)->with('user',$user);
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
    public function delete(Request $request)
    {
        //
        
        $id=$request->input('data');
        Article::destroy($id);
        return $id;
    }
      public function set(Request $request)
    {
        //
        $data=$request->input();
        $article=Article::find($data['id']);
        $article->title=$data['title'];
        $article->content=$data['editorValue'];
        
        $article->type=$data['type'];
        $article->save();
        return redirect('article')->with('msg',"添加成功");
          
          
    }
    
    
    public  function comment(Request $request){
        
        
        $user_id=session('user_id');
        $data['content']=$request->input('data');
        $data['article_id']=$request->input('article_id');
        $data['user_id']=$user_id;
        $comment= Comment::create($data);
        $article=Article::find($request->input('article_id'));
        $article->plnum= $article->plnum+1;
        $article->save();
       
        if($article->admin_id && $article->admin_id!=$user_id){
          DB::table('user_messages')->insert(['admin_id' => $article->admin_id,'comuser_id'=>$user_id,'article_id'=>$article->id,'content'=>$data['content']]);  
        }else if($article->user_id!=$user_id){
        DB::table('user_messages')->insert(['user_id' => $article->user_id,'comuser_id'=>$user_id,'article_id'=>$article->id,'content'=>$data['content']]);  
        }
        return $comment->id;
    }
    public  function recomment(Request $request){
        $user_id=session('user_id');
        $data['content']=$request->input('data');
        $data['parent_id']=$request->input('parent_id');
        $data['user_id']=$user_id;
        $data['article_id']=$request->input('article_id');
        Comment::create($data);
        $article=Article::find($request->input('article_id'));
        
         if($article->admin_id){
          DB::table('user_messages')->insert(['admin_id' => $article->admin_id,'comuser_id'=>$user_id,'article_id'=>$article->id,'content'=>$data['content']]);  
        }else{
        DB::table('user_messages')->insert(['user_id' => $article->user_id,'comuser_id'=>$user_id,'article_id'=>$article->id,'content'=>$data['content']]);  
        }
        return $user_id;
        
    }
    
    public  function like(Request $request){
        $user_id=session('user_id');
        
        $article_id=$request->input('data');
        $article=Article::find($article_id);
        $article->like=$article->like+1;
        $article->save();
        DB::table('user_messages')->insert(['user_id' => $article->user_id,'comuser_id'=>$user_id,'article_id'=>$article_id]);
//        file_put_contents('1.txt', 'ok');
        return $article->like;
    }
}
