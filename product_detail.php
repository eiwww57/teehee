<?php
session_start();
require_once 'login.php';
$conn = connectDB();
$select = "select * from products";
$result = $conn->query($select);
$getproid = $_GET['id'];
if ((!isset($_SESSION['Cus_ID'])) || ($_SESSION['Cus_ID'] == "false")){ $_SESSION['Cus_ID'] = "false"; } 
else {
		$customer = $_SESSION['Cus_ID']; 
		$login = "select * from customers where Cus_ID = ('$customer')";
		$result1 = $conn->query($login);
		$cusinfo = mysqli_fetch_assoc($result1);
	 }	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>T-HEE PRODUCTS</title>
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
		h2{
			font-family: Hysteria;
			font-size: 4em;
			text-align: center;
		}
		h1 {
			text-align: center;
		}
	</style>
	<script>
	function beforeadd() {
		var quantity = document.forms["cart"]["quantity"];
		if ("<?php echo $_SESSION['Cus_ID']?>" == "false"){ 
			alert("Please log in before adding to cart");
			return false;
		}
		else {
			if (quantity.value == "0"){
				alert("Please log in before adding to cart");
				return false;
			}
				
		}
	}
	</script>
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
	<?php while ($row = mysqli_fetch_assoc($result)){  
	if ($getproid == $row['Pro_ID']){ ?>
	<div class="container coninfo">
		<div class="row">
			<h2>Product Information</h2>
		</div>
		<div class="row information" style="background-color:#F1F1F1;">
			<div class="col-md-6 px-0" style="margin: 20px;float: left;">
				<?php $img = "Admin/".$row['Pro_img'] ?>
				<img src="<?php echo $img ?>" class="img-fluid"> 
			</div>
			<div class="col" style="margin: 20px;">
				<h1 style="font-family: Geomanist; font-size: 3em; font-weight: 500"><?php echo $row['Pro_name'] ?></h1><br/>
				<h2 style="font-family: Geomanist; font-size: 1.5em; font-weight: 200;text-align: left;">Product Description</h2>
				<h2 style="font-family: Geomanist; font-size: 1em; font-weight: 200;text-align: left;"><?php echo $row['Pro_desc'] ?></h2>
				<h2 style="font-family: Geomanist; font-size: 1.5em; font-weight: 200;text-align: left;">Price: <u><?php echo $row['prices']?></u> VND</h2>
				<h2 style="font-family: Geomanist; font-size: 1.5em; font-weight: 200;text-align: left;">Available: <?php echo $row['Pro_num']?> units</h2>
				<h2 style="font-family: Geomanist; font-size: 1.5em; font-weight: 200;text-align: left;">You want: <input type="number" name="quantity" form="cart" value="1" min="1" max="<?php echo $row['Pro_num']?>"></input> units</h2>
				<br/>
				<form action="Admin/Cartadd.php" id="cart" name="cart" method="post" onSubmit="return beforeadd()">
					<input type="hidden" name="proid" value="<?php echo $row['Pro_ID'] ?>" >
					<input type="hidden" name="cusid" value="<?php echo $customer ?>" >
					<input type="submit" style="font-family: Hysteria; font-size: 2em; border-radius: 10px; background-color: white;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);" value="Add to cart">
				</form>	
			</div>
		</div>
	</div>
	<?php }} ?>
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