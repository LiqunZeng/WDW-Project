<?php
require_once 'Controller.php';

require_once 'application/Model/LoginModel.php';
class LoginController extends Controller
{
    public function login(){
        $this->display();
		$this->userLogin();
    }
	public function userLogin(){
		$username = $_POST["username"];
		$password = $_POST["password"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$gender = $_POST["gender"];
		
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
				echo "success!";
			}else{
				echo "username or password incorrect, please try again!";
			}
		}
	}
}
?>

