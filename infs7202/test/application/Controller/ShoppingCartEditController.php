
<?php
require_once 'Controller.php';
require_once "application/Model/RegisterModel.php";

class ShoppingCartEditController extends Controller
{

	/*public function UserRegister($username, $password, $email,$phone,$gender){
		//$username = $_POST["username"];
		//$password = $_POST["password"];
		//$email = $_POST["email"];
		//$phone = $_POST["phone"];
		//$gender = $_POST["gender"];
		
		$RegisterModel = new RegisterModel();
		
		$checkuser = $RegisterModel->search('user_info', 'usernmae', $username);
		$checkExits = sizeof($userJson);
		//echo '1';
		//var $user = echo $userJson;
		if($checkExits==0){
			$value = $RegisterModel->add('user_info', 'username, password, email, phone, gender', $username,$password,$email,$phone,$gender);
			echo $value;
			//location.href='?c=index&a=index';
		}else{
			echo "username exists, please try agian OR login";
			//location.href='?c=Login&a=Login';
		}	
	}*/
	public function ShoppingCartEdit(){

		$this->display();
		//$this->UserRegister();
    }
}
?>
