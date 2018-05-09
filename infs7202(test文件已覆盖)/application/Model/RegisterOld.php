
<?php

//本地环境可能有问题求测试！！

//用户密码记得改呀呀呀

$dbtype = 'mysql';

$host = 'localhost';

$dbName = 'infs3202';

$dbuser = 'root';

$dbPassword = 'whfywtsdnh';

$dsn = "$dbtype: host = $host; dbname = $dbName";


//新建一个PDO对象，PDO = php data object
$dbh = new PDO($dsn, $dbuser, $dbPassword);

//运行之前准备query
$st = $dbh->prepare("INSERT INTO user_info (username, password, email, phone, gender) VALUES (:username, :password, :email, :phone, :gender)");
	
//把抓取的数据绑定到query里面的value
$st -> bindParam(':username', $username);
$st -> bindParam(':password', $password);	
$st -> bindParam(':email', $email);	
$st -> bindParam(':phone', $phone);	
$st -> bindParam(':gender', $gender);
		
//从html中抓取数据
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$gender = $_POST["gender"];

//运行$st
$st->execute();
?>

<script>
	location.href='../index.php';
</script>