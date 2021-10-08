<?php
	session_start();
	require_once 'login.php';
	$conn = connectDB();
	$select = "Select * from products p inner join categories c on p.Cat_ID = c.Cat_ID";
	$select1 = "Select * from categories";
	$result = $conn->query($select1);
	$result1 = $conn->query($select);
	$result2 = $conn->query($select1);
	if (isset($_GET['logout'])){
		$_SESSION['Cus_ID'] = "false";
	}
	if (!isset($_SESSION['Cus_ID'])){ $_SESSION['Cus_ID'] = "false"; } 
	else {
			$customer = $_SESSION['Cus_ID']; 
			$login = "select * from customers where Cus_ID = ('$customer')";
			$result3 = $conn->query($login);
			$cusinfo = mysqli_fetch_assoc($result3);
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
	<div class="container">
	  <div class="row" id="intro">
		<div class="col-12">
	    	<img class="d-block w-100" src="images/Quy trình/coverphoto.jpg" alt="Second slide">
			<h1 style="text-align: center; font-family: Hysteria; font-size: 5em; margin-top:auto;">Products</h1>
		</div>
      </div>
	</div>
	<div class="container">
		<ul class="nav nav-tabs teehee-nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#navtab0">All products</a>
			</li>
			<?php while ($row = mysqli_fetch_assoc($result)) { ?>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#navtab<?php echo $row['Cat_ID']?>" alt="<?php echo $row['Cat_name']?>" title="<?php echo $row['Cat_name']?>"><?php echo $row['Cat_name'] ?></a>
			</li>
			<?php } ?>
		</ul>
		<div class="tab-content" style="margin-left: 50px;">
			<div class="tab-pane container active" id="navtab0">
				<div class="product-contain">
					<div class="row">
						<?php while ($row1 = mysqli_fetch_assoc($result1)){ 
						if ($row1['isshow'] == "1"){ ?>
						<div class="col-lg-3" style="margin-right: 5%; margin-top: 5%">
							<div class="item">
							<a href= "product_detail.php?id=<?php echo $row1['Pro_ID']?>"  alt="<?php echo $row1['Pro_name']?>" title="<?php echo $row1['Pro_name']?>">
							<?php $img = "Admin/".$row1['Pro_img']; ?>
							<img src="<?php echo $img ?>" class="img-responsive" alt="<?php echo $row1['Pro_name']?>" title="<?php echo $row1['Pro_name']?>" width="300" height="220">
							</a>
							<h4 style="text-align: center;font-family: Geomanist; margin-left: 25%; text-decoration-color: cornflowerblue">
							<a href="product_detail.php?id=<?php echo $row1['Pro_ID'] ?>"  alt="<?php echo $row1['Pro_name']?>" title="<?php echo $row1['Pro_name']?>"><?php echo $row1['Pro_name']?></a>
							</h4>
							</div>
						</div>
						<?php }} ?>
					</div>
				</div>
			</div>
			<?php while ($row2 = mysqli_fetch_assoc($result2)){  ?>
			<div class="tab-pane container fade" id="navtab<?php echo $row2['Cat_ID']?>" role="tabpanel">
				<div class="product-contain">
					<div class="row">	
						<?php 
						$catid = $row2['Cat_ID'];
						$procat = $conn->query("Select * from products where Cat_ID = ('$catid')");
						while ($row3 = mysqli_fetch_assoc($procat)) { 
						if  ($row3['isshow'] == 1) { ?>
						<div  class="col-lg-3" style="margin-right: 5%; margin-top: 5%">
							<div class="item">
							<a href="product_detail.php?id=<?php echo $row3['Pro_ID']?>" alt="<?php echo $row3['Pro_name']?>" title="<?php echo $row3['Pro_name']?>">
							<?php $img = "Admin/".$row3['Pro_img']; ?>
							<img src="<?php echo $img ?>" class="img-responsive" alt="<?php echo $row3['Pro_name']?>" title="<?php echo $row3['Pro_name']?>" width="300" height="220">
							</a>
							<h4 style="text-align: center;font-family: Geomanist;margin-left: 20% ; text-decoration-color: cornflowerblue">
							<a href="product_detail.php?id=<?php echo $row3['Pro_ID']?>" alt="<?php echo $row3['Pro_name']?>" title="<?php echo $row3['Pro_name']?>"><?php echo $row3['Pro_name']?></a>
							</h4>
							</div>
						</div>
						<?php }} ?>
					</div>
				</div>	
			</div>	
			<?php } ?>
		</div>
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
</body>
</html>
<?php mysqli_close($conn);
