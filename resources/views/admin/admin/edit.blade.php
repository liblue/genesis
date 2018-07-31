@extends('layout.header')
@section('content')
<!--/_header 作为公共模版分离出去-->

<style  type="text/css">
    #checkname,#checkaccount_num,#checkpassword,#checkpassword2{
        display:none;
        color:red;
    }
    #is_has_account{
        
        color:red;
    }
    
</style>
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
                                        <li  class="current"><a href="{{url('admin/user/create')}}" title="会员列表">添加用户</a></li>
                                           @endif

		</ul>
	</dd>
</dl>
@if( Session::get('admin_type')=='超级管理员')
		<dl id="menu-admin">
			<dt  class="selected"><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                        <dd  style="display:block">
				<ul>			                                      
					<li  class="current"><a href="{{url('admin/ma_admin')}}" title="管理员列表">管理员列表</a></li>
                                        <li><a href="{{url('admin/ma_admin/create')}}" title="管理员列表">添加管理员</a></li>					
		</ul>
	</dd>
</dl>
@endif

</div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<!--/_menu 作为公共模版分离出去-->

        
        
        


<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		管理员管理
		<span class="c-gray en">&gt;</span>
		信息修改 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
                <div class="cl pd-5 bg-1 bk-gray mt-20"  style="border:0px;background-color: white">
				<span class="l"> <a href="{{url('admin/ma_admin')}}" onclick="datadel()" class="btn  radius">管理员列表</a>  </span>
			</div>
		<article class="cl pd-20">
                    
                    
                    <form action="{{url('admin/ma_admin/set/').'/'.$data->id}}" method="post" class="form form-horizontal" id="form-admin-add"  onsubmit="return confirm()">
                                   {{ csrf_field() }}
                                   
                                      <div class="row cl">
			<label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>账户：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text"  style="border:0px;" value="{{$data->account_num}}" readonly="readonly">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>姓名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="{{$data->name}}" placeholder="{{$data->name}}" id="name" name="name">
                                      <span  id="checkname"  >请输入至少不超过6位的名称且必须都是中文！</span>
			</div>
		</div>
            
		<div class="row cl">
			<label class="form-label col-xs-2 col-sm-2">新密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" autocomplete="off"  placeholder="新密码" id="password" name="password">
                                  <span  id="checkpassword" > 请输入6到16位的字符,包括至少1个大写字母，1个小写字母，1个数字，1个特殊字符！</span>
			</div>
		</div>
                <div class="row cl">
			<label class="form-label col-xs-2 col-sm-2">确认密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" autocomplete="off"  placeholder="确认密码" id="password2" name="password2">
                                <span  id="checkpassword2" >两次输入密码不一致！</span>
			</div>
		</div>
                <div class="row cl">
               
			<label class="form-label col-xs-2 col-sm-2">管理员权限：</label>
                        
                        
                        
			<div class="formControls col-xs-8 col-sm-9">

				<dl class="permission-list">
					
					<dd>
                                            <dl class="cl permission-list2">
							<dt>
								<label class="">
									用户</label>
							</dt>
							<dd>
								<label class="">
                                                              @if(in_array('用户查看',$data->role))     
									<input type="checkbox" value="用户查看"  name="role[]" checked id="user-Character-0-1-0">
                                                                 @else         
                                                                        <input type="checkbox" value="用户查看" name="role[]"  id="user-Character-0-1-0">
                                                                 @endif         
									查看</label>
                                                            
                                                            <label class="">
                                                                    @if(in_array('用户禁用',$data->role))     
                                                                        <input type="checkbox" value="用户禁用" name="role[]" checked="" id="user-Character-0-1-1">
                                                                    @else    
                                                                        <input type="checkbox" value="用户禁用" name="role[]"  id="user-Character-0-1-0">
									  @endif       
									禁用</label>
                                                            <label class="">
                                                             @if(in_array('用户添加',$data->role))                                                               
									<input type="checkbox" value="用户添加" name="role[]"  checked="" id="user-Character-0-1-1">
                                                                           @else   
                                                                           <input type="checkbox" value="用户添加" name="role[]" id="user-Character-0-1-1">
                                                                             @endif      
                                                                        
									添加</label>
                                                             <label class="">
                                                             @if(in_array('用户修改',$data->role))                                                               
									<input type="checkbox" value="用户修改" name="role[]"  checked="" id="user-Character-0-1-1">
                                                                           @else   
                                                                           <input type="checkbox" value="用户修改" name="role[]" id="user-Character-0-1-1">
                                                                             @endif      
                                                                        
									修改</label>
								
                                                            
								
								
							</dd>
						</dl>
						<dl class="cl permission-list2">
							<dt>
								<label class="">
									公告</label>
							</dt>
							<dd>
                                                            <label class="">
                                                         
                                                                 @if(in_array('公告查看',$data->role))     
								    <input type="checkbox" value="公告查看" name="role[]" checked id="user-Character-0-0-0">
                                                                @else    
                                                                    <input type="checkbox" value="公告查看" name="role[]"  id="user-Character-0-0-0">
                                                               @endif       
									查看</label>
                                                            
                                                            <label class="">
                                                                           @if(in_array('公告修改',$data->role))   
									<input type="checkbox" value="公告删除" name="role[]" checked id="user-Character-0-0-2">
                                                                          @else  
                                                                        <input type="checkbox" value="公告删除" name="role[]" id="user-Character-0-0-2">
                                                                           @endif       
									删除</label>
                                                              
								<label class="">
                                                          
                                                                    @if(in_array('公告添加',$data->role))    
                                                                    <input type="checkbox" value="公告添加" name="role[]" checked id="user-Character-0-0-0">
                                                                @else    
                                                                    <input type="checkbox" value="公告添加" name="role[]" id="user-Character-0-0-0">
                                                                  @endif       
									添加</label>
								<label class="">
                                                                        
                                                                     @if(in_array('公告修改',$data->role))     
									<input type="checkbox" value="公告修改" name="role[]" checked id="user-Character-0-0-1">
                                                                         @else  
                                                                      <input type="checkbox" value="公告修改" name="role[]" id="user-Character-0-0-1">
                                                                           @endif       
									修改</label>
								       
                                                              <label class="">
                                                                           @if(in_array('公告下架',$data->role))   
									<input type="checkbox" value="公告下架" name="role[]" checked id="user-Character-0-0-2">
                                                                          @else  
                                                                        <input type="checkbox" value="公告下架" name="role[]" id="user-Character-0-0-2">
                                                                           @endif       
									下架</label>
                                                            
                                                            
                                                            
                                                            
								
								
								<!--<label class="c-orange"><input type="checkbox" value="" name="role[]" id="user-Character-0-0-5"> 只能操作自己发布的</label>-->
							</dd>
						</dl>
                                            <dl class="cl permission-list2">
							<dt>
								<label class="">
									文章</label>
							</dt>
							<dd>
                                                            <label class="">
                                                                
                                                                   @if(in_array('文章查看',$data->role)) 
							            <input type="checkbox" value="文章查看" name="role[]" checked id="user-Character-0-0-0">
                                                                    @else  
                                                                    <input type="checkbox" value="文章查看" name="role[]" id="user-Character-0-0-0">
                                                                     @endif    
                                      
									查看</label>
								
								<label class="">
                                                                     @if(in_array('文章删除',$data->role)) 
                                                                   <input type="checkbox" value="文章删除" name="role[]" checked id="user-Character-0-0-2">
                                                                    @else  
                                                                <input type="checkbox" value="文章删除" name="role[]" id="user-Character-0-0-2">
                                                                            @endif    
									
									删除</label>
                                                            <label class="">
                                                                     @if(in_array('文章下架',$data->role)) 
                                                                   <input type="checkbox" value="文章下架" name="role[]" checked  id="user-Character-0-0-2">
                                                                    @else  
                                                                 <input type="checkbox" value="文章下架" name="role[]" id="user-Character-0-0-2">
                                                                            @endif    
									
									下架</label>
								
							</dd>
						</dl>
						
                                 
                                            <dl class="cl permission-list2">
							<dt>
								<label class="">
									
									评论</label>
							</dt>
							<dd>
                                                            
                                                            
								<label class="">
                                                                    
                                                                       @if(in_array('评论查看',$data->role))
                                                                      <input type="checkbox" value="评论查看" name="role[]" checked id="user-Character-0-1-0">
                                                                        @else 
                                                                        <input type="checkbox" value="评论查看" name="role[]" id="user-Character-0-1-0">
                                                                         @endif  
									
									查看</label>
								<label class="">
									 @if(in_array('评论删除',$data->role))
                                                                      <input type="checkbox" value="评论删除" name="role[]"checked  id="user-Character-0-1-0">
                                                                        @else 
                                                                        <input type="checkbox" value="评论删除" name="role[]" id="user-Character-0-1-0">
                                                                         @endif  
									删除</label>
								
								
							</dd>
						</dl>
                                             <dl class="cl permission-list2">
							<dt>
								<label class="">
									
									部门</label>
							</dt>
							<dd>
                                                            <label class="">
                                                         
                                                                 @if(in_array('部门查看',$data->role))     
								    <input type="checkbox" value="部门查看" name="role[]" checked id="user-Character-0-0-0">
                                                                @else    
                                                                    <input type="checkbox" value="部门查看" name="role[]"  id="user-Character-0-0-0">
                                                               @endif       
									查看</label>
                                                            
								
								<label class="">
									 @if(in_array('部门删除',$data->role))
                                                                      <input type="checkbox" value="部门删除" name="role[]"checked  id="user-Character-0-1-0">
                                                                        @else 
                                                                        <input type="checkbox" value="部门删除" name="role[]" id="user-Character-0-1-0">
                                                                         @endif  
									删除</label>
                                                            <label class="">
                                                                    
                                                                       @if(in_array('部门添加',$data->role))
                                                                      <input type="checkbox" value="部门添加" name="role[]" checked id="user-Character-0-1-0">
                                                                        @else 
                                                                        <input type="checkbox" value="部门添加" name="role[]" id="user-Character-0-1-0">
                                                                         @endif  
									
									添加</label>
                                                            <label class="">
                                                                    
                                                                       @if(in_array('部门修改',$data->role))
                                                                      <input type="checkbox" value="部门修改" name="role[]" checked id="user-Character-0-1-0">
                                                                        @else 
                                                                        <input type="checkbox" value="部门修改" name="role[]" id="user-Character-0-1-0">
                                                                         @endif  
									
									修改</label>
								
								
							</dd>
						</dl>
                                            <dl class="cl permission-list2">
							<dt>
								<label class="">
									
									角色</label>
							</dt>
							<dd>
                                                            <label class="">
                                                         
                                                                 @if(in_array('角色查看',$data->role))     
								    <input type="checkbox" value="角色查看" name="role[]" checked id="user-Character-0-0-0">
                                                                @else    
                                                                    <input type="checkbox" value="角色查看" name="role[]"  id="user-Character-0-0-0">
                                                               @endif       
									查看</label>
                                                            
								
								<label class="">
									 @if(in_array('角色删除',$data->role))
                                                                      <input type="checkbox" value="角色删除" name="role[]"checked  id="user-Character-0-1-0">
                                                                        @else 
                                                                        <input type="checkbox" value="角色删除" name="role[]" id="user-Character-0-1-0">
                                                                         @endif  
									删除</label>
                                                            <label class="">
                                                                    
                                                                       @if(in_array('角色添加',$data->role))
                                                                      <input type="checkbox" value="角色添加" name="role[]" checked id="user-Character-0-1-0">
                                                                        @else 
                                                                        <input type="checkbox" value="角色添加" name="role[]" id="user-Character-0-1-0">
                                                                         @endif  
									
									添加</label>
                                                            <label class="">
                                                                    
                                                                       @if(in_array('角色修改',$data->role))
                                                                      <input type="checkbox" value="角色修改" name="role[]" checked id="user-Character-0-1-0">
                                                                        @else 
                                                                        <input type="checkbox" value="角色修改" name="role[]" id="user-Character-0-1-0">
                                                                         @endif  
									
									修改</label>
								
								
							</dd>
						</dl>
                                       
					</dd>
				</dl>
			
			</div>
		</div>
	
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-2 col-sm-offset-2">
				<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;修改&nbsp;&nbsp;">
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

@if( Session::get('msg')=="修改成功")
<script type="text/javascript">   
layer.alert('修改成功', {icon: 1}); 
window.location.href="{{url('admin/ma_admin')}}";
</script>
@endif



<script type="text/javascript">
function confirm(){
        
 
  if(funcChina($("#name").val())==="2"){
       $("#checkname").show();
      return false;       
  }else{
       $("#checkname").hide(); 
  }
  if($("#name").val() === "" || $("#name").val().length >6){
   $("#checkname").show();
     return false;
  }else{
  $("#checkname").hide();
  }


  if($("#password").val() !== "" ){
      
      
  if($("#password").val().length < 6 || $("#password").val().length >16){
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
  
  
  }
  
  if($("#password").val()!==$("#password2").val()){
     $("#checkpassword2").show();
     return false;
  }else {
    $("#checkpassword2").hide();
  }

    return true;
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
     if (reg.test(name)){
        return "3" ;
    }
       return "2"; 
   }

</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
@endsection