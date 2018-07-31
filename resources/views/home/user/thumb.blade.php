<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="{{asset('home/thumb/css/style.css')}}" type="text/css" />

</head>
<body>
  
<script type="text/javascript" src="{{asset('home/thumb/js/jquery-1.11.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('home/thumb/js/cropbox.js')}}"></script>

<div class="container">
    <div class="imageBox" style="{{asset('thumb.jpg')}}}">
        <div class="thumbBox"> </div>
        <div class="spinner" style="display: none">  
        Loading...</div>
    </div>
	
    <div class="action">
        <input type="file" id="file" style="float:left; width: 250px"  onchange="fileChange(this)">
        <input type="button" id="btnCrop" value="确定" style="float: right" class="button1">
        <input type="button" id="btnZoomIn" value="+" style="float: right">
        <input type="button" id="btnZoomOut" value="-" style="float: right">
    </div>
	

	
</div>
<script src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript">
    function fileChange(target) {
      var fileSize = 0;
      fileSize = target.files[0].size;
      var size = fileSize / 1024;
      if(size>1000){
         layer.alert("附件不能大于800k");
         target.value="";
         return false;   //阻止submit提交
      }
      var name=target.value;
      var fileName = name.substring(name.lastIndexOf(".")+1).toLowerCase();
      if(fileName !="jpg" && fileName !="jpeg" && fileName !="png"){
         layer.alert("请选择图片格式文件上传(jpg,png)！");
         target.value="";
         return false;   //阻止submit提交
      }
    }
    
$(window).load(function() {
	var options =
	{
		thumbBox: '.thumbBox',
		spinner: '.spinner',
		imgSrc: 'images/avatar.png'
	}
	var cropper = $('.imageBox').cropbox(options);
	$('#file').on('change', function(){
		var reader = new FileReader();
		reader.onload = function(e) {
			options.imgSrc = e.target.result;
			cropper = $('.imageBox').cropbox(options);
		}
		reader.readAsDataURL(this.files[0]);
		this.files = [];
	})
	$('#btnCrop').on('click', function(){
		var img = cropper.getDataURL();
		
                 $.post("{{url('/user/move_thumb')}}",{'_token':'{{csrf_token()}}','data':img},function(data){
                layer.close(layer.index);
                window.parent.location.reload();       
    });
	})
	$('#btnZoomIn').on('click', function(){
		cropper.zoomIn();
	})
	$('#btnZoomOut').on('click', function(){
		cropper.zoomOut();
	})
});
</script>

</body>
</html>