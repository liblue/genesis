<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>用户-我的文章</title>
	<link rel="stylesheet" type="text/css" href="{{asset('home/css/layout.css')}}">
  
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/style.css')}}">    
    <script  src="{{asset('home/js/jquery.js')}}"></script>
    <script  src="{{asset('home/js/main.js')}}"></script>	
    <script src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
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
                                        <a onclick="login()">  <span  id="username">  登录</span></a>
                                         @endif
                </div>
            </div>
        </div>
    </header>
    
    
   
    	<div  class="content-box">
    		
    		<aside>
    			
                    <div  class="user" >
                            
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
    	 			<a  href="{{url('user')}}"><p class="leftp"></p><p  class="rightp">个人中心</p></a>
    	 		</li>
    	 		<li class="menu">    	 			
    	 			<a  href="{{url('article')}}"><p class="leftp current" ></p><p class="rightp">我的文章</p></a>
    	 		</li>
    	 		<li class="menu">    	 			
    	 			<a  href="{{url('user/news')}}"><p class="leftp"></p><p class="rightp">我的消息</p></a>
    	 		</li>
    	 	</ul>
    			
    		</aside>

    	  	<div  class="article user"  style="min-height: 660px">
    	  		<div class="myart"><p>我的文章</p></div>
    	  		  <ul>
                              
                              @foreach($data as $k=>$value)
    	  		<li>
                           <a href="{{url('/content/'.$value->id)}}"><img  src="{{asset($value->imgurl)}}"  style="width:270px;height: 170px"></a>

    	  		<a href="{{url('/content/'.$value->id)}}"><p> {{$value->title}}</p>
    	  		<div class="info">
    	  			<a class="art edit"  href="{{url('article/'.$value->id.'/edit')}}">编辑</a>
    	  			<a class="art del"  onclick="del(this,{{$value->id}})">删除</a>
    	  		<!--<img class= "biao4" src="img/shouye/author.png"><span>用户名称</span>  -->
    	  		
    	  	  <a  class= "tu biao3"><img  src="{{asset('home/img/shouye/comment.png')}}"><span> {{count($value->comment)}}</span></a>
    	  		 <a class= "tu biao2"><img  src="{{asset('home/img/shouye/like.png')}}"><span> {{$value->like}}</span></a>
    	  		
    	  		 <a class= "tu biao1"><img   src="{{asset('home/img/shouye/read.png')}}"><span>{{$value->click}}</span></a>
    	  		</div>
    	  	</li>
                
                @endforeach
    	
    	  		  </ul>
                        <div class="clear"></div>
                         <div  class="userart_fenye">
                           
                          
                         {{ $data->links() }}
                        
                      
                      </div>	
                        
                        
    	  	</div>

    	
        </div>   
        
        <div class="clear"></div>
  <footer>
    	
    	<p>Copyright@2018武汉拓壹互娱网络科技有限公司 内刊管理平台&nbsp;|&nbsp;222222</p>
    </footer>


	<script>
		        //弹出登录框
        function  login(){               
                layer.open({
                  title: '登录',
                  type: 2,
                  area: ['360px', '500px'],
                  content: ["{{url('/login')}}",'no'],                 
        });   
            }
	function del(obj,id){
			
    layer.confirm('确定删除此文章？', {
       btn: ['确定','取消'] //按钮
      }, function(){
      	
     $(obj).parent().parent().remove();
      	
      	//后台代码
     layer.msg('已删除', {icon: 1,time:1000});
     
       $.post("{{url('article/delete')}}",{'_token':'{{csrf_token()}}','data':id},function(data){
                                      
            });  
     
      });
			
		}

</script>

   
    
</body>
</html>