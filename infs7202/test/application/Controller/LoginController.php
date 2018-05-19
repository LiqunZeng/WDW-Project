<?php
require_once 'Controller.php';

require_once 'application/Model/LoginModel.php';
require_once 'application/Model/UserModel.php';


class LoginController extends Controller
{	
    public function login(){
        $this->display();
		$this->userLogin();
    }
	
	function userlogin($username, $password){

			//1.check user	
		$LoginModel = new LoginModel();
		
		$checkuser = $LoginModel->search('user_info', 'usernmae', $username);
		//$userJson = json_encode($checkuser);
		//$checkEx = strlen($userJson);
		if($checkuser == 0){
			echo "username does not exits, please check your username or register a new account.";
		}else{

			$checkpass = $LoginModel->checkPassword('user_info',$username,$password);
			echo $checkpass;
			if ($checkpass != null){
				
				//if user and password are correct: session_start()
				session_start();
				$user = new UserModel($username);
				$_SESSION['user'] = $user;
				
				return true;
				echo "success!";
			}else{
				return false;
				echo "username or password incorrect, please try again!";
			}
		}		
	}
	function userLogout(){
		session_start();
		session_destroy();
	}
}
?>

