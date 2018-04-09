<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <title>注册</title>
        <load href="__PUBLIC__/Css/Home/reg.css" />
        <load href="__PUBLIC__/Js/jquery.js"/>
        <load href="__PUBLIC__/Css/basic.css" />
        
        <script>
            $(function(){
                var error=new Array();
                $('input[name="username"]').blur(function(){
                    var username=$(this).val();
                    $.get('__URL__/checkName',{'username':username},function(data){
                        if(data=='不允许'){
                            error['username']=1;
                            $('input[name="username"]').after('<p id="umessage" style="color:red">该用户名已经注册</p>');
                        }else{
                            error['username']=0;
                            $('#umessage').remove();
                        }
                    });
                });

                //提交表单
                $('img.register').click(function(){
                    if(error['username']==1){
                        return false;
                    }else{
                        $('form[name="myForm"]').submit();
                    }
                });
            });
        </script>
    </head>
    <body>
        <form action='__URL__/doReg' method='post' name='myForm'>
            Userame：<input type='text' name='username'/><br/>
            Password：<input type='password' name='password'/><br/>
            Comfirm Password：<input type='password' name='repassword'/><br/>
            
            verification:<input type='text' name='code'/>
                       <img src='__MODULE__/Public/code' onclick="this.src=this.src+'?'+Math.random()"/>
                      <br/>
            <img src='__PUBLIC__/Images/register.gif' class='register'/>
            <img src='__PUBLIC__/Images/reset.gif' class='reset'/>
        </form>
    </body>
</html>