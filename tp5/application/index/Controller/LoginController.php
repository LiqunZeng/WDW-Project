
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
        $username=$_POST['username'];
        $password=$_POST['password'];

        $user=M('User');
        $where['username']=$username;
        $where['password']=$password;
        $arr=$user->field('id')->where($where)->find();
        if($arr){
            $_SESSION['username']=$username;
            $_SESSION['id']=$arr['id'];
            $this->success('Success',U('Index/index'));
        
			setcookie($username, $password, time()+3600*24)
		
		}else{
            $this->error('incorrect username or password, please check.');
        }
    }
}
?>