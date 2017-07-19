
	
<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <title>六喜珠宝欢迎您！</title> 
  
<style type="text/css">
html{   
    width: 100%;   
    height: 100%;   
    overflow: hidden;   
    font-style: sans-serif;   
}   
body{   
    width: 100%;   
    height: 100%;   
    font-family: 'Open Sans',sans-serif;   
    margin: 0;   
    background-color: #4A374A;   
}   
#login{   
    position: absolute;   
    top: 50%;   
    left:50%;   
    margin: -150px 0 0 -150px;   
    width: 300px;   
    height: 300px;   
}   
#login h1{   
    color: #fff;   
    text-shadow:0 0 10px;   
    letter-spacing: 1px;   
    text-align: center;   
}   
h1{   
    font-size: 2em;   
    margin: 0.67em 0;   
}   
input{   
    width: 278px;   
    height: 18px;   
    margin-bottom: 10px;   
    outline: none;   
    padding: 10px;   
    font-size: 13px;   
    color: #fff;   
    text-shadow:1px 1px 1px;   
    border-top: 1px solid #312E3D;   
    border-left: 1px solid #312E3D;   
    border-right: 1px solid #312E3D;   
    border-bottom: 1px solid #56536A;   
    border-radius: 4px;   
    background-color: #2D2D3F;   
}   
.but{   
    width: 300px;   
    min-height: 20px;   
    display: block;   
    background-color: #4a77d4;   
    border: 1px solid #3762bc;   
    color: #fff;   
    padding: 9px 14px;   
    font-size: 15px;   
    line-height: normal;   
    border-radius: 5px;   
    margin: 0;   
}
.info{
    position: absolute;
    color:#000;
    bottom: 10px;
    width: 100%;
    height:30px;
    line-height:30px;
    text-align: center;
}
.msg{
    font-size: 20px;
    text-align: center;
    height:30px;
    width: 278px;
    color: #E74430;
}

</style>
</head>  
<body>  
    <div id="login">  
        <h1>六 喜 之 家</h1>  


         @if(session('msg'))
            <div class="msg">{{session('msg')}}</div>
            @endif
        <form method="post" action="{{asset('login')}}">
        {{csrf_field()}}
            <input type="text" required="required" placeholder="用户名" name="uname"></input>  
            <input type="password" required="required" placeholder="密码" name="upw"></input>  
            <button class="but" type="submit">登录</button>  
        </form>  

    </div> 
<div class="info">本站网址:<a href="http://shuaizi.mylzs.cn">shuaizi.mylzs.cn</a>,湘ICP备17009756号</div>


</body>  
</html>  