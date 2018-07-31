@extends('layout.header')
@section('content')
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->


<link href="{{asset('admin/img3/css/main.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('admin/img3/css/jquery.Jcrop.min.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('admin/img3/js/jquery.min.js')}}"></script>
<script src="{{asset('admin/img3/js/jquery.Jcrop.min.js')}}"></script>
<script src="{{asset('admin/img3/js/script.js')}}"></script>




<aside class="Hui-aside"  style="overflow: scroll">
	<div class="menu_dropdown bk_2">
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 文章管理{{session('status')}}<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
                                        @if(in_array('文章查看',$role))
                                        <li><a href="{{url('admin/article')}}" title="文章管理">文章列表</a></li>
                                        @endif
                                        @if(in_array('公告查看',$role))
                                        <li><a href="{{url('admin/article/notice')}}" title="">公告列表</a></li>
                                        @endif
                                        @if(in_array('公告添加',$role))
                                        <li><a href="{{url('admin/article/create')}}" title="文章管理">添加公告</a></li>
                                        @endif
		</ul>
	</dd>
</dl>
      
            <dl id="menu-department">
			<dt><i class="Hui-iconfont">&#xe620;</i> 部门管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
                                    @if(in_array('部门查看',$role))
					<li><a href="{{url('admin/department')}}" title="部门列表">部门列表</a></li>   @endif
                                        
                                         @if(in_array('角色查看',$role))
					<li><a href="{{url('admin/role')}}" title="部门列表">角色列表</a></li>
					@endif
                                            
                                        @if(in_array('角色添加',$role))
                                       <li><a href="{{url('admin/role/create')}}" title="部门列表">添加角色</a></li>
                                        @endif
		</ul>
	</dd>
</dl>

		<dl id="menu-comments">
			<dt><i class="Hui-iconfont">&#xe622;</i> 评论管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					
                                        @if(in_array('评论查看',$role))
					<li><a href="{{url('admin/comment')}}" title="评论列表">评论列表</a></li>
                                        @endif
					
		</ul>
	</dd>
</dl>
		      <dl id="menu-member">
			<dt class="selected"><i class="Hui-iconfont">&#xe60d;</i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                        <dd  style="display:block">
				<ul>
					@if(in_array('用户查看',$role))
					<li><a href="{{url('admin/user')}}" title="会员列表">用户列表</a></li>
                                         @endif
                                         @if(in_array('用户添加',$role))
                                        <li  class="current"><a href="{{url('admin/user/create')}}" title="会员列表">添加用户</a></li>
                                           @endif
		</ul>
	</dd>
</dl>

@if( Session::get('admin_type')=='超级管理员')
		<dl id="menu-admin">
			<dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                        <dd>
				<ul>
					<li><a href="{{url('admin/ma_admin')}}" title="管理员列表">管理员列表</a></li>
                                        <li><a href="{{url('admin/ma_admin/create')}}" title="管理员列表">添加管理员</a></li>
		</ul>
	</dd>
</dl>
@endif
</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>


<style  type="text/css">
    #checkname,#checkaccount_num,#checkpassword,#checkpassword2,#checkfile,#checkcellphone,#checkbumen,#checknick_name{
        display:none;
        color:red;
    }
    #is_has_account{
        color:red;
    }

</style>



<script type="text/javascript">
    
    
    
  $(function(){       
    $('#cropbox').Jcrop({
      aspectRatio: 1,
      onSelect: updateCoords，
    });       
  );

  });


  function updateCoords(c)
  {
       

 
      
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };



 </script>  

   
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		<a>用户管理</a>
		<span class="c-gray en">&gt;</span>
		添加用户 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>

		<article class="cl pd-20">
                  
                    
    <form action="{{url('admin/user/thumb')}}" method="post" class="form form-horizontal" id="form-admin-add" onsubmit="return confirm()" enctype="multipart/form-data" >
                                      {{ csrf_field() }}
                             
                <!-- upload form -->
<!--                <form enctype="multipart/form-data" method="post"  class="form form-horizontal" action="{{url('admin/user/thumb')}}" onSubmit="return checkForm()">-->
                    <!-- hidden crop params -->
                   
               <div class="row cl">
			<label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>头像：</label>
                        <div class="formControls col-xs-2 col-sm-2">
                            
                    <input type="hidden" id="x1" name="x1" />
                    <input type="hidden" id="y1" name="y1" />
                    <input type="hidden" id="x2" name="x2" />
                    <input type="hidden" id="y2" name="y2" />
                    <div><input type="file" name="image_file" id="image_file" onChange="fileSelectHandler()"  /></div>
                  
                    <div class="step2">                                                                    
                        <div  style="height:200px;">                        
                            <img id="preview"  src="{{asset('thumb.jpg')}}"  style=" height:100%;"  />                             
                     </div>
                          <span  id="checkfile" >未选择头像！请上传图片并用鼠标截取</span>
                        <div class="info">
                           <input type="hidden" id="filesize" name="filesize" />
                            <input type="hidden" id="filetype" name="filetype" />
                           <input type="hidden" id="filedim" name="filedim" />
                             <input type="hidden" id="w" name="w" />
                           <input type="hidden" id="h" name="h" />
                        </div>
                      
                    </div>
                   
                             
                             
                      
		</div>
                        
               </div>
              
         
              
               <div class="row cl">
			<label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>账户：</label>
			<div class="formControls col-xs-2 col-sm-2">
                            <input type="text" class="input-text" value="" placeholder="" id="account_num" name="account_num" onblur="check()" > 
                                <span  id="checkaccount_num" >请输入6到16位字符，字母开头，只允许字母、数字、下划线和减号！</span>
                                @if(Session::get('msg')=="账号已存在")
                                <span   style="color:red">账号已存在</span>
                                @endif
                        </div>
		</div>
          
		<div class="row cl">
                    <label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>姓名：</label>
			<div class="formControls col-xs-2 col-sm-2">
				<input type="text" class="input-text" value="" placeholder="" id="name" name="name">
                                <span  id="checkname"  >请输入至少不超过4位的名称且必须都是中文！</span>
			</div>
		</div>
                <div class="row cl">
			<label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>昵称：</label>
			<div class="formControls col-xs-2 col-sm-2">
                            <input type="text" class="input-text" placeholder="" id="nick_name" name="nick_name"  > 
                                <span  id="checknick_name" >请输入不超过7个字的昵称</span>
                           
                                
                        </div>
		</div>
                    <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">性别：</label>
			<div class="formControls col-xs-2 col-sm-2 skin-minimal">
				<div class="radio-box">
					<input name="gender" type="radio" id="sex-1" checked>
					<label for="sex-1">男</label>
				</div>
				<div class="radio-box">
					<input type="radio" id="sex-2" name="gender">
					<label for="sex-2">女</label>
				</div>
			</div>
		</div>
                      <div class="row cl">
			<label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>手机：</label>
			<div class="formControls col-xs-2 col-sm-2">
                            <input type="text" class="input-text" placeholder="" id="cellphone" name="cellphone"  > 
                                <span  id="checkcellphone" >请输入格式正确的手机号码</span>
                                                       </div>
		</div>
                    	<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>部门：</label>
			<div class="formControls col-xs-2 col-sm-2"> <span class="select-box">
                                <select name="department_id" class="select"  id="depart" onchange="xzbm(this)">
					<option value="">请选择部门</option>
                                          @foreach($department as $v)
					<option value="{{$v->id}}">{{$v->name}}</option>
                                        @endforeach
				</select>
                                
				</span> 
                        
                            <span  id="checkbumen">请选择部门</span>
                        </div>
                        
		</div>
                    <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>角色：</label>
			<div class="formControls col-xs-2 col-sm-2"> <span class="select-box">
                                 <select name="role_id" class="select"  id="role" >
					<option value="">请选择角色</option>
                                         
				</select>
                                
				</span> 
                        
                           
                        </div>
                        
		</div>
		<div class="row cl">
			<label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>密码：</label>
			<div class="formControls col-xs-2 col-sm-3">
				<input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="password">
                                <span  id="checkpassword" > 请输入6到16位的字符,包括至少1个字母，1个数字，1个特殊字符！</span>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>确认密码：</label>
			<div class="formControls col-xs-2 col-sm-3">
				<input type="password" class="input-text" autocomplete="off"  placeholder="确认密码" id="password2" name="password2">
                                <span  id="checkpassword2" >两次输入密码不一致！</span>
			</div>
		</div>

          
	
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-2 col-sm-offset-2">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;添加&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>

	
</section>


<!--_footer 作为公共模版分离出去--> 


<script type="text/javascript" src="{{asset('admin/lib/jquery/1.9.1/jquery.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/h-ui/js/H-ui.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/h-ui.admin/js/H-ui.admin.page.js')}}"></script> 
<script src="{{asset('admin/img/js/jquery.Jcrop.js')}}"></script>





@if(Session::get('msg')==="添加成功")
<script type="text/javascript">    
   layer.alert('添加成功', {icon: 1}); 
</script>
@endif





<script type="text/javascript">

function xzbm(obj){
    
    alert(3);
     $.post("{{url('admin/user/depart')}}",{'_token':'{{csrf_token()}}','data': $(obj).val()},function(data){
         var a='';
             for(var item in data){
                 
              
             a=a+'<option value="'+ data[item]['id']+'">'+data[item]['name']+'</option>';
          } 
          
           $("#role").empty(); 
           $("#role").append(a); 
         
    }); 
}

  
function confirm(){
  
  
     if($("#account_num").val().length >16 || $("#account_num").val().length < 6){
     $("#checkaccount_num").show();
     return false;
  }else {
  $("#checkaccount_num").hide();
  }
  if(checkAccount($("#account_num").val())==="2"){
      $("#checkaccount_num").show();
     return false;  
  }else {
  $("#checkaccount_num").hide();
  }
  if($("#name").val() === "" || $("#name").val().length >4){
   $("#checkname").show();
     return false;
  }else{
  $("#checkname").hide();
  }
if(funcChina($("#name").val())==="2"){
       $("#checkname").show();
      return false;       
  }else{
       $("#checkname").hide(); 
  }
  
  
   if($("#nick_name").val() === "" || $("#nick_name").val().length >7){
     $("#checknick_name").show();
     return false;
  }else {
 $("#checknick_name").hide();
  }
  
 if(checkphone($("#cellphone").val())==="2"){
      $("#checkcellphone").show();
     return false;  
  }else {
    $("#checkcellphone").hide();
  }
  
    if($("#depart").val()==="" ){
     $("#checkbumen").show();
     return false;
  }else {
  $("#checkbumen").hide();
  }
  
 if($("#password").val() === "" || $("#password").val().length < 6){
     $("#checkpassword").show();
     return false;
  }else {
 $("#checkpassword").hide();
  }
  
  
  if(checkPw($("#password").val())==="2"){
      $("#checkpassword").show();
      return false;
  }else {
 $("#checkpassword").hide();
  }
       
  
  
  
if($("#password2").val() !== $("#password").val()){
      $("#checkpassword2").show();
     return false;
  }else {
  $("#checkpassword2").hide();
  }
 
  
       if (!parseInt($('#w').val())) {
  $("#checkfile").show();
  return false;
  }else{
     $("#checkfile").hide();
      
  }
    return true;
 
}

 

function funcChina(name)
     {     
     var reg=/^[\u2E80-\u9FFF]+$/;
     if (reg.test(name)){
        return "3" ;
    }
       return "2"; 
   }
   
   
  function checkphone(phone)
     {     
     var reg=/(^1[3|4|5|7|8]\d{9}$)|(^09\d{8}$)/;
     if (reg.test(phone)){
        return "3" ;
    }
       return "2"; 
   } 
   
   
   
   
function checkPw(password){
//    var  reg = /^[A-Za-z0-9]{6,20}$/;

 var  reg=new RegExp('(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9]).{6,16}');
    if (reg.test(password)){
         return "3" ;
    }
     return "2"; 
}


function checkAccount(account){
   var reg = /^[a-zA-Z]([-_a-zA-Z0-9]{6,16})$/;
    if(reg.test(account)){
        return "3" ;
    }  
    return "2"; 
}
   
 

 
    


</script>


<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>

@endsection