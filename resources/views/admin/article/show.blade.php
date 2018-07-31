
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="favicon.ico" >
<link rel="Shortcut Icon" href="favicon.ico" />

<script type="text/javascript" src="{{asset('admin/lib/jquery/1.9.1/jquery.min.js')}}"></script> 

<title>content</title>
<meta name="keywords" content="">
<meta name="description" content="">

<style>
    #main{
        
         width:50%;
         margin:0 auto;
    }
    article{
        
        text-align: center
    }
    
    
</style>
</head>
    <body>
        <div id="main">
            
            <article>
                <h2>{{$data->title}}</h2>
            {!! $data->content !!}     
                
            </article>
       
        </div>
  
    
    
    
<script type="text/javascript">
   
        


        
  

    </script>
    
 </body>    
    
    
</html>
