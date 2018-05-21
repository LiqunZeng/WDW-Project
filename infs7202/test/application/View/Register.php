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
	}else{
		echo 'user exits';
	}
}

?>

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
            <li class="active"><a href="#">Home</a></li>
             <li class="nav-item"><a class="nav-link js-scroll-trigger" href="?c=Look&a=Look">Look</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">Blog</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">ShoppingChat</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="?c=login&a=login">Login</a></li>
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
            <legend class="col-md-8">Register</legend>
              <div class="col-md-8">
                <div class="form-group">
                  <div class="col-md-10 col-md-offset-1">
                    <label class="control-label">Username</label>
                      <input type="text" class="form-control" name="username" placeholder="Username" required="">
                    <br>
                    <br>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-10 col-md-offset-1">
                    <label class="control-label">Gender</label><br>
                    <div>
                    <input type="radio" name="gender" value="male" checked> Male
                    <input type="radio" name="gender" value="female"> Female
                    <input type="radio" name="gender" value="other"> Other
                  </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-10 col-md-offset-1">
                    <label class="control-label">Phone Number</label>
                    <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-10 col-md-offset-1">
                    <label class="control-label">Email</label>
                    <input type="email" class="form-control" name="email" data-error="Error: this file must be vaild email id" placeholder="Email" required="">
                    <div class="help-block with-errors"></div>
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
                  <div class="col-md-10 col-md-offset-1">
                    <label class="control-label">Password Confrimation</label>
                      <input type="password" class="form-control" id="inputPasswordConfirm" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
                      <div class="help-block with-errors"></div>
                </div>
 

                <div class="form-group">
                  <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg" name="submit">Submit</button>
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
