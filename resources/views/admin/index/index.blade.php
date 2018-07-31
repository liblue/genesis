@extends('layout.header')
@section('content')
<aside class="Hui-aside">
	
	<div class="menu_dropdown bk_2">
		<dl id="menu-article" >
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
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<!--/_menu 作为公共模版分离出去-->
<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont"></i> <a href="/" class="maincolor">首页</a> 
		<span class="c-999 en">&gt;</span>
                <span class="c-666">我的桌面<input type='hidden' value="{{$share}}"  id="share">
                
                   
                                  </span> 
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<p class="f-20 text-success">
				<span class="f-14"></span>
				</p>
<!--			<p>登录次数：18 </p>-->
<!--			<p>上次登录IP：222.35.131.79.1  上次登录时间：2014-6-14 11:19:55</p>-->
			<table class="table table-border table-bordered table-bg">
				<thead>
					<tr>
						<th colspan="7" scope="col">信息统计</th>
			</tr>
					<tr class="text-c">
						<th>统计</th>
						<th>资讯库</th>
						<th>图片库</th>
						<th>产品库</th>
						<th>用户</th>
						<th>管理员</th>
			</tr>
		</thead>
				<tbody>
					<tr class="text-c">
						<td>总数</td>
						<td>92</td>
						<td>9</td>
						<td>0</td>
						<td>8</td>
						<td>20</td>
			</tr>
					<tr class="text-c">
						<td>今日</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
			</tr>
					<tr class="text-c">
						<td>昨日</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
			</tr>
					<tr class="text-c">
						<td>本周</td>
						<td>2</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
			</tr>
					<tr class="text-c">
						<td>本月</td>
						<td>2</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
						<td>0</td>
			</tr>
		</tbody>
	</table>
<!--			<table class="table table-border table-bordered table-bg mt-20">
				<thead>
					<tr>
						<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
				<tbody>
					<tr>
						<th width="30%">服务器计算机名</th>
						<td><span id="lbServerName">http://127.0.0.1/</span></td>
			</tr>
					<tr>
						<td>服务器IP地址</td>
						<td>11111</td>
			</tr>
					<tr>
						<td>服务器域名</td>
						<td>11111</td>
			</tr>
					<tr>
						<td>服务器端口 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>服务器IIS版本 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>本文件所在文件夹 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>服务器操作系统 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>系统所在文件夹 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>服务器脚本超时时间 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>服务器的语言种类 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>.NET Framework 版本 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>服务器当前时间 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>服务器IE版本 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>服务器上次启动到现在已运行 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>逻辑驱动器 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>CPU 总数 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>CPU 类型 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>虚拟内存 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>当前程序占用内存 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>Asp.net所占内存 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>当前Session数量 </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>当前SessionID </td>
						<td>11111</td>
			</tr>
					<tr>
						<td>当前系统用户名 </td>
						<td>11111</td>
			</tr>
		</tbody>
	</table>-->
</article>
		<footer class="footer">
			<p> <br> Genesis后台系统</p>
</footer>
</div>
</section>

<!--_footer 作为公共模版分离出去-->


<script type="text/javascript" src="{{asset('admin/lib/jquery/1.9.1/jquery.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/h-ui/js/H-ui.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/h-ui.admin/js/H-ui.admin.page.js')}}"></script> 
<!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript">
$(function(){
  
var  data= $("#share").val();
// alert(data);
 
 
 
var  arr= new Array(); 
arr=data.split("|"); 
//alert(arr[2]);

for(i=0;i<arr.length ;i++ ){
    
   var data=arr[i];
$("[name=data]").hide();
}
});



</script>
<!--/请在上方写此页面业务相关的脚本-->

<!--此乃百度统计代码，请自行删除-->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?080836300300be57b7f34f4b3e97d911";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
<!--/此乃百度统计代码，请自行删除-->
</body>
</html>
@endsection
