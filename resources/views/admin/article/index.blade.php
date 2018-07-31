
@extends('layout.header')
@section('content')
<!--/_header 作为公共模版分离出去-->

<!--_menu 作为公共模版分离出去-->
<aside class="Hui-aside">
	
	<div class="menu_dropdown bk_2">
		<dl id="menu-article">
			<dt class="selected"><i class="Hui-iconfont">&#xe616;</i> 文章管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
			<dd style="display:block">
				<ul>
                                        @if(in_array('文章查看',$role))
                                        <li class="current"><a href="{{url('admin/article')}}" title="文章管理">文章列表</a></li>
                                        @endif
                                        @if(in_array('公告查看',$role))
                                        <li ><a href="{{url('admin/article/notice')}}" title="">公告列表</a></li>
                                        @endif
                                        @if(in_array('公告添加',$role))
                                        <li ><a href="{{url('admin/article/create')}}" title="文章管理">添加公告</a></li>
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

<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		文章管理
		<span class="c-gray en">&gt;</span>
		文章列表
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
	</nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<div class="text-c">
				<form action="{{url('admin/article')}}" method="get">
				<span class="select-box inline">
				<select name="type" class="select">
					<option value="">全部分类</option>
					<option value="分享">分享</option>
					<option value="G友">G友</option>
				</select>
				</span>
				日期范围：
				<input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'logmax\')||\'%y-%M-%d\'}'})" id="logmin" class="input-text Wdate" style="width:120px;"  name="start">
				-
				<input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'logmin\')}',maxDate:'%y-%M-%d'})" id="logmax" class="input-text Wdate" style="width:120px;"  name="end">
				<input type="text" name="title" id="" placeholder=" 文章名称" style="width:250px" class="input-text">
				<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索</button>
                            </form>
			</div>
			<div class="cl pd-5 bg-1 bk-gray mt-20">
				<span class="l">
                                    
                                 @if(in_array('文章删除',$role))
				<a href="javascript:;" onclick="delAll()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
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
							<th width="100">标题</th>
                                                        <th width="50">封面</th>
							<th width="40">分类</th>
                                                        <th width="40">用户</th>
							<th width="50">发布时间</th>
							<th width="40">浏览次数</th>
							<th width="40">点赞次数</th>
                                                        <th width="40">评论</th>
                                                        
                                                         @if(in_array('文章下架',$role) || in_array('文章删除',$role) )     
							<th width="80">操作</th>
                                                        @endif
						</tr>
					</thead>
					<tbody>
                                            @if(count($data))
                                            @foreach($data as $k=>$value)
						<tr class="text-c">
							<td><input type="checkbox"  name="del"  value="{{$value->id}}"></td>
							<td>{{$value->id}}</td>
							<td><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','{{url('admin/article/'.$value->id)}}')" title="查看">{{$value->title}}</u></td>
							<td><img src="{{asset($value->imgurl)}}" witdh="30px"  height="30px"></td>
                                                        <td>{{$value->type}}</td>
							<td>{{$value->user->name}}</td>
                                                        <td>{{$value->created_at}}</td>
                                                        <td>{{$value->click}}</td>
                                                        <td>{{$value->like}}</td>
                                                          <td>  <a href="{{url('admin/comment/com_list').'?id='.$value->id.'&type='.'article'}}">{{$value->plnum}}
                                               <!--{{count($value->comment)}}-->
                                                               </a></td>
                                                               
                                                                 @if(in_array('文章下架',$role) || in_array('文章删除',$role) )     
	              <td class="f-14 td-manage">
                           @if(in_array('文章下架',$role)) 
                          @if($value->is_stop=="已启用")
                          <a style="text-decoration:none" onClick="article_stop(this,{{$value->id}})" href="javascript:;" title="发布">下架</a>
                          @else
                             <a style="text-decoration:none" onClick="article_start(this,{{$value->id}})" href="javascript:;" title="发布">启用</a>
                               @endif
                               @endif
                                    @if(in_array('文章删除',$role))                   
                                    <a style="text-decoration:none" class="ml-5" onClick="article_del(this,{{$value->id}})" href="javascript:;" title="删除">删除 </a>                                 
                                    @endif
								</td>
                                                                
                                                                @endif
						</tr>
                                                @endforeach                                           
                                                @endif
					
					</tbody>
				</table>
			</div>
		</article>
	</div>
</section>

<style>
    em{
    font-style: normal;
    font-weight: normal;}
    </style>
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

@if(count($data))
<script type="text/javascript">
    
      @if(in_array('文章下架',$role) || in_array('文章删除',$role) )     
$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"aoColumnDefs": [
		//{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		{"orderable":false,"aTargets":[0,9]}// 不参与排序的列
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

/*文章-添加*/
function article_add(title,url,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*文章-编辑*/
function article_edit(title,url,id,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
/*文章-删除*/
function article_del(obj,id){
   
       layer.confirm('确认要删除吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
	                $.post("{{url('admin/article/delete')}}",{'_token':'{{csrf_token()}}','data':id},function(data){
                           if(data==="没有权限"){                           
                            location.href="{{url('admin/manage')}}";
                        }else{
                             $(obj).parents("tr").remove(); 
                            layer.msg('已删除!',{icon:1,time:1000});
                        }
    });
		
	});
}

/*文章-审核*/
//function article_shenhe(obj,id){
//	layer.confirm('审核文章？', {
//		btn: ['通过','不通过','取消'], 
//		shade: false,
//		closeBtn: 0
//	},
//	function(){
//		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_start(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
//		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
//		$(obj).remove();
//		layer.msg('已发布', {icon:6,time:1000});
//	},
//	function(){
//		$(obj).parents("tr").find(".td-manage").prepend('<a class="c-primary" onClick="article_shenqing(this,id)" href="javascript:;" title="申请上线">申请上线</a>');
//		$(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">未通过</span>');
//		$(obj).remove();
//    	layer.msg('未通过', {icon:5,time:1000});
//	});	
//}
/*文章-下架*/
function article_stop(obj,id){
    
   
	layer.confirm('确认要下架吗？',function(index){
		
                 $.post("{{url('admin/article/is_stop')}}",{'_token':'{{csrf_token()}}','data':id},function(data){
           $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_start(this,id)" href="javascript:;" title="发布">启用</a>');
        $(obj).remove();
    });
		layer.msg('已下架!',{icon: 5,time:1000});
	});
}

/*文章-发布*/
function article_start(obj,id){
	layer.confirm('确认要发布吗？',function(index){
       
	 $.post("{{url('admin/article/is_stop')}}",{'_token':'{{csrf_token()}}','data':id},function(data){
             
             var  str=
     $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="article_stop(this,id)" href="javascript:;" title="发布">下架</a>');
          $(obj).remove();
    });
		layer.msg('已发布!',{icon: 6,time:1000});
	});
}
/*文章-申请上线*/
function article_shenqing(obj,id){
	$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">待审核</span>');
	$(obj).parents("tr").find(".td-manage").html("");
	layer.msg('已提交申请，耐心等待审核!', {icon: 1,time:2000});
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
                   $(this).not('.header').parents('tr').remove();  
                     $.post("{{url('admin/article/delete')}}",{'_token':'{{csrf_token()}}','data':id},function(data){
    });
                   
                 })
                   layer.msg('删除成功', {icon: 1}); 
        });
      }
</script>

@endif
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>

@endsection