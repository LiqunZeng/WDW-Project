
<?php
namespace index\Controller;
use Think\Controller;

class LoginController extends Controller {
    //显示登陆页面
    public function index(){
        $this->display();
    }

    public function login(){
        //接受值
        //判断用户在数据库中是否存在
        //存在 允许登录
        //不存在 显示错误信息
		
		$username=$_POST['username'];//get username
        $password=$_POST['password'];//get password
		
		//username and password cannot be empty
		if(!empty($username)&&!empty($password)){	
			$user=M('User');//实例化模型
			$where['username']=$username;
			$where['password']=$password;
			
			// 执行查询
			$arr=$user->field('id')->where($where)->find();
			//$user->query("select *from users where uname='$username' and pwd='$password'"); 
		}
		
        if($arr){//如果该用户存在
			session_start();
			//将用户名和密码保存在session中
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
			
			//将用户名和密码保存在cookie中
			setcookie($username, $password, time()+3600*24)
		
            $this->success('Success',U('Index/index'));
        
			
		}else{
            $this->error('incorrect username or password, please check.');
        }
    }
}
?>