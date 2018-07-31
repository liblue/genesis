<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>login</title>
<link rel="stylesheet" type="text/css" href="{{asset('admin/login/css/normalize.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('admin/login/css/demo.css')}}" />
<!--必要样式-->
<link rel="stylesheet" type="text/css" href="{{asset('admin/login/css/component.css')}}" />
<!--[if IE]>
<script src="js/html5.js"></script>
<![endif]-->
</head>
<body>
		<div class="container demo-1">
			<div class="content">
				<div id="large-header" class="large-header">
					<canvas id="demo-canvas"></canvas>
					<div class="logo_box">
						<h3>管理员登录</h3>
							<form class="form form-horizontal" action="{{url('ad_login')}}" method="post">
                                                                 {{ csrf_field() }}
							<div class="input_outer">
								<span class="u_user"></span>
								<input name="account_num" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账号">
							</div>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input name="password" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
                                                            
                                                               
                                                             
                                                              
							</div>
                                                                  @if(Session::get('msg')=="密码错误")
                                                                   <span style="text-align: center;display:block;color: red;font-size: 12px;">*账号或密码错误</span>
                                                                     @endif
                                                                      @if(Session::get('msg')=="账号不存在")
                                                                   <span style="text-align: center;display:block;color: red;font-size: 12px;">*账号不存在</span>
                                                                     @endif
                                                                   <input type="submit"  id="tijiao"  style="display:none">
                                                                   <lable  style="display:none;color: red;"  id='tishi'>dslkjfl</lable>
                                                                   <div class="mb2"><a class="act-but submit"  href="javascript::" style="color: #FFFFFF"  onclick="login()">登录</a></div>
						</form>
					</div>
				</div>
			</div>
		</div><!-- /container -->
                <script type="text/javascript" src="{{asset('admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
		<script src="{{asset('admin/login/js/TweenLite.min.js')}}"></script>
		<script src="{{asset('admin/login/js/EasePack.min.js')}}"></script>
		<script src="{{asset('admin/login/js/rAF.js')}}"></script>
		<script src="{{asset('admin/login/js/demo-1.js')}}"></script>
                
<!--                @if( Session::get('msg')=="密码错误")
<script type="text/javascript">   
alert('密码错误', {icon: 2}); 
</script>
@endif-->


                <script  type="text/javascript">
                    
                function login(){
                    $("#tijiao").trigger('click');
                }
                
                
                    </script>

	</body>
</html>