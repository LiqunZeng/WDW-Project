<?php

class UserModel extends Model{
	private $username;
	
	function UserModel($username){
		return $this->$username;
	}
	
	function get_username(){
		return $this->username;
	}
	
	function set_username($username){
		$this->username=$username;
	}
}


?>