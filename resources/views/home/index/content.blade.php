<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="{{asset('home/css/layout.css')}}">
  
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/main.css')}}">    
    <script  src="{{asset('home/js/jquery.js')}}"></script>
    <script  src="{{asset('home/js/main.js')}}"></script>
    
        <script src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
	</head>
<body>
    <header>  
        <div  id="fhead"  >
            <div  class="container">
                
            <div class="logo">    <a href="{{url('/')}}"> <img   src="{{asset('home/img/shouye/logo.png')}}"></a></div>
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
                         <input type="hidden" id="login_name" value="{{Session::get('name')}}">
                         <input type="hidden" id="login_nick_name" value="{{Session::get('nick_name')}}">
                         <input type="hidden" id="login_thumb" value="{{asset(Session::get('thumb'))}}">
                        
                         
                         
                	  <img src="{{asset(Session::get('thumb'))}}"  width="40px" height="40px"  style="border-radius: 50px" >
                	   <span  id="username">{{mb_substr(Session::get('nick_name'),0,4)}}/{{mb_substr(Session::get('name'),0,3)}}...
                	  	<span class="bar1"  id="bar1">	
                	  		<a  href="{{url('/user')}}">个人中心</a>
                                        <a  href="{{url('/logout')}}">退出</a>
                	  		</span>                	  	
                	  	
                	  	
                	  </span>
                                         @else
                                        <input type="hidden" id="login_name" value="">
                                        <a  onclick="login()">  <span  id="username">  登录</span></a>
                                         @endif
                </div>
            </div>
        </div>
    </header>
   

    	<div  class="content-box">
      <article>
      	<div  class="head"> 
      		
      		<h2>{{$data->title}}</h2>
               
                
              
      		<p  class="info"> 原作者：
                    @if($data->user==null )
                    {{$data->admin->name}} 
                    @else
                    {{$data->user->name}} 
                @endif
                </p>
      		<p  class="info"> 发布时间 {{$data->created_at}}</p>
                
                
               
                         
                         
      		<p class= "tu biao3"><a  ><img  src="{{asset('home/img/shouye/comment.png')}}"><span>{{$data->plnum}}</span></a></p>
    	    <p class= "tu biao2"> <a ><img  src="{{asset('home/img/shouye/like.png')}}"><span>{{$data->like}}</span></a></p>    	  		
            <p class= "tu biao1"> <a ><img   src="{{asset('home/img/shouye/read.png')}}"><span>{{$data->click}}</span></a></p>       		      	      		
      	</div>
      	
      		<div class="clear"></div>
	   <div  class="content">
               <p  style="text-indent:2em;">
	   		
	   		  {!! substr($data->content,3) !!}    
	   	</p>
	   	
	   	
	   	
	   </div>
	   <div  class="fenye">
	   	
	   	<div class="both">
	   		
	   		
                           <img  src="{{asset('home/img/main/dianzan.png')}}" class="dianzan">
                        
                           <img  src="{{asset('home/img/main/zan.png')}}"  class="zan"  onclick="dianzan(this,{{$data->id}})" >
	   		
	   		
	   	
	   	</div>
	 
	   	
	   </div>
	   <div  class="space"></div>
	   <div  class="reply">
	   	<div  class="replycon">
                    <input  type="text" class="replytext">
                    <button class="reply_submit" onclick="comment(this,{{$data->id}})"></button>
	   	</div>

	   </div>
	   <div  class="comment">
	   	
	   	<ul  id="pinglun">
	   		@foreach($comment as $k=>$v)
	   		 <li>	 
	   			<div class="com_head">
                                    <a  class="user_thumb"><img src="{{asset($v->user->thumb)}}"  width="40px" height="40px" style="border-radius: 50%"/></a>
	   			        <p  class="com_user">{{$v->user->name}}/{{$v->user->nick_name}}
                                            @if(Session::get('user_id')==$v->user_id && $v->is_del=="未删除")
                                            <img src="{{asset('home/img/main/com_del.png')}}"  onclick="delcomment(this,{{$v->id}})">                                            
                                          @endif
                                        </p>
                                        
                                        @if($v->is_del=="未删除")
	   				<p  class="com_con"  >{{$v->content}}</p>
                                        @else
                                        <p  class="com_con"> <img src="{{asset('home/img/main/is_del.jpg')}}"  style="width:30px;height:30px"> 该评论已删除！</p>
                                        @endif
                                        <p class="com_zan"   onclick="com_zan(this,{{$v->id}})">
                                            <img src="{{asset('home/img/main/com_zan.png')}}" />&nbsp;
                                            <label class="oldnum">@if($v->like>0){{$v->like}}@endif</label>
                                          </p>
                                       
	   			        <p  class="com_thumb"  onclick="com_thumb(this)"> <img src="{{asset('home/img/main/com_thumb.png')}}" /></p>
	   			</div>
	   			<ul huifu_ul>
                                  @foreach($v->recomment as  $k1=>$v1 )                                                                                                                             
	   				<li class="huifu">	   						   					
	   			        <p  class="com_user">{{$v1->user->name}}/{{$v1->user->nick_name}}</p>
	   				 <p  class="com_con"  >{{$v1->content}}</p>	   					
	   				</li>                               
                                    @endforeach  	   				
	   			</ul>
	   		      <div class="com_show">
                                  <input class="com_reply"  onclick="shuru(this)" placeholder="回复：{{$v->user->name}}/{{$v->user->nick_name}}" onblur="change_bu_bg(this)">	
	   			 	<button type="submit" class="com_submit"   onclick="recomment(this,{{$v->id}},{{$data->id}})"></button>
	   		      </div>
	   		</li>
	   		@endforeach
	   	</ul>
	   </div>
             <div  class="com_fenye">
                      {{ $comment->links() }}
<!--	   		<ul>
	   				<a><li class="currentpage"><span>1</span></li></a>
	   				<a><li><span>2</span></li></a>
	   			       <a><li class="nextpage"></li></a>
	   		</ul>-->
	   </div>
	  </article>
    	 <aside>
    	 	<div  class="user">
    	 	   @if($data->user==null )
                    <img src="{{asset('thumb.jpg')}}"  width="80px" height="80px" style="border-radius: 50%">
                   <h3>{{$data->admin->name}} </h3>
                    <p>{{$data->admin->type}}</p>
                    @else
                    <img src="{{asset($data->user->thumb)}}"  width="80px" height="80px" style="border-radius: 50%">
                    <h3>{{$data->user->name}} </h3>
                      <p> 职位信息</p>
                    @endif
  
    	 	</div>
    	 	<div  class="hot_art">
    	 		
    	 		热门文章
    	 	</div>
    	 	<ul>
                    
                 @foreach($hot as $k=>$v)
                    @if($k==0)
    	 		<li class="first">    	 			
                            <a href="{{url('/content/'.$v->id)}}">
                                @if(strlen($v->title)>9)
                                {{mb_substr($v->title,0,9)}}...
                                @else                                
                                {{$v->title}}
                                @endif
                            </a>
    	 		</li> 
                        @else
    	 		<li>    	 			
    	 		<a href="{{url('/content/'.$v->id)}}">
                            
                            @if(strlen($v->title)>9)
                                {{mb_substr($v->title,0,9)}}...
                                @else                                
                                {{$v->title}}
                                @endif
                        
                        </a>
    	 		</li>
                        
                        @endif
                        
                        @endforeach
    	 		
    	 	</ul>
    	 	
    	 </aside>
        </div>
        
         <div class="clear"></div>
  <footer>
    	
    	<p>Copyright@2018武汉拓壹互娱网络科技有限公司 内刊管理平台&nbsp;|&nbsp;222222</p>
    </footer>
    	<script>
            //点赞
            function dianzan(obj,id){
                var login_name=$("#login_name").val();   
           if(login_name.length<1){
                login();
          }else{           
               var a='<img  class="zan" src="{{asset('home/img/main/zan1.png')}}"/>';
               var b='<img  class="dianzan" src="{{asset('home/img/main/dianzan1.png')}}"/>';
             $(obj).parent().prepend(b);
             $(obj).parent().prepend(a);
              $(obj).prev(".dianzan").remove();
              $(obj).remove();
             $.post("{{url('/article/like')}}",{'_token':'{{csrf_token()}}','data':id},function(data){
                             
            });  
      
            }
      }     
           //删除评论
            function  delcomment(obj,id){    
            
               alert(id);
               var newhtml='<img src="{{asset('home/img/main/is_del.jpg')}}"  style="width:30px;height:30px"> 该评论已删除！'
               var sansa=$(obj).parent().next();
               sansa.empty();
               sansa.append(newhtml);
               $(obj).remove();
               $.post("{{url('comment/del')}}",{'_token':'{{csrf_token()}}','data':id},function(data){
                            alert(data);
            });  
            }            
            
            function shuru(obj){               
              $(obj).next().css('background','url(../home/img/main/com_submit1.png)');               
            }
            
            function change_bu_bg(obj){
                $(obj).next().css('background','url(../home/img/main/com_submit.png)');  
                
            }
            
            
           
            //二级评论
         function recomment(obj,id,article_id){             
            var  val=$(obj).prev().val();       
            
           
            var login_name=$("#login_name").val();            
            var length=$(obj).parent().prev().children().length;
             
             if(login_name.length<1){  
                 
                 login();
                return false;
            }else if(val.length>0  && val.length<50){      
                var login_nick_name=$("#login_nick_name").val();
                 $(obj).prev().val(' '); 
//                 $(obj).parent().hide();
                var  a='<li class="huifu">'+	   						   					
	   			        '<p  class="com_user">'+login_name+'/'+login_nick_name+'</p>'+
	   				 '<p  class="com_con"  >'+val+'</p>'+	
                                                 '</li>';
	   	$(obj).parent().prev().prepend(a);	
                
                if(length>4){
	      $(obj).parent().prev().children("li:last-child").remove();		
            }
                $.post("{{url('recomment')}}",{'_token':'{{csrf_token()}}','data':val,'parent_id':id,'article_id':article_id},function(data){
                                      
            });  
            
            
            }
    }
            //弹出登录框
        function  login(){               
                layer.open({
                  title: '登录',
                  type: 2,
                 area: ['470px', '300px'],
                  content: ["{{url('/login')}}",'no']                
        });   
            }
            //一级评论
            function comment(obj,id){             
             var  val=$(obj).prev().val();              
             var login_name=$("#login_name").val();                     
             if(login_name.length<1){
                     login();              
            }else if(val.length>1 && val.length<100){
                $(obj).prev().val(" ");           
             var login_nick_name=$("#login_name").val();
             var login_thumb=$("#login_thumb").val();
             
//             alert(login_thumb);
////             $("#pinglun > li").removeClass('first');
//s
             var length=$("#pinglun").children().length;//查看有多少条评论
             $.post("{{url('comment')}}",{'_token':'{{csrf_token()}}','data':val,'article_id':id},function(data){
                        var res=data;  
             var  a='<li>'+
                     '<div class="com_head">'+
                     '<a  class="user_thumb"><img src="'+login_thumb+'" width="40px" height="40px"  style="border-radius:50px" /></a>'+
                     ' <p  class="com_user">'+$("#login_name").val()+'/'+$("#login_nick_name").val()+
                     '<img src="{{asset('home/img/main/com_del.png')}}"  onclick="delcomment(this,'+res+')">'+
                      '</p>'+
                     '<p  class="com_con">'+val+'</p>'+
                     '<p  class="com_zan"  onclick="com_zan(this,'+res+')"  ><img src="{{asset('home/img/main/com_zan.png')}}" /><label class="oldnum"></label></p>'+
                     '<p  class="com_thumb"  onclick="com_thumb(this)"> <img src="{{asset('home/img/main/com_thumb.png')}}" /></p>'+
                     '</div>'+
                     '<ul huifu_ul>'+
                     '</ul>'+
                     '<div class="com_show">'+
                     '<input class="com_reply"  onclick="shuru(this)" placeholder="回复：'+login_name+'/'+login_nick_name+'"  onblur="change_bu_bg(this)">'+
                     '<button type="submit" class="com_submit"  onclick="recomment(this,'+res+',{{$data->id}})"></button>'+
                     '</div></li>';
          
	    $("#pinglun").prepend(a);	
            
            if(length>4){
	    $("#pinglun").children("li:last-child").remove();		
            }
           
          });
        }
      }      
      //点赞
      function com_zan(obj,id){	
//        $oldnum=$(obj).children(":last").val();
       var oldnum=$(obj).children(".oldnum").html();
        $(obj).empty();
       
        newnum=Number(oldnum)+1;
        var  a='<img src="{{asset('home/img/main/com_zan1.png')}}" /> &nbsp; <label class="oldnum">'+newnum+'</label>'
        $(obj).append(a);  
        $.post("{{url('comment/like')}}",{'_token':'{{csrf_token()}}','data':id},function(data){
       });
   }

//显示评论
        function com_thumb(obj){
	 $(obj).empty();

       var divshow=$(obj).parent().parent().children(":last") ;

   	if(divshow.is(':visible')){ 
            var a='<img src="{{asset('home/img/main/com_thumb.png')}}" />';
	    
	    $(obj).append(a)
	    divshow.hide();
	}else{  	
         var a='<img src="{{asset('home/img/main/com_thumb1.png')}}" />';
	 $(obj).append(a);  
	   divshow.show();
}  		 
	 }    
            </script>
    	
    
    
	   	
	   			
	   				
	   			
	   		    
    
</body>
</html>