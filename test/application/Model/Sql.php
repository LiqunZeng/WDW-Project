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


    //unfinished .  add what sql query your want..





}


?>