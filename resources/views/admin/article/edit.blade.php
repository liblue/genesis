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
                                        <li><a href="{{url('admin/article')}}" title="文章管理">文章列表</a></li>
                                        @endif
                                        @if(in_array('公告查看',$role))
                                        <li class="current"><a href="{{url('admin/article/notice')}}" title="">公告列表</a></li>
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
<!--					<li><a href="member-del.html" title="删除的会员">删除的会员</a></li>
					<li><a href="member-level.html" title="等级管理">等级管理</a></li>
					<li><a href="member-scoreoperation.html" title="积分管理">积分管理</a></li>
					<li><a href="member-record-browse.html" title="浏览记录">浏览记录</a></li>
					<li><a href="member-record-download.html" title="下载记录">下载记录</a></li>
					<li><a href="member-record-share.html" title="分享记录">分享记录</a></li>-->
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
     
        
        
        


        <section class="Hui-article-box" style="overflow:scroll">
            <nav class="breadcrumb"  ><i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span>
		管理员管理
		<span class="c-gray en">&gt;</span>
		修改公告 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a> </nav>

<article class="page-container">
   
    
    <form class="form form-horizontal" id="form-article-add"  action="{{url('admin/article/'.$data->id)}}" method="post"  enctype="multipart/form-data">
        {{csrf_field()}}
        
              <input type="hidden" name="_method" value="put"/>
          
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" placeholder="" id="" name="title" value="{{$data->title}}">
			</div>
		</div>
	
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章分类：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="type" class="select">
                                    
                                    
                                    @if($data->type==='通知')
					<option value="通知"  selected>通知</option>
					<option value="动态">动态</option>
                                        @else
                                        
                                        <option value="通知"  >通知</option>
					<option value="动态" selected>动态</option>
                                        @endif
				</select>
				</span> </div>
		</div>
	
	
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章作者：</label>
			<div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text"  placeholder="" id="" name="user_id"  value="{{$data->admin->name}}">
			</div>
		</div>
	        <div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">缩略图：</label>
			<div class="formControls col-xs-8 col-sm-9">
		        <input  type="file"  name="myfile" value="{{$data->imgurl}}"/>
			</div>
		</div>
	 
	 
		
	
	
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章内容：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
                            <div  style="display: none"><textarea id="content">{{$data->content}}</textarea></div>
   
				<script id="editor" type="text/plain" style="width:100%;height:400px;"></script> 
			</div>
		</div>
        
     
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                            
                          
				<button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 修改</button>
				<!--<button onClick="article_save();" class="btn btn-secondary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存草稿</button>-->
				<button onClick="quxiao()" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
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
<script type="text/javascript" src="{{asset('admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/jquery.validate.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/validate-methods.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/lib/jquery.validation/1.14.0/messages_zh.js')}}"></script>   
<script type="text/javascript" src="{{asset('admin/lib/webuploader/0.1.5/webuploader.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/lib/ueditor/1.4.3/ueditor.config.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/lib/ueditor/1.4.3/ueditor.all.min.js')}}"> </script> 
<script type="text/javascript" src="{{asset('admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js')}}"></script>
<script type="text/javascript">
//$(function(){
//	$('.skin-minimal input').iCheck({
//		checkboxClass: 'icheckbox-blue',
//		radioClass: 'iradio-blue',
//		increaseArea: '20%'
//	});
//	
//	
//	$list = $("#fileList"),
//	$btn = $("#btn-star"),
//	state = "pending",
//	uploader;
//
//	var uploader = WebUploader.create({
//		auto: true,
//		swf: 'lib/webuploader/0.1.5/Uploader.swf',
//	
//		// 文件接收服务端。
//		server: 'fileupload.php',
//	
//		// 选择文件的按钮。可选。
//		// 内部根据当前运行是创建，可能是input元素，也可能是flash.
//		pick: '#filePicker',
//	
//		// 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
//		resize: false,
//		// 只允许选择图片文件。
//		accept: {
//			title: 'Images',
//			extensions: 'gif,jpg,jpeg,bmp,png',
//			mimeTypes: 'image/*'
//		}
//	});
//	uploader.on( 'fileQueued', function( file ) {
//		var $li = $(
//			'<div id="' + file.id + '" class="item">' +
//				'<div class="pic-box"><img></div>'+
//				'<div class="info">' + file.name + '</div>' +
//				'<p class="state">等待上传...</p>'+
//			'</div>'
//		),
//		$img = $li.find('img');
//		$list.append( $li );
//	
//		// 创建缩略图
//		// 如果为非图片文件，可以不用调用此方法。
//		// thumbnailWidth x thumbnailHeight 为 100 x 100
//		uploader.makeThumb( file, function( error, src ) {
//			if ( error ) {
//				$img.replaceWith('<span>不能预览</span>');
//				return;
//			}
//	
//			$img.attr( 'src', src );
//		}, thumbnailWidth, thumbnailHeight );
//	});
//	// 文件上传过程中创建进度条实时显示。
//	uploader.on( 'uploadProgress', function( file, percentage ) {
//		var $li = $( '#'+file.id ),
//			$percent = $li.find('.progress-box .sr-only');
//	
//		// 避免重复创建
//		if ( !$percent.length ) {
//			$percent = $('<div class="progress-box"><span class="progress-bar radius"><span class="sr-only" style="width:0%"></span></span></div>').appendTo( $li ).find('.sr-only');
//		}
//		$li.find(".state").text("上传中");
//		$percent.css( 'width', percentage * 100 + '%' );
//	});
//	
//	// 文件上传成功，给item添加成功class, 用样式标记上传成功。
//	uploader.on( 'uploadSuccess', function( file ) {
//		$( '#'+file.id ).addClass('upload-state-success').find(".state").text("已上传");
//	});
//	
//	// 文件上传失败，显示上传出错。
//	uploader.on( 'uploadError', function( file ) {
//		$( '#'+file.id ).addClass('upload-state-error').find(".state").text("上传出错");
//	});
//	
//	// 完成上传完了，成功或者失败，先删除进度条。
//	uploader.on( 'uploadComplete', function( file ) {
//		$( '#'+file.id ).find('.progress-box').fadeOut();
//	});
//	uploader.on('all', function (type) {
//        if (type === 'startUpload') {
//            state = 'uploading';
//        } else if (type === 'stopUpload') {
//            state = 'paused';
//        } else if (type === 'uploadFinished') {
//            state = 'done';
//        }
//
//      if (state === 'uploading') {
//            $btn.text('暂停上传');
//       } else {
//          $btn.text('开始上传');
//       }
//   });
//
//   $btn.on('click', function () {
//       if (state === 'uploading') {
//           uploader.stop();
//       } else {
//            uploader.upload();
//       }
//    });
//	
//});

function quxiao(){
    
history.back(-1);
    
}


 var ue = UE.getEditor('editor');
  $(function(){
		var ue = UE.getEditor('editor');
		var content=$("#content").text();
		
		ue.ready(function() {//编辑器初始化完成再赋值
			ue.setContent(content);  //赋值给UEditor
		});
		
	})
 
 
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>
@endsection