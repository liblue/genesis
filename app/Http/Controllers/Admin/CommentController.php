<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Comment;
use App\Model\Article;
use Illuminate\Support\Facades\DB;

class CommentController extends BaseController
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
   
         if(!in_array('评论查看',$role)){    
       
           return redirect('admin/manage');
         }
        $query=Comment::query()->is_del();
        if($request->has('content')){
            $content=$request->input('content');  
            $query->where('content','like','%'.$content.'%');
        }
        if($request->has('start')){
            $start=$request->input('start');  
            if($request->has('end')){
            $end=$request->input('end'); 
            $query->where('created_at', '>=',$start)->where('created_at','<',$end);
            }else{
                $query->where('created_at', '>=',$start);
            }
        }
        if($request->has('end')){
            $end=$request->input('end'); 
            $query->where('created_at','<=',$end);
        }
       
        $data=$query->get();
        return view('admin/comment/index')->with('data',$data);
        
        
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
    {
        //
        
        
     $role= explode('|',session('role'));
   
         if(!in_array('评论删除',$role)){    
       
            $msg='没有权限';
             return $msg;
         }
         $id=$request->input('data');
         
         DB::table ('comments')->where ('id',$id)->update(['is_del'=>'已删除']);
//         $comment=Comment::find($id);
//         $comment->like=3;
//         $save = $comment->save();
         
         return $id; 
    }
    
//    public function  com_list(Request $request)
//    {
//        if($request->input('type')=='article'){
//            $type=$request->input('type');
//            $id=$request->input('id');
//            
//      
//            if($request->input('content')){
//                
//                
//            }
//            $comment=Article::find($id)->comment()->where('parent_id', '0')->get();
//            $article=Article::find($id);
//            $article->comment=$comment;
//            $data=$article;
//        }
//        
//        if($request->input('type')=='comment'){
//            $type=$request->input('type');
//            $id=$request->input('id');
//            $comment=Comment::where('parent_id',$id)->get();      
//            $article=Comment::find($id)->article;
//            $article->comment=$comment;
//            $data=$article;
//        } 
//        return view('admin/comment/com_list')->with('data',$data)->with('pre_id',$id)->with('type',$type);
//    }
        public function  com_list(Request $request)
    {
            
                $role= explode('|',session('role'));
   
         if(!in_array('评论查看',$role)){    
       
           return redirect('admin/manage');
         }
      
        if($request->input('type')=='article'){
            $type=$request->input('type');
            $id=$request->input('id');
            $query=Article::find($id)->comment()->where('parent_id', '0')->where('is_del','未删除');
            
            if($request->has('content')){
            $content=$request->input('content');  
            $query->where('content','like','%'.$content.'%');
            }
            if($request->has('start')){
            $start=$request->input('start');  
            if($request->has('end')){
            $end=$request->input('end'); 
            $query->where('created_at', '>=',$start)->where('created_at','<',$end);
            }else{
                $query->where('created_at', '>=',$start);
            }
            }
            if($request->has('end')){
            $end=$request->input('end'); 
            $query->where('created_at','<=',$end);
            }
            
            $comment=$query->get();
            $article=Article::find($id);
            $article->comment=$comment;
            $data=$article;
        }
        
        if($request->input('type')=='comment'){
            $type=$request->input('type');
            $id=$request->input('id');
            $query=Comment::where('parent_id',$id)->where('is_del','未删除'); 
            if($request->has('content')){
            $content=$request->input('content');  
            $query->where('content','like','%'.$content.'%');
            }
            if($request->has('start')){
            $start=$request->input('start');  
            if($request->has('end')){
            $end=$request->input('end'); 
            $query->where('created_at', '>=',$start)->where('created_at','<',$end);
            }else{
                $query->where('created_at', '>=',$start);
            }
            }
            if($request->has('end')){
            $end=$request->input('end'); 
            $query->where('created_at','<=',$end);
            }
            $comment=$query->get();
            $article=Comment::find($id)->article;
            $article->comment=$comment;
            $data=$article;
        } 
            
        return view('admin/comment/com_list')->with('data',$data)->with('pre_id',$id)->with('type',$type);
    }
    
    function  check($content,$start='',$end='',$query){
        
        
        
    }
}
