
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
                                        <li ><a href="{{url('admin/article/create')}}" title="文章管理">添加公告</a></li>
                                        @endif
		</ul>            
			</dd>
		</dl>
<dl id="menu-department">
			<dt  class="selected"><i class="Hui-iconfont">&#xe620;</i> 部门管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd   style="display:block">
				<ul>
                                    @if(in_array('部门查看',$role))
					<li  class="current"><a href="{{url('admin/department')}}" title="部门列表">部门列表</a></li>
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
<div class="dislpayArrow hidden-xs">
	<a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
</div>
<!--/_menu 作为公共模版分离出去-->


<script>
    
    
    </script>
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		部门管理
		<span class="c-gray en">&gt;</span>
		部门列表
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
	<div class="Hui-article">
		<article class="cl pd-20">

			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
                                    
                                 @if(in_array('部门删除',$role))
				<a href="javascript:;" onclick="delAll()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
                                 @endif
                               @if(in_array('部门添加',$role))
				
                                 <a class="btn btn-primary radius" data-title="添加部门"   onclick="depart_add()"><i class="Hui-iconfont">&#xe600;</i> 添加部门</a>    
				
                                 @endif
				</span>
				<span class="r">共有数据：<strong>{{count($data)}}</strong> 条</span>
			</div>
			<div class="mt-20">
				<table class="table table-border table-bordered table-bg table-hover table-sort">
					<thead  class="header">
						<tr class="text-c">
							<th width="25"><input type="checkbox" name="" value=""></th>
							<th width="30">ID</th>
						
                                                        <th width="80">部门名称</th>
                                                     
							<th width="50">创建时间</th>
							  @if(in_array('部门编辑',$role) || in_array('部门删除',$role) )         
							<th width="120">操作</th>
                                                        @endif
						</tr>
					</thead>
					<tbody>
                                            
                                            @foreach($data as $k=>$value)
						<tr class="text-c">
							<td><input type="checkbox"  name="del"  value="{{$value->id}}"></td>
							<td>{{$value->id}}</td>
							
							<td width="80">{{$value->name}}</td>
                                                      
                                                        <td>{{$value->created_at}}</td>
                                  @if(in_array('部门修改',$role) || in_array('部门删除',$role) )                     
					             
	       <td class="f-14 td-manage">
            
            <!--<a style="text-decoration:none" onClick="article_stop(this,'10001')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>-->
                                    
                                    @if(in_array('部门修改',$role))                    
                                    <a style="text-decoration:none" class="ml-5" onClick="depart_edit(this,{{$value->id}})" href="javascript:;" title="编辑">
                                       编辑
                                    </a>
                                    @endif
                                    
                                    @if(in_array('部门删除',$role))               
                                    <a style="text-decoration:none" class="ml-5" onClick="depart_del(this,{{$value->id}})" href="javascript:;" title="删除">
                                      删除
                                    </a>
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
    
    
      @if(in_array('部门修改',$role) || in_array('部门删除',$role) )         
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
		//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		{"orderable":false,"aTargets":[0,4]}// 不参与排序的列
	]
});
@else
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
		//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		{"orderable":false,"aTargets":[0]}// 不参与排序的列
	]
});
@endif

/*添加*/
function depart_add(){   
 
layer.prompt({title: '请输入部门，并确认'}, function(val, index){
        layer.close(index);
        if(val.length>10){
       layer.msg('不能超过十个字符'); 
     return false;
   }
     $.post("{{url('admin/department/add')}}",{'_token':'{{csrf_token()}}','data':val},function(data){
         
         if(data=="添加成功"){
          layer.msg('添加成功',{icon:1,time:1000});
          location.reload('true');}
      else if(data=="没有权限"){
           location.href="{{url('admin/manage')}}";
      }
      else  {
           layer.msg('部门已存在',{icon:2,time:1000});
      }
    
//    layer.msg('部门已存在',{icon:2,time:1000});
 });  
});

	
}
/*部门-编辑*/
function depart_edit(obj,id){
  
	layer.prompt({title: '请输入修改过后的部门名称，并确认'}, function(val, index){         
        layer.close(index);
        if(val.length>10){
       layer.msg('不能超过十个字符'); 
     return false;
   }
     $.post("{{url('admin/department/set')}}",{'_token':'{{csrf_token()}}','data':val,'id':id},function(data){
           if(data=="修改成功"){
          layer.msg('修改成功',{icon:1,time:1000});
          location.reload('true');}
       else if(data=="没有权限"){
           location.href="{{url('admin/manage')}}";
      }
      else{
           layer.msg('部门已存在',{icon:2,time:1000});
      }
 });  
});
}
/*部门-删除*/
function depart_del(obj,id){
       layer.confirm('确认要删除吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
	                $.post("{{url('admin/department/delete')}}",{'_token':'{{csrf_token()}}','data':id},function(data){
                        
                       if(data=="此部门存在用户"){
                  layer.msg('此部门存在用户!',{icon:2,time:1000});}
              else if(data=="没有权限"){
                   location.href="{{url('admin/manage')}}";
                  
                     }
                  else{
                         $(obj).parents("tr").remove();
                      layer.msg('删除成功', {icon: 1,time:1000}); 
        }
    });
    
              
		
        
	});
}

   function delAll () {
     
     var a= $('input:checkbox[name=del]:checked').length;
        if(a===0){     
        layer.msg('未选择删除内容', {icon: 2,time:1000}); 
        return 0;
       }

        layer.confirm('确认要删除吗？',function(index){         
             $('input:checkbox[name=del]:checked').each(function(index){
                 
             
                 var  id=$(this).val();
                  
                     $.post("{{url('admin/department/delete')}}",{'_token':'{{csrf_token()}}','data':id},function(data){
                    if(data=="此部门存在用户"){
                    layer.msg('此部门存在用户!',{icon:2,time:1000});}
                    else if(data=="没有权限"){
                    location.href="{{url('admin/manage')}}";
                     }
                      else{
                        $(this).not('.header').parents('tr').remove();  
                      layer.msg('删除成功', {icon: 1,time:1000}); 
                    }       
                         
                         
          });
                   
                 })
                 
                 
        });
      }
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>

@endsection