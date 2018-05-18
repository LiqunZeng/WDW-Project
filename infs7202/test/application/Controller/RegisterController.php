
<?php
require_once 'Controller.php';
require_once "application/Model/RegisterModel.php";

class RegisterController extends Controller
{

	public function UserRegister(){
		$username = $_POST["username"];
		//echo $username;
		$password = $_POST["password"];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$gender = $_POST["gender"];
		
		$RegisterModel = new RegisterModel();
		
		$checkuser = $RegisterModel->check('user_info', 'usernmae', $username);
			//check($table,$one,$id)
			//$sql = "SELECT * FROM $table WHERE $one = '$id'";
		$userJson = json_encode($checkuser);
		$checkExits = strlen($userJson);
		
		//var $user = echo $userJson;
		if($checkExits==0){
			alert("success!");
			$value = $RegisterModel->registerUser($username,$password,$email,$phone,$gender);
			//location.href='?c=index&a=index';
		}else{
			alert("username exists, please try agian OR login");
			//location.href='?c=Login&a=Login';
		}
		
	//	if($checkuser == 0){
	//		$value = $RegisterModel->registerUser($username,$password,$email,$phone,$gender);
	//		//$this->assign("value",$value);
	//	}else{
	//		echo "username exits, please try again.";
	//	}				
	}
	function Register(){
		$this->UserRegister();
		$this->display();
    }
}
?>
