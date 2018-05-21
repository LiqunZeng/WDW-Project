<?php
session_start();
if(isset($_SESSION['user']))header("Location:Look.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>Wedding Stylish website</title>

    <!-- Custom styles for this template -->
   
    <link href="Public/css/bootstrap.css" rel="stylesheet">
    <!-- Optional theme -->
    <link href="Public/css/bootstrap-theme.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="Public/css/style.css">

  </head>

  <body>
  <?php
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
			echo 'success';
	}else{
		echo'fail';
	}
}


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


    <!-- Fixed navbar MISS one navbar-deafult-->
    <nav class="navbar navbar-fixed-top container-fluid" id="mainNav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="?c=index&a=index"><img src="Public/img/logo2.png" class="img-responsive" alt="logo image" id="brand-image"></a>
          <!--<a class="navbar-brand" href="#">Wedding Stylish</a> 
          <img src="img/Logo.png" class="img-responsive" alt="Responsive image" id="navImg">
          -->
        </div>
        <div id="navbar" class="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav ml-auto">
            <li class="active"><a href="index.html">Home</a></li>
             <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?c=Look&a=Look">Look</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">Blog</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">ShoppingChat</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Login</a></li>
            <li class="active"><a href="?c=Register&a=Register">Register</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="register text-center fieldset col-centered">
  <div class="row">
    <div class="form-group col-md-10 form1"><!-- here is 10 -->
      <form role="form" class="form-horizontal" data-toggle="validator" method = "POST" action = "#">
        <div class="row">
          <fieldset class="col-md-offset-5"><!--  5 is the center-->
            <legend class="col-md-8" style="font-family: 'Playball', cursive; font-weight: bold; font-size: xx-large;">Login</legend>
              <div class="col-md-8">
                <div class="form-group">
                  <div class="col-md-10 col-md-offset-1">
                    <label class="control-label">Username</label>
                      <input type="text" class="form-control" name="username" placeholder="username" required="">
                  </div>
                </div>

                 <div class="form-group">
                  <div class="col-md-10 col-md-offset-1">
                    <label class="control-label">Password</label>
                    <input type="password" data-minlength="6" class="form-control" id="inputPassword" name="password" placeholder="Minimum of 6 characters" required="">
                    <div class="help-block">Minimum of 6 characters</div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg" name="submit">Login</button>
                    <br>
                    <br>
                    <a class="js-scroll-trigger" name="regisetr" href="?c=Register&a=Register">Don't have an account?</a>
                  </div>
                </div>
            </div>
          </fieldset>
        </div>
      </form>
    </div>
  </div>
</div>   

<!--          Footer part             -->
  <section class="col-md-10" id="footer">
      <div class="seperatorFooter"></div>
     
    <br>
    <div class="col-md-offset-3 footer">
    &copy; Infs group: Yaxin, liqun, LiuChen
    </div>
  </section>
    


<!-- Bootstrap core JavaScript Placed at the end of the document to let the pages load faster  -->
<script src="js/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
<script src="js/validator.min.js"></script>



  </body>
</html>
