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
	<img src="images/About/a (9).jpg" class="img-fluid">
	<img src="images/About/a (1).jpg" class="img-fluid">
	<img src="images/About/a (2).jpg" class="img-fluid">
	<img src="images/About/a (3).jpg" class="img-fluid">
	<img src="images/About/a (4).jpg" class="img-fluid">
	<img src="images/About/a (5).jpg" class="img-fluid">
	<img src="images/About/a (6).jpg" class="img-fluid">
	<img src="images/About/a (7).jpg" class="img-fluid">
	<img src="images/About/a (8).jpg" class="img-fluid">
	<img src="images/About/a (9).jpg" class="img-fluid">
    <footer class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <p>Copyright © T-HEE UNIFORM. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>