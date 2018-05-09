<?php

$name=$_POST[username];
$password=$_POST[password];
$passwordJson = json_encode($password);

$dbms='mysql';
$host='localhost';
$dbName='infs3202';
$user='root';
$pass='';
$dsn="$dbms:host=$host;dbname=$dbName";
$dbh = new PDO($dsn, $user, $pass);

session_start();
$st = $dbh->prepare("SELECT * FROM `user_info` WHERE `username`='$name'");
$st->execute();
$user = $st->fetchAll();
$userJson = json_encode($user);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <script>
      var user = <?php
          echo $userJson;
      ?>;
      var password = <?php echo $passwordJson ?>;
      console.log(password);
	  if(user.length==0){
		  alert("Invalid username, please try again");
		  location.href='../View/login.html';
	  }
      else if(user[0][1] === password){
        alert("success!");
		location.href='../View/Look.html';
      }else{
        alert("fail!");
        location.href='../View/login.html';
      }
    </script>
  </body>
</html>
