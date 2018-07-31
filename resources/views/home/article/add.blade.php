<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>用户-文章添加</title>
		<link rel="stylesheet" type="text/css" href="{{asset('home/css/layout.css')}}">
  
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/style.css')}}">    
    <script  src="{{asset('home/js/jquery.js')}}"></script>
    <script  src="{{asset('home/js/main.js')}}"></script>
     <script src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/lib/ueditor/1.4.3/ueditor.config.js')}}"></script> 
<script type="text/javascript" src="{{asset('admin/lib/ueditor/1.4.3/ueditor.all.min.js')}}"> </script> 
<script type="text/javascript" src="{{asset('admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js')}}"></script>
<style type="text/css">
        
        #checktitle,#checkcontent{
            display:none;
        }
        
        
    </style>
	</head>
<body>
    <header>  
        <div  id="fhead">
            <div  class="container">
                
                <div class="logo">   <a href="{{url('/')}}"> <img   src="{{asset('home/img/shouye/logo.png')}}"></a></div>
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
                                         <a   onclick="login()">  <span  id="username">  登录</span></a>
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
    	 		
    	 		<p class="edit"><a><img src="{{asset('home/img/user/edit.png')}}"></a></p>
    	 	</div>
    	 	<div class="clear"></div>
    	 	<div class="jiange"></div>
    	 	<ul>
    	 		<li class="menu">    	 			
    	 			<a href="{{url('user')}}"><p class="leftp"></p><p  class="rightp">个人中心</p></a>
    	 		</li>
    	 		<li class="menu">    	 			
                            <a  href="{{url('article')}}"><p class="leftp" ></p><p class="rightp">我的文章</p></a>
    	 		</li>
    	 		<li class="menu">    	 			
    	 		    <a   href="{{url('user/news')}}"><p class="leftp"></p><p class="rightp">我的消息</p></a>
    	 		</li>
    	 	</ul>
    			
    		</aside>

    	  	<div  class="userinfo user">
    	  		<div class="myart">
    	  			<p id="userinfo_head1">添加文章</p>
    	  			
    	  		</div>
    	  	
    	<div  id="block1">
    	  	
    	  		
            <form  action="{{url('article')}}"  method="post"  onsubmit="return confirm()">	
    	  	   
                                <p class="infohead"> <button type="submit"  class="fabu"></button></p>
    	  		
                                
    	  	<fieldset>
    	  		 <div class="form-group">
                    <label>标题</label>
                    <div class="input">
                        <input type="text" name="title" lay-verify="title" autocomplete="off"  id="title" placeholder="请输入标题" class="layui-input"><span id="checktitle">*请输入小于20位的标题</span>
                    </div>
                </div>	     	  		
    	  	     <div class="form-group">
                    <label>类型</label>
        
              
                <select name="type" class="layui-input" style="" >
                    <option value="分享">分享</option>
                    <option value="G友">G友</option>
                    </select>
                </div>
                    <div class="form-group"  style="height:800px;width: 870px">
                    <label>文章内容</label><span id="checkcontent">*文章内容不能为空</span>
                     <script id="editor" type="text/plain" style="height:600px;width:780px;float:right;margin-top:16px"  ></script> 
                </div>	  
                
                <div class="form-group" style="height: auto;">
                  
                  
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
    	@if(Session::get('msg'))
              <script>
            alert.msg("添加成功");
            </script>
        @endif
   	
   <script>
   
     function  confirm(){
         if($("#title").val()=='' ||$("#title").val().length>20 )
         { 
         $("#checktitle").show();
         return false; 
         }else{
         $("#checktitle").hide(); 
         }
         
         if($("#editor").val()=='')
         {
             $("#checkcontent").show();
         return false; 
         }else{
           $("#checkcontent").hide();   
             
         }
         return true;
     }
   	 var ue = UE.getEditor('editor');
         
                 function  login(){               
                layer.open({
                  title: '登录',
                  type: 2,
                  area: ['470px', '300px'],
                  content: ["{{url('/login')}}",'no'],                 
        });   
            }
   </script>
    
</body>
</html>