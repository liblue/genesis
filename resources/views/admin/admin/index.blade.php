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
<!--		<dl id="menu-picture">
			<dt><i class="Hui-iconfont">&#xe613;</i> 图片管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd>
				<ul>
					<li><a href="picture-list.html" title="图片管理">图片管理</a></li>
		</ul>
	</dd>
</dl>-->
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
				<ul>     @if(in_array('用户查看',$role))
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
        @yield('content')
        
        
        


<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		管理员管理
		<span class="c-gray en">&gt;</span>
		管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>
	<div class="Hui-article">
		<article class="cl pd-20">
                    
                        <form  action="{{url('admin/ma_admin')}}" method="get">
			<div class="text-c">
<!--                            日期范围：
				<input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin" name="start" class="input-text Wdate" style="width:120px;">
				-
				<input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;"  name="end">-->
				<input type="text" class="input-text" style="width:250px" placeholder="输入管理员姓名或账号" id="" name="name"  value="">
				<button type="submit" class="btn btn-success" id="" ><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
			</div>
                    </form>
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l"> 
                                    <!--<a href="javascript:;" onclick="delAll()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>--> 
                                    <a href="{{url('admin/ma_admin/create')}}"  class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a>
                                </span>
				<span class="r">共有数据：<strong>{{count($data)}}
                                 
                                    </strong> 条</span>
			</div>
			<table class="table table-border table-bordered table-bg">
				<thead>
					<tr>
						<!--<th scope="col" colspan="9">员工列表</th>-->
					</tr>
					<tr class="text-c">
						<th width="25"><input type="checkbox" name="" value=""></th>
						<th width="40">ID</th>
						<th width="150">姓名</th>
						<th width="150">账号</th>
						<th width="130">加入时间</th>
                                                <th width="130">上次登录时间</th>
						<th width="100">权限</th>
                                                <th width="70">状态</th>
						<th width="100">操作</th>
					</tr>
				</thead>
				<tbody>
                                    
                                    @foreach($data as $k=>$value)
					<tr class="text-c">
                                            <td><input type="checkbox" name="del" value="{{$value->id}}"></td>
						<td>{{$value->id}}</td>
						<td>{{$value->name}}</td>
                                                <td>{{$value->account_num}}</td>
						<td>{{$value->created_at}}</td>
                                                <td>{{$value->last_login}}</td>
						<td >{{$value->role}}</td>
                                                <td class="td-status">
                                                    
                                                    @if($value->is_stop=="已启用")
                                                    <span class="label label-success radius">已启用</span>
                                                @else
                                                   <span class="label label-default radius">已禁用</span>
                                                @endif
                                                
                                                </td>
						<td class="td-manage">
                                                    
                                                    
                                                    @if($value->is_stop=="已禁用")
                                                    <a onClick="admin_start(this,{{$value->id}})" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
                                                    @else
                                                   <a onClick="admin_stop(this,{{$value->id}})" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>
                                                    
                                                    @endif
                                                    
                                                    <a title="编辑" href="{{url('admin/ma_admin/'.$value->id.'/edit')}}"  class="ml-5" style="text-decoration:none">编辑</a> 
<!--                                                    <a title="删除" href="javascript:;" onclick="admin_del(this,{{$value->id}})" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>-->
                                                </td>
					</tr>
                                        @endforeach
					
				</tbody>
			</table>
		</article>
	</div>
</section>

<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="{{asset('admin/lib/jquery/1.9.1/jquery.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/h-ui/js/H-ui.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/h-ui.admin/js/H-ui.admin.page.js')}}"></script> 
<!--/_footer /作为公共模版分离出去--> 

<!--请在下方写此页面业务相关的脚本--> 
<script type="text/javascript" src="{{asset('admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/lib/laypage/1.2/laypage.js')}}"></script> 




<script type="text/javascript">




function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
	                $.post("{{url('admin/ma_admin/delete')}}",{'_token':'{{csrf_token()}}','data':id},function(data){
                        $(obj).parents("tr").remove();
    });
		layer.msg('已删除!',{icon:1,time:1000});
	});
}


/*管理员-批量删除*/
function delAll () {
    var a= $('input:checkbox[name=del]:checked').length;
        if(a===0){     
        layer.msg('未选择删除内容', {icon: 2,time:1000}); 
        return 0;
       }
        layer.confirm('确认要删除吗？',function(index){
            
             $('input:checkbox[name=del]:checked').each(function(index){               
                 var  id=$(this).val();
                   $(this).not('.header').parents('tr').remove();  
                     $.post("{{url('admin/ma_admin/delete')}}",{'_token':'{{csrf_token()}}','data':id},function(data){
                      
    });
                    
                 })
                  layer.msg('删除成功', {icon: 1}); 
        });
      }

/*管理员-停用*/
function admin_stop(obj,id){
     
    
    
	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
		$(obj).remove();
                  $.post("{{url('admin/ma_admin/is_stop')}}",{'_token':'{{csrf_token()}}','data':id},function(data){
                 
                     if(data=="没有权限"){
                   location.href="{{url('admin/manage')}}";
                 
                     }else{
                         
                       layer.msg('已停用!',{icon: 5,time:1000});  
                     }
              
              
    });
		
	});
         
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
                   $.post("{{url('admin/ma_admin/is_stop')}}",{'_token':'{{csrf_token()}}','data':id},function(data){
              
    });
		layer.msg('已启用!', {icon: 6,time:1000});
	});
}
</script> 

<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>

@endsection