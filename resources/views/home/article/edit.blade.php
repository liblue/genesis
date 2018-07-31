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

	</head>
<body>
    <header>  
        <div  id="fhead">
            <div  class="container">
                
               <div class="logo"><img   src="{{asset('home/img/shouye/logo.png')}}"></div>
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
                        
                	 <img src="{{asset('home/img/shouye/touxiang.png')}}" >   
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
    	 		
    	 		<img src="{{asset('home/img/main/author.png')}}">
    	 		
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
    	 			<a><p class="leftp"></p><p  class="rightp">个人中心</p></a>
    	 		</li>
    	 		<li class="menu">    	 			
                            <a  href={{url('article')}}><p class="leftpt" ></p><p class="rightp">我的文章</p></a>
    	 		</li>
    	 		<li class="menu">    	 			
    	 			<a><p class="leftp"></p><p class="rightp">我的消息</p></a>
    	 		</li>
    	 	</ul>
    			
    		</aside>

    	  	<div  class="userinfo user">
    	  		<div class="myart">
    	  			<p id="userinfo_head1">编辑文章</p>
    	  			
    	  		</div>
    	  	
    	<div  id="block1">
    	  	
    	  		
    	  		    <form  action="{{url('article/set')}}"  method="post">	
    	  	   
                                <p class="infohead"> <button type="submit"></button></p>
                                <input type="hidden" value="{{$article->id}}"  name="id">
                                
    	  	<fieldset>
    	  		 <div class="form-group">
                    <label>标题</label>
                    <div class="input">
                        <input type="text" name="title" lay-verify="title" value="{{$article->title}}" autocomplete="off" placeholder="" class="layui-input">     
       </div>
                </div>	     	  		
    	  	     <div class="form-group">
                    <label>类型</label>
        
                
                  <select name="type" class="layui-input" style="">
                      
                      @if($article->type=="分享")
                      
                      <option value="分享" selected>分享</option>
                    <option value="G友">G友</option>
                    @else
                    <option value="分享">分享</option>
                    <option value="G友"  selected>G友</option>
                    @endif
                    </select>
                </div>
    	  		
                
                <div class="form-group" style="height: auto;">
                   <div  style="display: none"><textarea id="content">{{$article->content}}</textarea></div>
                   <script id="editor" type="text/plain" style="height:400px;width:870px;margin-top: 50px;"  ></script> 
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
    
   <script>
   	
   	
   	 var ue = UE.getEditor('editor');        
          $(function(){
		var ue = UE.getEditor('editor');
		var content=$("#content").text();
		
		ue.ready(function() {//编辑器初始化完成再赋值
			ue.setContent(content);  //赋值给UEditor
		});
		
	})
        
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