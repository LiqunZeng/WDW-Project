<?php

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

$check = $dbh->prepare("SELECT * FROM `user_info` WHERE `username`='$username'");
$check -> execute();
$user = $check->fetchAll();
$userJson = json_encode($user);


		$st = $dbh->prepare("INSERT INTO user_info (username, password, email, phone, gender) VALUES (:username, :password, :email, :phone, :gender)");

		$st->bindParam(':username', $username);
		$st->bindParam(':password', $password);
		$st->bindParam(':email', $email);
		$st->bindParam(':phone', $phone);
		$st->bindParam(':gender', $gender);

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
	  if(user.length==0){
		alert("success!");
		<?php
		$st->execute();
		?>
        location.href='../View/Look.html';

      }else{
		  alert("username exists, please try agian OR login");
		  location.href='../View/Register.html';
      }
    </script>
  </body>
</html>





<script>
	location.href='../index.php';
</script>
