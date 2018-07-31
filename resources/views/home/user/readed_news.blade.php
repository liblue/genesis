<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>用户-消息</title>
	<link rel="stylesheet" type="text/css" href="{{asset('home/css/layout.css')}}">
  
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/style.css')}}">  
    
    <script  src="{{asset('home/js/jquery.js')}}"></script>
    <script  src="{{asset('home/js/main.js')}}"></script>
	</head>
	</head>
<body>
    <header>  
        <div  id="fhead">
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
    	 			
    	 			职位信息
    	 		</p>
    	 		
    	 		<p class="edit"><a  href="{{url('article/create')}}"><img src="{{asset('home/img/user/edit.png')}}"></a></p>
    	 	</div>
    	 	<div class="clear"></div>
    	 	<div class="jiange"></div>
    	 	<ul>
    	 		<li class="menu">    	 			
    	 			<a  href="{{url('user')}}"><p class="leftp"></p><p  class="rightp">个人中心</p></a>
    	 		</li>
    	 		<li class="menu">    	 			
    	 			<a  href="{{url('article')}}"><p class="leftp" ></p><p class="rightp">我的文章</p></a>
    	 		</li>
    	 		<li class="menu">    	 			
    	 			<a  href="{{url('user/news')}}"><p class="leftp current"></p><p class="rightp">我的消息</p></a>
    	 		</li>
    	 	</ul>
    			
    		</aside>

    	  	<div  class="userinfo  news">
    	  		
    	  		
    	  		
    	  		<div class="myart">
                            <a href="{{url('user/news')}}"><p id="userinfo_head2" >未读消息</p></a>
                                
                             <p id="userinfo_head2" class="currenthead">全部消息</p>
    	  		</div>
    	  	
    	  		
    	  	 <div  class="comment">
	   	
	   	<ul>
	   		
	   		
	   		@foreach($news as $k=>$value)
                        
                        @if($k==0)
	   		<li class="first">	 
                            @else
                        <li>
                            @endif
	   			<div class="com_head">
                                    <a  class="user_thumb"><img src="{{asset($value->user->thumb)}}" width="40px" height="40px"  style="border-radius: 50px" /></a>
	   			        <p  class="com_user">{{$value->user->nick_name}}/{{$value->user->name}} <a href="{{url('/content/'.$value->article_id)}}">查看</a></p>


                                         @if($value->content)
	   				<p  class="com_con"  >{{$value->content}}</p>
                                          @else
                                         <p  class="com_con"  >赞了 《{{$value->article->title}}》</p>
                                        @endif
	   			</div>
	   		</li>
                        
                       @endforeach 
	   	
	   	      <div  class="news_fenye">
                           
                          
                      {{ $news->links() }}
                        
                      
                      </div>	
	   		
	   		
	   	    
	   	
	   	</ul>
	   	
	   </div>
    
                
                
             
    	  		
    	  			
    	  			
    	
    	
    	  		
    	  		
    	  	</div>

    	
        </div>   
        
        <div class="clear"></div>
  <footer>
    	
    	<p>Copyright@2018武汉拓壹互娱网络科技有限公司 内刊管理平台&nbsp;|&nbsp;222222</p>
    </footer>
   <script src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
   <script>
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