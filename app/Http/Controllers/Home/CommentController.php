<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;


use App\Model\Comment;
use App\Model\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Home\BaseController;

class CommentController extends BaseController
{
    //
    
    function like(Request $request){
        
        $id=$request->input('data');
        $comment=Comment::find($id);
        $comment->like=$comment->like+1;
        DB::table('comments')
            ->where('id', $id)
            ->update(['like' =>  $comment->like]);
        return $comment->like;
    }
   function del(Request $request){
       $id=$request->input('data');
       DB::table('comments')
            ->where('id', $id)
            ->update(['is_del' =>"已删除"]);
       return $id;
   }
    
}
