<?php
require_once "config/config.php";

class Sql{

    public $connect;

    function __construct(){

        $this->connect = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    }

    public function selectAll($table){

        $sql = "SELECT * FROM $table ";
        $result = $this->connect->query($sql);
        $i= 0;
        while ($row[$i] = $result->fetch_array(MYSQLI_ASSOC)){
            $i++;
        }
        return $row;

    }

    public function selectOne($table,$one){

        $sql = "SELECT $one FROM $table";
        $result = $this->connect->query($sql);
        $i= 0;
        while ($row[$i] = $result->fetch_array(MYSQLI_ASSOC)){
            $i++;
        }
        return $row;

    }

    public function selectWhere($table,$one,$id){
        $sql = "SELECT * FROM $table WHERE $one = '$id'";
        $result = $this->connect->query($sql);
        $i= 0;
        while ($row[$i] = $result->fetch_array(MYSQLI_ASSOC)){
            $i++;
        }
        return $row;
    }

	public function registerUser($username,$password,$email,$phone,$gender){
		$sql = "INSERT INTO user_info (username, password, email, phone, gender) VALUES ($username, $password, $email, $phone, $gender)";
		$result = $this->connect->query($sql);

        return 'sucess';
	}
	
	public function check($table,$one,$name){
		$sql = "SELECT * FROM $table WHERE $one ='$name'";
		$result = $this->connect->query($sql);
		$check = $result->fetchAll();
		//$userJson = json_encode($check);
		//$checkExits = strlen($userJson);
		return $check;
		
	}
    public function checkPassword($table,$one,$key, $value){

        $sql = "SELECT $one FROM $table WHERE $key = '$value'";
        $result = $this->connect->query($sql);
        $i= 0;
        while ($row[$i] = $result->fetch_array(MYSQLI_ASSOC)){
            $i++;
        }
        return $row;
    //unfinished .  add what sql query your want..





}


?>