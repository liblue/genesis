<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>搜索结果</title>
	<link rel="stylesheet" type="text/css" href="{{asset('home/css/layout.css')}}">
  
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/style.css')}}">  
     
    <script  src="{{asset('home/js/jquery.js')}}"></script>
    <script  src="{{asset('home/js/main.js')}}"></script>
	</head>
<body>
    <header>  
        <div  id="fhead"  >
            <div  class="container">
                
             <div class="logo">  <a href="{{url('/')}}"><img   src="{{asset('home/img/shouye/logo.png')}}"></a></div>
                 <ul>
                	<li><a href="{{url('/notice')}}"> 公告</a></li>
                	<li><a href="{{url('/share')}}"> 分享</a></li>
                	<li><a  href="{{url('/gyou')}}"> G友</a></li>
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
           
    		
    	
   
    		
   
    	
   
    	
    	
    		
    		<div  class="article">
    	  <ul>
    	  		@foreach($data as $k=>$value)
                        
                        @if($k<12)
    	  	<li>
                   <a href="{{url('/content/'.$value->id)}}"><img  src="{{asset($value->imgurl)}}"  width="270px" height="170px"></a>

                   <a href="{{url('/content/'.$value->id)}}"><p> {{$value->title}}</p></a>
    	  		<div class="info">
                               @if($value->user==null )
                               
                <img class= "biao4" src="{{asset('thumb.jpg')}}"  width="18px" height="18px"  style="border-radius: 50%"><span>   {{$value->admin->name}}   </span>  
                    @else
                 <img class= "biao4" src="{{asset('thumb.jpg')}}"  width="18px" height="18px"  style="border-radius: 50%"><span>   {{$value->user->name}}   </span>  
                @endif
    	  		  <a  class= "tu biao3"><img  src="{{asset('home/img/shouye/comment.png')}}"><span> {{count($value->comment)}}</span></a>
    	  		 <a class= "tu biao2"><img  src="{{asset('home/img/shouye/like.png')}}"><span> {{$value->like}}</span></a>
    	  		
    	  		 <a class= "tu biao1"><img   src="{{asset('home/img/shouye/read.png')}}"><span>{{$value->click}}</span></a>
    	  		</div>
    	  	</li>
                
                @endif
                
                @endforeach
    	  	
    	
    	  		
    	  
    	  	
    	  
    	  	
    	  </ul>
    	  
    	  </div>
    	  
            
            	<div class="clear"></div>
            @if(count($data)>12)
                	<div   id="seemore"><img  src="{{asset('home/img/shouye/seemore.png')}}"></div>
    	  @endif
    		<div id="more_article" class="article">
    	  <ul>
    	  		@foreach($data as $k=>$value)
                        
                        @if($k>12)
    	  	<li>
                   <a href="{{url('/content/'.$value->id)}}"><img  src="{{asset($value->imgurl)}}"  width="270px" height="170px"></a>

                   <a href="{{url('/content/'.$value->id)}}"><p> {{$value->title}}</p></a>
    	  		<div class="info">
                               @if($value->user==null )
                               
                <img class= "biao4" src="{{asset('thumb.jpg')}}"  width="18px" height="18px"  style="border-radius: 50%"><span>   {{$value->admin->name}}   </span>  
                    @else
                 <img class= "biao4" src="{{asset('thumb.jpg')}}"  width="18px" height="18px"  style="border-radius: 50%"><span>   {{$value->user->name}}   </span>  
                @endif
                            
                   
                                                
                                                
                                             
                                            
                                         
    	  		
    	  		  <a  class= "tu biao3"><img  src="{{asset('home/img/shouye/comment.png')}}"><span> {{count($value->comment)}}</span></a>
    	  		 <a class= "tu biao2"><img  src="{{asset('home/img/shouye/like.png')}}"><span> {{$value->like}}</span></a>
    	  		
    	  		 <a class= "tu biao1"><img   src="{{asset('home/img/shouye/read.png')}}"><span>{{$value->click}}</span></a>
    	  		</div>
    	  	</li>
                
                @endif
                
                @endforeach
    	  	
    	
    	  		
    	  
    	  	
    	  
    	  	
    	  </ul>
    	  
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