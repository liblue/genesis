<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>用户-个人信息</title>
	<link rel="stylesheet" type="text/css" href="{{asset('home/css/layout.css')}}">
  
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/style.css')}}">    
     
    <script  src="{{asset('home/js/jquery.js')}}"></script>
    <script  src="{{asset('home/js/main.js')}}"></script>
      <script src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
    
    <style type="text/css">
        
        #checkcellphone,#checkname,#checknick_name,#checkpassword,#checkpassword1,#checkpassword2{
            display:none;
        }
        
        
    </style>
	</head>
<body>
    <header>  
        <div  id="fhead"  >
            <div  class="container">
                
               <div class="logo"><a href="{{url('/')}}"><img   src="{{asset('home/img/shouye/logo.png')}}"></a></div>
                 <ul>
                	<li><a  href="{{url('/notice')}}"> 公告</a></li>               
                	<li><a href="{{url('/share')}}"> 分享</a></li>
                	<li><a href="{{url('/gyou')}}"> G友</a></li>
                </ul>
                
                  <div  class="info">
                	 <p>
                	 <input type="text"  placeholder="请输入要查找的信息" id="invalue"> 
                	 <img src="{{asset('home/img/shouye/search.png')}}" id="search"> 
                	</p>
                        
                        @if(Session::get('user_id'))
                       
                      <img src="{{asset(Session::get('thumb'))}}"  width="40px" height="40px"  style="border-radius: 50px" >
                      
                    
                	   <span  id="username">{{mb_substr(Session::get('nick_name'),0,4)}}/{{mb_substr(Session::get('name'),0,3)}}...
                	  	<span class="bar1"  id="bar1">	
                                    
                	  		<a  href="{{url('/user')}}">个人中心</a>
                                        <a  href="{{url('/logout')}}">退出</a>
                	  		</span>                	  	
                	  	
                	  	
                	  </span>                      
                                         @else
                                       <a onclick="login()">  <span  id="username">  登录</span></a>
                                         @endif
                </div>
            </div>
        </div>
    </header>
   
   
    	<div  class="content-box">
    		
    		<aside>
    			
    			<div  class="user">
    	 		
    	 		<img src="{{asset(Session::get('thumb'))}}"  width="80px" height="80px"  style="border-radius: 50px" >
    	 		
    	 		<h3>{{mb_substr(Session::get('nick_name'),0,4)}}/{{mb_substr(Session::get('name'),0,3)}}</h3>
    	 		<p>   	 			
    	 			{{$user->role->name}}
    	 		</p>
    	 		
    	 		<p class="edit"><a  href="{{url('article/create')}}"><img src="{{asset('home/img/user/edit.png')}}"></a></p>
    	 	</div>
    	 	<div class="clear"></div>
    	 	<div class="jiange"></div>
    	 	<ul>
    	 		<li class="menu">    	 			
    	 			<a  href="{{url('user')}}"><p class="leftp current"></p><p  class="rightp">个人中心</p></a>
    	 		</li>
    	 		<li class="menu">    	 			
    	 			<a  href="{{url('article')}}"><p class="leftp" ></p><p class="rightp">我的文章</p></a>
    	 		</li>
    	 		<li class="menu">    	 			
    	 			<a  href="{{url('user/news')}}"><p class="leftp"></p><p class="rightp">我的消息</p></a>
    	 		</li>
    	 	</ul>
    			
    		</aside>

    	  	<div  class="userinfo user">
    	  		<div class="myart">
    	  			<p class="currenthead" id="userinfo_head1">个人资料</p>
    	  			<p id="userinfo_head2" >修改密码</p>
    	  		</div>
                    <form  action="{{url('user/set')}}" method="post"  onsubmit="return confirm()">
                            
                            {{csrf_field()}}
    	                <div  id="block1">
    	  		<div class="thumb">    	  			
                            <img src="{{asset($user->thumb)}}" style="width:120px;height:120px;border-radius: 60px;"  onclick="thumb()">
    	             
    	  		</div>
    	  		<div class="thumbinfo">    	  			
    	  			<p>点击头像编辑</p>
    	  			<p>（上传格式仅为JPEG、PNG格式：  800KB以内）</p>
    	  		</div> 
    	  		
    	  			
    	  	   
    	  		<p class="infohead"> <span>基本信息</span>   <button type="submit"></button></p>
    	  		
    	 
    	  	<fieldset>
    	  		 <div class="form-group">
                    <label>姓名</label>
                    <div class="input">
                        <input type="text" name="name" lay-verify="title" value="{{$user->name}}" id="name" autocomplete="off" placeholder="请输入姓名" class="layui-input"><span id="checkname">*请输入小于7位的汉字</span>
       </div>
                </div>	  
                     <div class="form-group">
                    <label>昵称</label>
                    <div class="input">
                        <input type="text" name="nick_name" lay-verify="title" value="{{$user->nick_name}}" id="nick_name" autocomplete="off" placeholder="请输入昵称" class="layui-input"><span id="checknick_name">*请输入小于7位的字符</span>
       </div>
                </div>	  
    	  	    
    	  		<div class="form-group">
                    <label>性别</label>
                    
                   @if($user->gender=="男")
                    <p>男</p>
                    
                   @else
                     <p>女</p>
                   @endif
                </div>
                
                <div class="form-group">
                    <label>手机号</label>
                    <input type="text" name="cellphone" id="cellphone"  placeholder="请输入手机号"  value="{{$user->cellphone}}" class="form-control"/><span id="checkcellphone">*格式错误</span>
                </div>            
               <div  class="fenge"></div>                            
                <p class="infohead"> <span>部门职位</span></p>
    	  		 <div class="form-group">
                    <label>账号</label>
                    <div class="input">
                        <p>{{$user->account_num}}</p>
                        </div>
                </div>	     	  		
    	  	    
                <div class="form-group">
                    <label>所属部门</label>
                    <p>{{$user->department->name}}</p>
                </div>
                <div  class="fenge"></div>                            
                <p class="infohead"> <span>角色属性</span></p>
    	  		 <div class="form-group">
                    <label>角色</label>
                    <div class="input">
              <p>{{$user->role->name}}</p>
               </div>
                </div>	     	  		
    	  	   
    	  		
                
                <div class="form-group">
                    <label>积分</label>
                    <p>{{$user->grade}}</p>
                </div>
                </fieldset>
    	  		
    	  		</div>
    	  		</form>	
    	  		<!--block2-->
    	  		<div  id="block2">
    	  		
    	  		
    	  			
    	  	    <form  action="{{url('user/setpsw')}}" method="post"  onsubmit="return yanzheng()">
    	           <p class="infohead"> <span>基本信息</span>  <button type="submit"></button></p>
    	  		
            
    	  	<fieldset>
    	  		 <div class="form-group">
                    <label>原始密码</label>
                    <div class="input">
       <input type="password" name="password" lay-verify="name" autocomplete="off" placeholder="请输入原密码" id="password" class="layui-input"><span id="checkpassword">*原密码为必填项</span>
       </div>
                </div>	   

                    
    	  	     <div class="form-group">
                    <label>新密码</label>
                    <input type="password" name="password1" placeholder="请输入密码"  id="password1" class="form-control"/><span id="checkpassword1">*请输入6到16位的字符,包括至少1个字母，1个数字，1个特殊字符</span>
                </div>
                    
                    
                    
                <div class="form-group">
                    <label>重复密码</label>
                    <input type="password" name="password2" placeholder="请输入密码"  id="password2" class="form-control"/><span id="checkpassword2">*两次密码输入不一致</span>
                </div>
    	  		
               	  		
    	  	   
    	  		
              
                </fieldset>
    	  		</form>
    	  		</div>
    	  		
  
    	  	</div>

    	
        </div>   
        
        <div class="clear"></div>
  <footer>
    	
    	<p>Copyright@2018武汉拓壹互娱网络科技有限公司 内刊管理平台&nbsp;|&nbsp;222222</p>
    </footer>
         <script src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
        @if(Session::get('msg')=="修改成功")
    <script>   
        layer.msg('修改成功', {icon: 1,time:1000});
    </script>
    @endif
       @if(Session::get('msg')=="原密码错误")
    <script>   
        layer.msg('密码错误', {icon: 2,time:1000});
    </script>
    @endif
   
   <script>
      function  confirm(){
          
       
     if($("#name").val() === "" || $("#name").val().length >4){
     $("#checkname").show();
     return false;
     }else{
     $("#checkname").hide();
      }
      if(funcChina($("#name").val())==="2"){
       $("#checkname").show();
      return false;       
  }else{
       $("#checkname").hide(); 
  }
      if($("#nick_name").val() === "" || $("#nick_name").val().length >7){
     $("#checknick_name").show();
     return false;
     }else {
    $("#checknick_name").hide();
     } 
     
     if(checkphone($("#cellphone").val())==="2"){
      $("#checkcellphone").show();
     return false;  
  }else {
    $("#checkcellphone").hide();
  }
      
          return true;
    
      }
      
      function yanzheng(){
          
          
       
             if($("#password").val() === ""){
     $("#checkpassword").show();
     return false;
  }else {
 $("#checkpassword").hide();
  }
         
          
          
       if($("#password1").val() === "" || $("#password1").val().length < 6){
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
         
           
if($("#password2").val() !== $("#password1").val()){
      $("#checkpassword2").show();
     return false;
  }else {
  $("#checkpassword2").hide();
  }
         
      return true;
          
  }
      function funcChina(name)
     {     
     var reg=/^[\u2E80-\u9FFF]+$/;
     if (reg.test(name)){
        return "3" ;
    }
       return "2"; 
   }
   
   
  function checkphone(phone)
     {     
     var reg=/(^1[3|4|5|7|8]\d{9}$)|(^09\d{8}$)/;
     if (reg.test(phone)){
        return "3" ;
    }
       return "2"; 
   } 

   
function checkPw(password){
//    var  reg = /^[A-Za-z0-9]{6,20}$/;

 var  reg=new RegExp('(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9]).{6,16}');
    if (reg.test(password)){
         return "3" ;
    }
     return "2"; 
}
    function  login(){               
                layer.open({
                  title: '登录',
                  type: 2,
                  area: ['470px', '300px'],
                  content: ["{{url('/login')}}",'no'],                 
        });   
            }
    function  thumb(){      
                layer.open({
                  title: '头像设置',
                  type: 2,
                  area: ['570px', '600px'],
                  content: ["{{url('/user/thumb')}}",'no']               
        });   
            }
       
       </script>
    
</body>
</html>