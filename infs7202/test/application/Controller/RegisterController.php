
<?php
require_once 'Controller.php';
require_once "application/Model/RegisterModel.php";

class RegisterController extends Controller
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
	public function Register(){

		$this->display();
		//$this->UserRegister();
		
		//原本的register.php, 亲测能用
$dbms='mysql';
$host='localhost';
$dbName='infs3202';
$user='root';
$pass='';
$dsn="$dbms:host=$host;dbname=$dbName";
$dbh = new PDO($dsn, $user, $pass);

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$gender = $_POST["gender"];

if(isset($_POST['username'])){
$check = $dbh->prepare("SELECT * FROM `user_info` WHERE username ='{$username}'");
$check -> execute();
$user = $check->fetchAll();
//$userJson = json_encode($user);

	if(sizeof($user)==0){
		$st = $dbh->prepare("INSERT INTO user_info (username, password, email, phone, gender) VALUES (:username, :password, :email, :phone, :gender)");

		$st->bindParam(':username', $username);
		$st->bindParam(':password', $password);
		$st->bindParam(':email', $email);
		$st->bindParam(':phone', $phone);
		$st->bindParam(':gender', $gender);

		$st->execute();
		echo '<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <script>
			alert("success!");

    </script>
  </body>
</html>';
	}else{
		echo 'user exits';
	}
}
    }
}
?>
