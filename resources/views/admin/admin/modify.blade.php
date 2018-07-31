@extends('layout.header')
@section('content')
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
<aside class="Hui-aside">
	<div class="menu_dropdown bk_2">
		<dl id="menu-article">
			<dt><i class="Hui-iconfont">&#xe616;</i> 文章管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
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
					<li><a href="{{url('admin/department')}}" title="部门列表">部门列表</a></li>
					    @endif
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
					<li><a href="#" title="意见反馈">意见反馈</a></li>
		</ul>
	</dd>
</dl>
		<dl id="menu-member">
			<dt><i class="Hui-iconfont">&#xe60d;</i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
                                        @if(in_array('用户查看',$role))
					<li><a href="{{url('admin/user')}}" title="会员列表">用户列表</a></li>
                                          @endif
                                             @if(in_array('用户添加',$role))
                                        <li><a href="{{url('admin/user/create')}}" title="会员列表">添加用户</a></li>
                                           @endif

		</ul>
	</dd>
</dl>

@if( Session::get('admin_type')=='超级管理员')
		<dl id="menu-admin">
			<dt  ><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                        <dd >
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
<!--/_menu 作为公共模版分离出去-->

<style  type="text/css">
    .mima,#checkname,#checkaccount_num,#checkpassword,#checkpassword1,#checkpassword2,#is_has_account{
        display:none;
        color:red;
    }
   
    
    
</style>
        
        


<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		<a  onclick="add()">管理员管理</a>
		<span class="c-gray en">&gt;</span>
		个人信息修改<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
<!--	<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l"> <a href="{{url('ma_admin')}}" onclick="datadel()" class="btn  radius">管理员列表</a>  </span>
				
			</div>-->
		<article class="cl pd-20">
                    <form action="{{url('admin/ma_admin/modify')}}" method="post" class="form form-horizontal" id="form-admin-add" onsubmit="return confirm()"  >
          {{ csrf_field() }}
          
          <input  type="hidden"  value=""  id="finalcheck"> 
            <div class="row cl">
                    <label class="form-label col-xs-2 col-sm-2">类型：</label>
			<div class="formControls col-xs-2 col-sm-3">
                            <input type="text" class="input-text" value="{{$admin->type}}" placeholder=""  style="border:0px;"  readonly="readonly"> 
                            
			</div>
		</div>
              
		<div class="row cl">
                    <label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>姓名：</label>
			<div class="formControls col-xs-2 col-sm-3">
				<input type="text" class="input-text" value="{{$admin->name}}" placeholder="{{$admin->name}}" id="name" name="name">
                                <span  id="checkname"  >请输入至少不超过6位的名称且必须都是中文！</span>
			</div>
		</div>
           <div class="row cl">
			<label class="form-label col-xs-2 col-sm-2">账户名：</label>
			<div class="formControls col-xs-2 col-sm-3">
                            <input type="text" class="input-text" value="{{$admin->account_num}}" placeholder="{{$admin->account_num}}"  style="border:0px"  readonly="readonly" > 
                        </div>
                       
		</div>
		<div class="row cl">
			<label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>密码：</label>
			<div class="formControls col-xs-2 col-sm-3">
				<input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="password">
                                <span  id="checkpassword" >原密码是必填项</span>
                                @if(Session::get('msg')=="密码错误")
                                <span  style="color:red"  id='pwwrong'>密码错误</span>
                                   @endif
			</div>
		</div>
          
           <div class="row cl">
			<label class="form-label col-xs-2 col-sm-2">上次登录：</label>
			<div class="formControls col-xs-2 col-sm-3">
                            <input type="text" class="input-text" value="{{$admin->last_login}}"  style="border:0px"  readonly="readonly" > 
                        </div>
                       
		</div>
		<div class="row cl">
			<label class="form-label col-xs-2 col-sm-2">新密码：</label>
			<div class="formControls col-xs-2 col-sm-3">
				<input type="password" class="input-text" autocomplete="off"  placeholder="新密码" id="password1" name="password1">
                                <span  id="checkpassword1" >请输入6到16位的字符,包括至少1个大写字母，1个小写字母，1个数字，1个特殊字符！</span>
			</div>
		</div>
              <div class="row cl">
			<label class="form-label col-xs-2 col-sm-2">确认密码：</label>
			<div class="formControls col-xs-2 col-sm-3">
				<input type="password" class="input-text" autocomplete="off"  placeholder="确认密码" id="password2" name="password2">
                                <span  id="checkpassword2" >两次输入密码不一致</span>
			</div>
		</div>

           
	
		<div class="row cl">
			<div class="col-xs-2 col-sm-3 col-xs-offset-2 col-sm-offset-2">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;保存&nbsp;&nbsp;">
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
<!--/_footer /作为公共模版分离出去--> 

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/jquery.validate.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/validate-methods.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/messages_zh.js')}}"></script> 
@if( Session::get('msg')=="密码错误")
<script type="text/javascript">   
layer.alert('修改失败', {icon: 2}); 
</script>
@endif

@if( Session::get('status')=="修改成功")
<script type="text/javascript">   
layer.alert('修改成功', {icon: 1}); 
window.location.href="{{url('admin/ma_admin/info')}}";
</script>
@endif



<script type="text/javascript">
    

    
function confirm(){
  $("#pwwrong").hide();
  if(funcChina($("#name").val())==="2"){//检验姓名  全是中文
       $("#checkname").show();
      return false;       
  }else{
       $("#checkname").hide(); 
  }

 if($("#password").val() === "" ){   
     $("#checkpassword").show();
       return false;
    }else{
         $("#checkpassword").hide();
        
    }

 if($("#password1").val()!== "" ){   
     
if($("#password1").val().length < 7 || $("#password1").val().length >16 ){
      $("#checkpassword1").show();
     return false;
  }else {
      $("#checkpassword1").hide();
  }  
  
  if(checkPw($("#password1").val())==="2"){
      $("#checkpassword1").show();
      return false;
  }else {
 $("#checkpassword1").hide();
  }
}




if($("#password1").val()!== "" ){   
  if($("#password1").val()!==$("#password2").val()){
     $("#checkpassword2").show();
     return false;
  }else {
    $("#checkpassword2").hide();
  }
}
}

 function checkPw(password){
//    var  reg = /^[A-Za-z0-9]{6,20}$/;

 var  reg=new RegExp('(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9]).{6,16}');
    if (reg.test(password)){
         return "3" ;
    }
     return "2"; 
}
 
 
function funcChina(name)
     {     
     
     var reg=/^[\u2E80-\u9FFF]+$/;
     if (reg.test(name) && name.length>0 && name.length<7){
        return "3" ;
    }
       return "2"; 
   }
//function checkPw(password){
//    var  reg = /^[a-zA-Z0-9_-@#$%^&*?<>|~+:]{6,16}$/;
//    if ( pPattern.test(password)){
//         return "3" ;
//    }
//     return "2"; 
//}
   

    

</script>


<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>

@endsection