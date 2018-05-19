<?php
	
//require_once "application/router.php";

///////////////////Liqun
require_once('application/Controller/LoginController.php');
//require_once('application/Model/UserModel.php');

@$op = $_REQUEST['submit'];

$LoginController = new LoginController();

switch($op){
	case 'login':
		$username = $_POST["username"];
		$password = $_POST["password"];
		//$email = $_POST["email"];
		//$phone = $_POST["phone"];
		//$gender = $_POST["gender"];
		
		if($LoginController->userlogin($username, $password)){
			header("Location:Look.php");
		}else{
			header("Location:login.php");
		}
	
	break;

	case 'logout':
		$LoginController->logout();
		header("Location:index.php");
	break;
	
	default:
		header("Location:login.php")
	break;
}


?>