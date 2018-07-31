<html>
    
    <head>
     <meta charset="UTF-8">
	<title>登录</title>

    <script  src="{{asset('home/js/jquery.js')}}"></script>
    <script  src="{{asset('home/js/main.js')}}"></script>	
     <script src="{{asset('admin/lib/layer/2.4/layer.js')}}"></script>
     
     <link rel="stylesheet" type="text/css" href="{{asset('home/css/style.css')}}"> 

	</head>
    
    <body>
        
        <div  class="login">
           
            
            
             <div class="login_form-group">
                    <div class="input">
                        <input  type="text"  name="account_num"   id="account_num"  onfocus="shuru(this)"  onblur="leave(this)" placeholder="请输入员工号码" >
                    </div>
            </div>	     
            <div class="login_form-group">
                    <div class="input">
                        <input type="password"  name="password" id="password" placeholder="请输入密码" onfocus="shuru(this)" onblur="leave(this)">
                    </div>
            </div>	  
        
          <div class="login_form-group">
                    <div class="button">
                        <input   type="button"  onclick="tijiao()"  id="button">
                    </div>
            </div>
                                          
              <div class="login_form-group">
                    <div class="span">
                        <sapn  id="error_psw">*密码错误,请重新输入</sapn>
                        <sapn  id="error_user">*用户不存在</sapn>
                    </div>
            </div>
                     
      
       </div>
        

              
    
    
       
    <script>
        
        
            function tijiao(){      
              $("#error_user").hide();
              $("#error_psw").hide();
              var account_num=$("#account_num").val();              
              var password=$("#password").val();
              if(account_num.length>0 && password.length>0){           
               $.post("{{url('/user_login')}}",{'_token':'{{csrf_token()}}','account_num':account_num,'password':password},function(data){
                   
                
                 if(data==="查无此人"){
                     $("#error_user").show();
                     
                     
                 }else  if(data==="密码错误"){
                      $("#error_psw").show();
                     
                 }else{
                 layer.close(layer.index);
                 window.parent.location.reload();   
             }          
            }); 
    }
        }
        
          function  shuru(obj){
            
          $(obj).css("background","url(../home/img/main/login_input_bg1.png)");
          $("#button").css("background","url(../home/img/main/login_button1.png)");
          }
          
          function leave(obj){
            $(obj).css("background","url(../home/img/main/login_input_bg.png)");           
          }
        
       
            </script>
    </body>
</html>

