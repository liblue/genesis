<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request  as FileRequest;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Article;
use Symfony\Component\Console\Input\Input;

class ArticleController extends BaseController
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
        if(!in_array('文章查看',$role)){          
           return redirect('admin/manage');
         }
        $query=Article::query();
        if($request->has('title')){
            $title=$request->input('title');  
            $query->where('title', 'like','%'.$title.'%');
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
        if($request->has('type')){
            $type=$request->input('type');
            $query->where('type',$type);
        }else{
            $query->where('type','<>','通知')->where('type','<>','动态');//orwhere不可乱用
        }
        
        $data=$query->get();   
        
        
    
        return view('admin/article/index')->with('data',$data);

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
        if(!in_array('公告添加',$role)){          
           return redirect('admin/manage');
         }
        return view('admin/article/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {  
        
          $role= explode('|',session('role'));
            if(!in_array('公告添加',$role)){          
           return redirect('admin/manage');
         }
        $data=$request->except('_token');
        //上传图片
      
        if(FileRequest::file('myfile')){
        $images=FileRequest::file('myfile');
        $filedir="upload/article-img/"; 
        $imagesName=$images->getClientOriginalName();
        $extension =$images -> getClientOriginalExtension(); 
        $newImagesName=time().'.'.$extension;
        $images->move($filedir,$newImagesName);
        $data['imgurl']=$filedir.$newImagesName;
        }else{
             $data['imgurl']='';
        }
        
       
        $data['admin_id']=session('id');
        $data['content']=$data['editorValue'];
        unset($data['editorValue']);        
        unset($data['myfile']);
        
        Article::create($data);
        return redirect()->back()->with('status','ok');
        
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
       
        
        $data=Article::find($id);    
        return view('admin/article/show')->with('data',$data);
        
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
        
          $role= explode('|',session('role'));
        if(!in_array('公告修改',$role)){          
           return redirect('admin/manage');
         }
        
        $data=Article::find($id);
     
    
        return view('admin/article/edit')->with('data',$data);
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
          $role= explode('|',session('role'));
        if(!in_array('公告修改',$role)){          
           return redirect('admin/manage');
         }
        $data=$request->input();
 
        unset($data['_token']);
        unset($data['_method']);
              

        $data['content']=$data['editorValue'];
        unset($data['editorValue']);
        
        if(  FileRequest::file('myfile')){
            $images=FileRequest::file('myfile');
            $filedir="upload/article-img/"; 
            $imagesName=$images->getClientOriginalName();
            $extension =$images -> getClientOriginalExtension(); 
            $newImagesName=time().'.'.$extension;
            $images->move($filedir,$newImagesName);
            $data['imgurl']=$filedir.$newImagesName;
        }else{
            unset($data['imgurl']);
        }
        $data['user_id']=9;
        $article=Article::find($id);
      
        $article->update($data);
 
        return redirect('admin/article/notice');
        
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
        if(!in_array('公告删除',$role)){          
           $msg='没有权限';
             return $msg;
         }
         $id=  $request->input('data');         
         Article::destroy($id);
         return $id; 
    }
    public function notice(Request $request){
        $role= explode('|',session('role'));
        if(!in_array('公告查看',$role)){          
           return redirect('admin/manage');
         }
        
        
        $query=Article::query();
        if($request->has('title')){
            $title=$request->input('title');  
            $query->where('title', 'like','%'.$title.'%');
        }
        if($request->has('start')){
          
            $start=$request->input('start');  
            if($request->has('end')){
            $end=$request->input('end'); 
            $query->where('created_at', '>=',$start)->where('created_at','<',$end);
            }else{
                $query->where('created_at', '>=',$start);
            }
        }elseif($request->has('end')){

            $end=$request->input('end'); 
            $query->where('created_at','<=',$end);
        }
        if($request->has('type')){
            $type=$request->input('type');
            $query->where('type',$type);
        }else{
            $query->where('type','<>','G友')->where('type','<>','分享')->get();
        }

           $data=$query->get(); 
           
      
        return view('admin/article/notice')->with('data',$data);
    }
    
  public function is_stop(Request $request){
      
      $role= explode('|',session('role'));
        if(!in_array('公告下架',$role)){          
           $msg='没有权限';
             return $msg;
         }
      
      
      
        $data=$request->input('data');
        
      
        $article=Article::find($data);
        if($article->is_stop=="已启用"){
            
           
            $article->is_stop="已禁用";
        }else{
           
            $article->is_stop="已启用"; 
        }
        $article->save();
        return $data;       
    }
}
