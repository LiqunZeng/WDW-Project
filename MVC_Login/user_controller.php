
<?php

class UserController{

	//constructor
	function UserController(){
	
	//constructor is empty 
	
	
	}
	
	//create user with only username and password
	function create($username, $password){
		
	}
	
	//create user with full details
	function create($username, $password, $email, $phonenumber){
		
	}
	
	function login($username, $password){
		
		if($this -> authenticate($username, $password)){
			
			//start the session
			session_start();
			
			//new an user_model object
			$user = new UserModel($username);
			
			
			//set the object to the session
			$_SESSION['user'] = $user;
			
			//authenticated the user
			return true;
			
		}
		else{
			//could not login
			return false;
		}
		
		static function authenticate($username, $password){
			
			$authenticate = false;
			
			//check if user is valid
			
			//TO DO
			
			
			//临时代码
			if ($username == 'admin' && $password == 'Ciba'){
				$authentic = true;
			//待纠正
			}
			
			
			
			return $authentic;
			
		}
		
		//logout
		function logout(){
			
			session_start();
			session_destroy();
			
		}
		
		
	}


}


?>