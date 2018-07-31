@extends('layout.header')
@section('content')
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->






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
			<dt  class="selected"><i class="Hui-iconfont">&#xe620;</i> 部门管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd   style="display:block">
				<ul>
                                    @if(in_array('部门查看',$role))
					<li><a href="{{url('admin/department')}}" title="部门列表">部门列表</a></li>   @endif
                                        
                                         @if(in_array('角色查看',$role))
					<li><a href="{{url('admin/role')}}" title="部门列表">角色列表</a></li>
					@endif
                                            
                                        @if(in_array('角色添加',$role))
                                       <li  class="current"><a href="{{url('admin/role/create')}}" title="部门列表">添加角色</a></li>
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
    #checkname,#checkbumen{
        display:none;
        color:red;
    }
   

</style>





   
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		<a>部门管理</a>
		<span class="c-gray en">&gt;</span>
		添加角色 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>

		<article class="cl pd-20">
                  
                    
    <form action="{{url('admin/role')}}" method="post" class="form form-horizontal" id="form-admin-add" onsubmit="return confirm()" enctype="multipart/form-data" >
                                      {{ csrf_field() }}
                             
                <!-- upload form -->
<!--                <form enctype="multipart/form-data" method="post"  class="form form-horizontal" action="{{url('admin/user/thumb')}}" onSubmit="return checkForm()">-->
                    <!-- hidden crop params -->
               <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>部门：</label>
			<div class="formControls col-xs-2 col-sm-2"> <span class="select-box">
                                <select name="department_id" class="select"  id="department_id">
                                    
                                      
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
			<label class="form-label col-xs-2 col-sm-2"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-2 col-sm-2">
                            <input type="text" class="input-text" placeholder="" id="name" name="name"> 
                                <span  id="checkname" >请输入不超过10个字的角色名称</span>
                           
                                
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






@if(Session::get('msg')==="添加成功")
<script type="text/javascript">    
   layer.alert('添加成功', {icon: 1}); 
</script>
@endif

@if(Session::get('msg')==="部门已存在本角色")
<script type="text/javascript">    
   layer.alert('部门已存在本角色', {icon: 2}); 
</script>
@endif




<script type="text/javascript">

function confirm(){
   if($("#department_id").val() === "" ){
     $("#checkbumen").show();
     return false;
  }else {
 $("#checkbumen").hide();
  }
  
  
   if($("#name").val() === "" || $("#name").val().length >10){
     $("#checkname").show();
     return false;
  }else {
 $("#checkname").hide();
  }

    return true;
 
}



</script>


<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>

@endsection