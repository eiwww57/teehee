<?php
	session_start();
	require_once 'login.php';
	$conn = connectDB();
	if (isset($_GET['logout'])){
		$_SESSION['Cus_ID'] = "false";
	}
	if (!isset($_SESSION['Cus_ID'])){ $_SESSION['Cus_ID'] = "false"; } 
	else {
			$customer = $_SESSION['Cus_ID']; 
			$login = "select * from customers where Cus_ID = ('$customer')";
			$result = $conn->query($login);
			$cusinfo = mysqli_fetch_assoc($result);
		 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>T-HEE UNIFORM</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
	  @font-face {
		  font-family: Hysteria;
		  src: url(font/Hysteria-jERWM.woff);
		}	
		@font-face {
		  font-family: Geomanist;
		  src: url(font/geomanist-regular-webfont.woff);
		}
	  h5 {
		font: "geomanist regular";
		 }
		#ba-anh{
			margin-top: -10%;
			margin-left: 35px;
		}
		ul li{
			margin-right: 50px;
		}
		h2 {
			margin: 20 0 10 50;
		}	
	</style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="Index.php"><img src="images/Quy trình/logo.png" width="150" height="75"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
	  <h1 style="font-family: Geomanist; font-weight: 700; font-size: 3em">T-HEE UNIFORM</h1>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="About.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Customize</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Product.php">Products</a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="Cart.php">Cart</a>
          </li>
		  <?php if ($_SESSION['Cus_ID'] == "false") { ?>
		  <li class="nav-item">
            <a class="nav-link" href="User_login.php">Log in</a>
          </li>
		  <?php } else { ?>
		  <li class="nav-item">
            <a class="nav-link" href="customerinfo.php">Welcome, <?php echo $cusinfo['Cus_name'] ?>!</a>
          </li>
		  <?php } ?>
        </ul>
      </div>
    </nav>
    <div class="container mt-3">
      <div class="row">
        <div class="col-12">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">    
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="images/Album2/album2 (1).jpg" alt="First slide" width="1920" height="700">
                <div class="carousel-caption d-none d-md-block">
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/Planet B1/PlanetB1.jpg" alt="Second slide" width="1920" height="700">
                <div class="carousel-caption d-none d-md-block">
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/Album2/album2 (2).jpg" alt="Third slide" width="1920" height="700">
                <div class="carousel-caption d-none d-md-block">
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
      <hr>
    </div>
    <section>
      <div class="container">
	    <div class="row" id="ba-anh">
		   <div class="col-lg-4">
			<a href="https://www.facebook.com/media/set/?vanity=teehee.uniform&set=a.382806693080013" target="_blank">
			<img src="images/Planet B/3.jpg" height="200" width="300" class="img-responsive"  style="border: 8px solid #fff;border-radius: 15px;box-shadow: 0px 5px 20px 0px rgb(0 0 0 / 26%); margin: 10px -10px;">
			</a>
		   </div>
		   <div class="col-lg-4">
			<a href="https://www.facebook.com/media/set/?vanity=teehee.uniform&set=a.354385589255457" target="_blank">
			<img src="images/Thanh Nhi/1.jpg" height="200" width="300" class="img-responsive" style="border: 8px solid #fff;border-radius: 15px;box-shadow: 0px 5px 20px 0px rgb(0 0 0 / 26%);margin: 10px -10px;">
			</a>
		   </div>
		   <div class="col-lg-4">
			<a href="https://www.facebook.com/teehee.uniform/posts/414112876616061" target="_blank">
			<img src="images/Bet on us/betonus.jpg" height="200" width="300" class="img-responsive"  style="border: 8px solid #fff;border-radius: 15px;box-shadow: 0px 5px 20px 0px rgb(0 0 0 / 26%);margin: 10px -10px;">
			</a>   
		   </div>
		 </div>	
      </div>
    </section>
    <hr>
	<div class="container">
		<h1 style="font-family: Hysteria; font-size: 4em; text-align: center">What to know before booking</h1>
		<div class="row">
			<div class="col">
				<img src="images/Quy trình/size.jpg" class="img-fluid">
			</div>
			<div class="col">
				<img src="images/Quy trình/Dangao.jpg" class="img-fluid">
			</div>
		</div>
		<div class="row">
			<div class="col">
				<img src="images/Quy trình/price.jpg" class="img-fluid">
			</div>
		</div>
	</div>
	<div class="container mt-3">
	<h1 style="font-family: Hysteria; font-size: 4em; text-align: center">Feedbacks</h1>
      <div class="row">
        <div class="col-12">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">    
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="images/feedback/1.jpg" alt="First slide" width="1920" height="700">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/feedback/2.jpg" alt="Second slide" width="1920" height="700">
				<div class="carousel-caption d-none d-md-block"></div>  
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/feedback/3.jpg"  width="1920" height="700">   <div class="carousel-caption d-none d-md-block"></div>           
              </div>
			  <div class="carousel-item">
                <img class="d-block w-100" src="images/feedback/4.jpg"  width="1920" height="700">   <div class="carousel-caption d-none d-md-block"></div>           
              </div>
		      <div class="carousel-item">
                <img class="d-block w-100" src="images/feedback/3.jpg"  width="1920" height="700">   <div class="carousel-caption d-none d-md-block"></div>           
              </div>
			  <div class="carousel-item">
                <img class="d-block w-100" src="images/feedback/5.jpg"  width="1920" height="700">   <div class="carousel-caption d-none d-md-block"></div>           
              </div>
			  <div class="carousel-item">
                <img class="d-block w-100" src="images/feedback/6.jpg"  width="1920" height="700">   <div class="carousel-caption d-none d-md-block"></div>           
              </div>
			  <div class="carousel-item">
                <img class="d-block w-100" src="images/feedback/7.jpg"  width="1920" height="700">   <div class="carousel-caption d-none d-md-block"></div>         
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr>
    </div>
    <footer class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p>Copyright © T-HEE UNIFORM. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 
  </body>
</html>