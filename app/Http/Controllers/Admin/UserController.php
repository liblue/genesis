<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\BaseController;
use App\Model\User;
use App\Model\Department;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Crypt;
use Illuminate\Support\Facades\Session;
use App\Model\Role;

class UserController extends BaseController
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
   
         if(!in_array('用户查看',$role)){    
       
           return redirect('admin/manage');
         }
        $query=User::query();
        if($request->has('account_num')){
            $account_num=$request->input('account_num');  
            $query->where('account_num', 'like','%'.$account_num.'%');
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
        
        $res=$query->get();   
      
        return view('admin/user/index')->with('res',$res);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
//        if( $request->has('imgurl')){
//            
//            $imgurl=$request->input('imgurl');
//            return view('admin/user/add')->with('imgurl',$imgurl);    
//        }else{
         
//        }
         $role= explode('|',session('role'));
   
         if(!in_array('用户添加',$role)){    
       
           return redirect('admin/manage');
         }
         $department= Department::has('role')->get();
//           if($request->has('ststus')){
//             $status=$request->get('ststus');
//             dd($status);
//            return view('admin/user/add')->with('department',$department)->with('status','ok');
//               
//           }
          
           return view('admin/user/add')->with('department',$department);
            
   
        
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
   
         if(!in_array('用户查看',$role)){    
       
           return redirect('admin/manage');
         }
        $data=$request->input();
        
        unset($data['password2']);
        User::create($data);
        return redirect('admin/user/create')->with('status','ok');
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
        
         $role= explode('|',session('role'));
         if(!in_array('用户修改',$role)){    
       
           return redirect('admin/manage');
         }
        $user=User::find($id);
        $department= Department::has('role')->get();
        return view('admin/user/edit')->with('data',$user)->with('department',$department);
        
    }
    public function set(Request $request)
    {
        //
//        $data=$request->input();
//        dd($data);
        
        
        $role= explode('|',session('role'));
   
         if(!in_array('用户修改',$role)){    
       
            return redirect('admin/manage');
           
         }
        
        
        $id=$request->input('id');
      
        
        $user=User::find($id);       
        $user->name=$request->input('name');
        $user->department_id=$request->input('department_id');
        $user->cellphone=$request->input('cellphone');
        $user->role_id=$request->input('role_id');
        if($request->has('password1')){
        $user->password=Crypt::encrypt($request->input('password1'));
        }
        $user->save(); 
        return redirect()->back()->with('msg','修改成功');
        
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
         $id=  $request->input('data');         
         User::destroy($id);
         return $id; 
    }
    
    
       public function is_stop(Request $request){
            $role= explode('|',session('role'));
   
            if(!in_array('用户禁用',$role)){    
                $msg='没有权限';
             return $msg;
            }
        
           
           
        $data=$request->input('data');
        $user=User::find($data);
        if($user->is_stop=="已启用"){
            $user->is_stop="已禁用";
        }else{
            $user->is_stop="已启用"; 
        }
        $user->save();
        return $data;       
    }
    
//       public function thumb(Request $request){
//           
//        $targ_w = $targ_h = 150;
//	$jpeg_quality = 90;
//	$src = 'img/css/180.jpg';
//	$img_r = imagecreatefromjpeg($src);
//	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
//	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
//	$targ_w,$targ_h,$_POST['w'],$_POST['h']);
//	header('Content-type: image/jpeg');
//	imagejpeg($dst_r,null,$jpeg_quality);
//
//	exit;
//        }
          public function thumb(Request $request){
               $role= explode('|',session('role'));
   
             if(!in_array('用户修改',$role)){    
       
           $msg='没有权限';
             return $msg;
           
           }
        
              
              
              
              
             $data=[];
             $data['account_num']=$request->input('account_num');
             $data['password']=$request->input('password');
             $data['password']=Crypt::encrypt($data['password']);
             $data['name']=$request->input('name');
             $data['nick_name']=$request->input('nick_name');
             $data['cellphone']=$request->input('cellphone');
             $data['department_id']=$request->input('department_id');
             $data['role_id']=$request->input('role_id');
             $new=User::where('account_num',$data['account_num'])->get();
      
              if(count($new)!=0){
              return redirect()->back()->with('msg','账号已存在');
             }else{
           
              $iWidth = $iHeight = 200; // desired image result dimensions
              $iJpgQuality = 90;
          if ($_FILES) {
            // if no errors and size less than 250kb
            if (! $_FILES['image_file']['error'] && $_FILES['image_file']['size'] < 250 * 1024) {
                if (is_uploaded_file($_FILES['image_file']['tmp_name'])) {
                    $array=getimagesize($_FILES['image_file']['tmp_name']);
                    $a=$array[3];
                    $b=explode('"',$a);
                    $c=$b[1];
                    $d=$b[3];
                    $f=$c/200;
                    $e=$d/200;
                  
                    // new unique filename
                    $sTempFileName = 'cache/'.$data['account_num'];

                    // move uploaded file into cache folder
                    move_uploaded_file($_FILES['image_file']['tmp_name'], $sTempFileName);
                      
                    // change file permission to 644
                    @chmod($sTempFileName, 0644);

                    if (file_exists($sTempFileName) && filesize($sTempFileName) > 0) {
                        $aSize = getimagesize($sTempFileName); // try to obtain image info
                        if (!$aSize) {
                            @unlink($sTempFileName);
                            return;
                        }

                        switch($aSize[2]) {
                            case IMAGETYPE_JPEG:
                                $sExt = '.jpg';

                                // create a new image from file 
                                $vImg = @imagecreatefromjpeg($sTempFileName);
                                break;
                    
                            case IMAGETYPE_PNG:
                                $sExt = '.png';

                         
                                $vImg = @imagecreatefrompng($sTempFileName);
                                break;
                            default:
                                @unlink($sTempFileName);
                                return;
                        }

                        // create a new true color image
                        $vDstImg = @imagecreatetruecolor( $iWidth, $iHeight );

                        // copy and resize part of an image with resampling
                        $_POST['x1']=$e*$_POST['x1'];
                        $_POST['y1']=$e*$_POST['y1'];
                         $_POST['w']=$e*$_POST['w'];
                         $_POST['h']=$e*$_POST['h'];
                        imagecopyresampled($vDstImg, $vImg, 0, 0, (int)$_POST['x1'], (int)$_POST['y1'], $iWidth, $iHeight, (int)$_POST['w'], (int)$_POST['h']);

                        // define a result image filename
                        $sResultFileName = $sTempFileName . $sExt;

                        // output image to file
                        imagejpeg($vDstImg, $sResultFileName, $iJpgQuality);
                        @unlink($sTempFileName);
                    
                    
                    }
                }
            }
            $data['thumb']='cache/'.$data['account_num'].'.jpg';
        }
           User::create($data);    
           $department= Department::get();
           
        
          
           return redirect()->back()->with('msg','添加成功');
          }}
          public function depart(Request $request){
              
              $department_id=$request->input('data');
              
              $res=Role::where('department_id',$department_id)->get();
              return   $res;
          }
                        
}
