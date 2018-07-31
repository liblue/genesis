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
					
		</ul>
	</dd>
</dl>
		<dl id="menu-member">
			<dt class="selected"><i class="Hui-iconfont">&#xe60d;</i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
                        <dd  style="display:block">
				<ul>
					@if(in_array('用户查看',$role))
					<li class="current"><a href="{{url('admin/user')}}" title="会员列表">用户列表</a></li>
                                         @endif
                                         @if(in_array('用户添加',$role))
                                        <li><a href="{{url('admin/user/create')}}" title="会员列表">添加用户</a></li>
                                           @endif
                                         

		</ul>
	</dd>
</dl>@if( Session::get('admin_type')=='超级管理员')	
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
<!--/_menu 作为公共模版分离出去-->
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 会员列表<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
                    
                     <form action="{{url('admin/user')}}" method="get">
			<div class="text-c"> 日期范围：
				<input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin"  name="start" class="input-text Wdate" style="width:120px;">
				-
				<input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax"  name="end" class="input-text Wdate" style="width:120px;">
				<input type="text" class="input-text" style="width:250px" placeholder="输入用户账号" id="" name="account_num">
				<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
			</div>
                    </form>
                         
			<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"> </span> <span class="r">共有数据：<strong>{{count($res)}}</strong> 条</span> </div>
			<div class="mt-20">
				<table class="table table-border table-bordered table-hover table-bg table-sort">
					<thead>
						<tr class="text-c">
							
							<th width="80">ID</th>
							<th width="50">姓名</th>
							<th width="40">性别</th>
							<th width="90">账号</th>
                                                        <th width="70">部门</th>
                                                        <th width="70">角色</th>
							<th width="70">手机号</th>
                                                        <th width="50">头像</th>
							<th width="100">注册时间</th>
                                                        <th width="70">状态</th>
                                                          @if(in_array('用户启用',$role) ||in_array('用户修改',$role) )
                                                        <th width="100">操作</th>
                                                        @endif
						</tr>
					</thead>
					<tbody>
                                           
                                            @foreach($res as $value)
						<tr class="text-c">
							
							<td>{{$value->id}}</td>
							<td><u style="cursor:pointer" class="text-primary" >{{$value->name}}</u></td>
                                                        
                                                    @if($value->gender=="男")
							<td>男</td>
                                                        @else
                                                        <td>女</td>
                                                    @endif
							<td>{{$value->account_num}}</td>
                                                        <td>{{$value->department->name}}</td>
                                                        <td>{{$value->role->name}}</td>
							<td>{{$value->cellphone}}</td>
							
                                                        <td><img src="{{asset($value->thumb)}}"  width="50px" /></td>
                                                        <td>{{$value->created_at}}</td>
                                                      
							  <td class="td-status">
                                                    
                                                    @if($value->is_stop=="已启用")
                                                    <span class="label label-success radius">已启用</span>
                                                   @else
                                                   <span class="label label-defaunt radius">已禁用</span>
                                                  @endif
                                                
                                                </td>
                                                
                                                
                                                @if(in_array('用户禁用',$role) || in_array('用户修改',$role) )
                                                <td class="td-manage">    
                                                    @if(in_array('用户禁用',$role))
                                                    
                                                 @if($value->is_stop=="已禁用")
                                                    <a onClick="member_start(this,{{$value->id}})" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>
                                                    @else
                                                   <a onClick="member_stop(this,{{$value->id}})" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>
                                                    @endif
                                                       @endif
                                                   
                                                    
                                                    @if(in_array('用户修改',$role))
                                                      <a title="编辑" href="{{url('admin/user/'.$value->id.'/edit')}}"  class="ml-5" style="text-decoration:none;font-size: 12px;">编辑</a>
                                                       @endif
                                                    </td>
                                                 @endif   
                                                    
                                                    
                                                    
						</tr>
                                                @endforeach
                                                
                                               
					</tbody>
				</table>
			</div>
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
$(function(){
     @if(in_array('用户禁用',$role) ||in_array('用户修改',$role) )
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[8,9]}// 制定列不参与排序
		]
	});
    
    @else  
         
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[8]}// 制定列不参与排序
		]
	});
        
        
        @endif
	$('.table-sort tbody').on( 'click', 'tr', function () {
		if ( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
		}
		else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});
});
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		
                    $.post("{{url('admin/user/is_stop')}}",{'_token':'{{csrf_token()}}','data':id},function(data){
                        
                        
                        if(data==="没有权限"){
                            
                            location.href="{{url('admin/manage')}}";
                        }else{
                            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已禁用</span>');
		$(obj).remove();
                         layer.msg('已停用!',{icon: 5,time:1000});   
                        }
              
    });
                
		
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		
                
                 $.post("{{url('admin/user/is_stop')}}",{'_token':'{{csrf_token()}}','data':id},function(data){                        
                      
                        if(data==="没有权限"){
                            
                            location.href="{{url('admin/manage')}}";
                        }else{
                            
                            $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
                            layer.msg('已启用!',{icon: 6,time:1000});
                              }
    });
		
	});
}




/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});
}


function  datadel(obj){
        layer.confirm('确认要删除吗？',function(index){
            //捉到所有被选中的，发异步进行删除          
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();           
         $.post("{{url('admin_del')}}",{'_token':'{{csrf_token()}}','data':data},function(data){       
    });
            
            
        });
   $("table input:checkbox").each(function(){
    if($(this).attr("checked")==true){
        alert($("table input:checkbox").index(this))
	//值
	console.log($(this).parent().parent().children().eq(1).text());
    }
})
}
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
@endsection
