<?php
require_once 'Controller.php';

require_once 'application/Model/LoginModel.php';
require_once 'application/Model/UserModel.php';


class LoginController extends Controller
{	
    public function login(){
        $this->display();
		  //<?php
//原本的login.php, 亲测能用
$name=$_POST['username'];
$password=$_POST['password'];
$passwordJson = json_encode($password);

$dbms='mysql';
$host='localhost';
$dbName='infs3202';
$user='root';
$pass='';
$dsn="$dbms:host=$host;dbname=$dbName";
$dbh = new PDO($dsn, $user, $pass);


if(isset($_POST['submit'])){
		$username = $_POST["username"];
		$password = $_POST["password"];
		//$email = $_POST["email"];
		//$phone = $_POST["phone"];
		//$gender = $_POST["gender"];

$st = $dbh->prepare("SELECT * FROM `user_info` WHERE username='{$name}' AND password = '{$password}'");
$st->execute();
$user = $st->fetchAll();

	if(sizeof($user)!=0){
			session_start();
			$userinfo = new UserModel($username);
			$_SESSION['user'] = $userinfo;
			echo 'success'.$username;
			$flag = 1;
	}else{
		$flag = 0;
		echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <script>
			alert("incorrect username or password, please try again!");

    </script>
  </body>
</html>';
	}
}


		//$this->userLogin();
    }
	
	/*function userlogin($username, $password){

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
	}*/
}
?>
