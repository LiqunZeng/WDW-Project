<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <title>Wedding Stylish website</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- Custom styles for this template -->
   
    <link href="Public/css/bootstrap.css" rel="stylesheet">
    <!-- Optional theme -->
    <link href="Public/css/bootstrap-theme.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="Public/css/style.css">
    <link rel="stylesheet" href="Public/css/magnific-popup.css">
  </head>

  <body>

<?php
$dbms='mysql';
$host='localhost';
$dbName='infs3202';
$user='root';
$pass='';
$dsn="$dbms:host=$host;dbname=$dbName";
$dbh = new PDO($dsn, $user, $pass);

//error reporting
error_reporting(0);


//text search
$check = $dbh->prepare("SELECT * FROM `product_info`");
$check -> execute();
$product = $check->fetchAll();

$productArray = array();
for ($n =0; $n<sizeof($product); $n++){
	$productString = $product[$n]['product_name'].$product[$n]['product_dsc'].$product[$n]['category'];
	array_push($productArray, $productString);
}


//search shoes
$searchShoes = $dbh->prepare("SELECT * FROM `product_info` WHERE category = 'shoes'");
$searchShoes -> execute();
$shoes = $searchShoes->fetchAll();

//
$searchDress = $dbh->prepare("SELECT * FROM `product_info` WHERE category = 'dress'");
$searchDress -> execute();
$dress = $searchDress->fetchAll();

//
$searchAcc = $dbh->prepare("SELECT * FROM `product_info` WHERE category = 'accessory'");
$searchAcc -> execute();
$accessories = $searchAcc->fetchAll();

$postShoes = $_POST['shoes'];
$postDress = $_POST['dress'];
$postAccessories = $_POST['accessories'];
$postShowAll = $_POST['showAll'];
$postSearch = $_POST['search'];

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
          <a class="navbar-brand" href="#"><img src="img/logo2.png" class="img-responsive" alt="logo image" id="brand-image"></a> 
          <!--<a class="navbar-brand" href="#">Wedding Stylish</a> 
          <img src="img/Logo.png" class="img-responsive" alt="Responsive image" id="navImg">
          -->
        </div>
        <div id="navbar" class="collapse navbar-collapse navHeaderCollapse">
          <ul class="nav navbar-nav ml-auto">
            <li class="active"><a href="#">Home</a></li>
             <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">Look</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">Blog</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#">ShoppingChat</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="login.html">Login</a></li>
            <li class="active"><a href="TwoTypesOfRegister.html">Register</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


<div class="container">

      <h1 class="my-4 text-center text-lg-left">New Look</h1>
      <hr class="my-4">
      <div class="row">
       
<!--Search navigation -->   

     <div class="col-xs-12 col-md-4 btn-group-lg" role="group" aria-label="Choose">
      <div class="input-group"> 
        <div class="input-group-btn">
		<form action="#" method="POST">
          <input type="text" class="form-control" name = "search" placeholder="Search" id="txtSearch"/>
          <button class="btn btn-default" type="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
          <button type="submit" class="btn btn-default" value="shoes" name = "shoes">Shoes</button>
          <button type="submit" class="btn btn-default" value="dress" name = "dress">Dress</button>
          <button type="submit" class="btn btn-default" value="accessories" name = "accessories">Accessories</button>
		
		  <button type="submit" class="btn btn-default" value="showAll" name = "showAll">Show All</button>
		
		</form>
		  
        </div>
      </div>
    </div>
</div>




      <div class="row text-center text-lg-left">
	  
<?php

//echo $productArray[0];

//before search, show all product
if($postShoes==null && $postDress==null && $postAccessories==null && $postSearch==null){
	for($i=0; $i < sizeof($product); $i++){
	//$i=0;
	//while($i<sizeof($product)){
	echo $product[$i]["price"].'
	<!--Look with modal -->
        <div class="col-lg-3 col-md-4 col-xs-6 thum">
          <a class="d-block mb-4 h-100" data-toggle="modal" data-target="#loginModal">
            <img class="img-fluid img-thumbnail" src='. $product[$i]["path"] .' alt="No image">
            <p>' . $product[$i]["product_name"] . '</p>
            <button class="btn btn-warning btn-md js-scroll-trigger">add to ShoppingCart</button>
          </a>
        </div>
        <div class="modal fade" role="dialog" id="loginModal">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Look</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                  <img class="img-fluid img-thumbnail" src="img/thumbnails/1.jpg" alt="no image">
                </div>
                <div class="modal-footer">
                  <h3>Price:' . $product[$i]["price"].'  这里有问题！！**i is equal to:'. $i . '</h3> 
				  <h4>Describetion:' . $product[$i]["product_dsc"] . ' </h4>
                  <button class="btn btn-warning btn-md js-scroll-trigger">add to ShoppingCart</button>
                </div>
              </div>      
          </div>
        </div>
	<!--Look with modal -->';
		//$i = $i+1;
	}
	


	
}else if($postShoes!=null){
	for($i=0; $i < sizeof($shoes); $i++){
				echo '
	<!--Look with modal -->
        <div class="col-lg-3 col-md-4 col-xs-6 thum">
          <a class="d-block mb-4 h-100" data-toggle="modal" data-target="#loginModal">
            <img class="img-fluid img-thumbnail" src='. $shoes[$i]["path"] .' alt="No image">
            <p>'. $shoes[$i]["product_name"] .'</p>
            <button class="btn btn-warning btn-md js-scroll-trigger">add to ShoppingCart</button>
          </a>
        </div>
        <div class="modal fade" role="dialog" id="loginModal">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Look</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                  <img class="img-fluid img-thumbnail" src="img/thumbnails/1.jpg" alt="no image">
                </div>
                <div class="modal-footer">
                  <h3>Price:'. $shoes[$i]["price"] .'</h3>
				  <h4>Describetion:'. $shoes[$i]["product_dsc"] .' </h4>
                  <button class="btn btn-warning btn-md js-scroll-trigger">add to ShoppingCart</button>
                </div>
              </div>      
          </div>
        </div>
	<!--Look with modal -->';
	}	
	
}else if($postDress !=null){
	for($i=0; $i < sizeof($dress); $i++){
				echo '
	<!--Look with modal -->
        <div class="col-lg-3 col-md-4 col-xs-6 thum">
          <a class="d-block mb-4 h-100" data-toggle="modal" data-target="#loginModal">
            <img class="img-fluid img-thumbnail" src='. $dress[$i]["path"] .' alt="No image">
            <p>' . $dress[$i]["product_name"] . '</p>
            <button class="btn btn-warning btn-md js-scroll-trigger">add to ShoppingCart</button>
          </a>
        </div>
        <div class="modal fade" role="dialog" id="loginModal">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Look</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                  <img class="img-fluid img-thumbnail" src="img/thumbnails/1.jpg" alt="no image">
                </div>
                <div class="modal-footer">
                  <h3>Price:' . $dress[$i]["price"] . '</h3>
				  <h4>Describetion:' . $dress[$i]["product_dsc"] . ' </h4>
                  <button class="btn btn-warning btn-md js-scroll-trigger">add to ShoppingCart</button>
                </div>
              </div>      
          </div>
        </div>
	<!--Look with modal -->';
	}	
}else if($postAccessories !=null){
	for($i=0; $i < sizeof($accessories); $i++){
				echo '
	<!--Look with modal -->
        <div class="col-lg-3 col-md-4 col-xs-6 thum">
          <a class="d-block mb-4 h-100" data-toggle="modal" data-target="#loginModal">
            <img class="img-fluid img-thumbnail" src='. $accessories[$i]["path"] .' alt="No image">
            <p>' . $accessories[$i]["product_name"] . '</p>
            <button class="btn btn-warning btn-md js-scroll-trigger">add to ShoppingCart</button>
          </a>
        </div>
        <div class="modal fade" role="dialog" id="loginModal">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Look</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                  <img class="img-fluid img-thumbnail" src="img/thumbnails/1.jpg" alt="no image">
                </div>
                <div class="modal-footer">
                  <h3>Price:' . $accessories[$i]["price"] . '</h3>
				  <h4>Describetion:' . $accessories[$i]["product_dsc"] . ' </h4>
                  <button class="btn btn-warning btn-md js-scroll-trigger">add to ShoppingCart</button>
                </div>
              </div>      
          </div>
        </div>
	<!--Look with modal -->';
	}
}else if($postShowAll !=null ){
		for($i=0; $i < sizeof($showAll); $i++){
				echo '
	<!--Look with modal -->
        <div class="col-lg-3 col-md-4 col-xs-6 thum">
          <a class="d-block mb-4 h-100" data-toggle="modal" data-target="#loginModal">
            <img class="img-fluid img-thumbnail" src='. $showAll[$i]["path"] .' alt="No image">
            <p>' . $showAll[$i]["product_name"] . '</p>
            <button class="btn btn-warning btn-md js-scroll-trigger">add to ShoppingCart</button>
          </a>
        </div>
        <div class="modal fade" role="dialog" id="loginModal">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Look</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                  <img class="img-fluid img-thumbnail" src="img/thumbnails/1.jpg" alt="no image">
                </div>
                <div class="modal-footer">
                  <h3>Price:' . $showAll[$i]["price"] . '</h3>
				  <h4>Describetion:' . $showAll[$i]["product_dsc"] . ' </h4>
                  <button class="btn btn-warning btn-md js-scroll-trigger">add to ShoppingCart</button>
                </div>
              </div>      
          </div>
        </div>
	<!--Look with modal -->';
	}
}else if ($postSearch !=null){ //search key words
	for($i=0; $i < sizeof($product); $i++){
		if (strpos($productArray[$i], $postSearch) !== false){
							echo '
	<!--Look with modal -->
        <div class="col-lg-3 col-md-4 col-xs-6 thum">
          <a class="d-block mb-4 h-100" data-toggle="modal" data-target="#loginModal">
            <img class="img-fluid img-thumbnail" src='. $product[$i]["path"] .' alt="No image">
            <p>' . $product[$i]["product_name"] . '</p>
            <button class="btn btn-warning btn-md js-scroll-trigger">add to ShoppingCart</button>
          </a>
        </div>
        <div class="modal fade" role="dialog" id="loginModal">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Look</h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                  <img class="img-fluid img-thumbnail" src="img/thumbnails/1.jpg" alt="no image">
                </div>
                <div class="modal-footer">
                  <h3>Price:' . $product[$i]["price"] . '</h3>
				  <h4>Describetion:' . $product[$i]["product_dsc"] . ' </h4>
                  <button class="btn btn-warning btn-md js-scroll-trigger">add to ShoppingCart</button>
                </div>
              </div>      
          </div>
        </div>
	<!--Look with modal -->';
		}
	}

}



?>

</div>
    <!-- /.container -->

<div class="seperator"></div>
<!--          Contact part             -->
    <section class="text-center" id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center contact">
            <h2 class="section-heading" style="font-family: 'Playball', cursive; font-weight: bold; font-size: xx-large;">Let's Get In Touch!</h2>
            <hr class="my-4">
            <p class="mb-5">Do you have any advice or any required, please sent to this email. Ready to start your next project with us? That's great! Can also Give us a call or send us an email and we will get back to you as soon as possible!</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto text-center contact">
            <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
            <p>789-456-123</p>
          </div>
          <div class="col-lg-4 mr-auto text-center contact">
            <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
            <p>
              <a href="mailto:your-email@your-domain.com">weddingStylish.feedback@outlook.com</a>
            </p>
          </div>
        </div>
      </div>
      <br>

      <div class="footer">
    &copy; Infs group: Yaxin, liqun, LiuChen
</div>
    </section>

<!-- Bootstrap core JavaScript Placed at the end of the document to let the pages load faster  -->
<script src="Public/js/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="Public/js/bootstrap.min.js"></script>
<script  src="Public/js/index.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</script>

<script>

</script>
  </body>
</html>
