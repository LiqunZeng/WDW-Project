<?php
namespace index\Controller;
use Think\Controller;

class RegisterController extends Controller {
    //显示注册页面
    public function reg(){
        $this->display();
    }

    //检查用户的validation
    public function checkUser(){
		$error = false;
		
        $username=$_GET['username'];
        $user=M('User');
        $userInfor['username']=$username;
        $count=$user->where($username)->count();
        if($count){
			$error = true;
			$nameCheck = "username exists.";
            echo 'error';
        }
		else if(empty($username)){
			$error = true;
			$usernameCheck = "username cannot be empty."
			echo 'error';
		}
		else if(!preg_match("/^[a-z\d]*$/i",$username)){
			$error = true;
			$usernameCheck = "username can only be letters and numbers."
			echo 'error'
		}
		else{
			$userPassword = md5(I('password'));
			if(empty($userPassword)){
				$error = true;
				$passwordCheck = "password cannot be empty."
				echo 'please enter your password.'
			}else if (strlen($userPassword)<6){
				$error = true;
				$passwordCheck = "password too short."
				echo 'error'
			}
			
			$userEmail = I('email');	
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				$error = true;
				$emailCheck = "Please enter valid email address.";
				echo 'error'
        }
				
    }
    //注册
    public function register(){
    
        $user=D('User');
        if(!$user->create()){
            $this->error($user->getError());
        }
    
        $lastId=$user->add();
        if($lastId){
            $this->redirect('Index/index');
        }else{
            $this->error('fail register');
        }

    }
}
