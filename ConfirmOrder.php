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
    <title>Confirm orders</title>
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
		ul li{
			margin-right: 50px;
		}
		th{
			font-family: Geomanist;
			font-weight: 500;
			font-size: 1.5em;
			text-align: center;
		}
		td{
			font-family: Geomanist;
			font-weight: 300;
			font-size: 1.25em;
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
            <a class="nav-link" href="#">Cart</a>
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
	<h1 style="font-family: Hysteria; font-size: 4em; margin: 20px 30px; text-align: center">Confirm your order</h1>
	<div class="container">
		<div class="row">
			<table width="100%" border="1" cellspacing="3" cellpadding="5">
			  <tbody>
				<tr>
				  <th>No.</th>
				  <th>Product Image</th>
				  <th>Product Description</th>
				  <th>Product Quantity</th>
				  <th>Price (VND)</th>
				</tr>
				<?php $i = 0; $total = 0;
				if(!empty($_POST['check_list'])){
					foreach ($_POST['check_list'] as $check){ 
					$i++;
					$select = "select * from carts c inner join products p on c.Pro_ID = p.Pro_ID where Cus_ID = ('$customer') and Cart_ID = ('$check')";
					$selectresult = $conn->query($select); 
					$row1 = mysqli_fetch_assoc($selectresult);
					$total = $total + ($row1['prices']*$row1['quantity']);
				?>
				<tr>
				  <td style="text-align: center"><?php echo $i ?></td>
				  <td width="310" height="210" style="text-align: center" ><img class="img-fluid" width="300" height="200" src="Admin/<?php echo $row1['Pro_img']?>"</td>
				  <td>Product name: <?php echo $row1['Pro_name']?><br/>Description: <?php echo $row1['Pro_desc']?><br/>Price per unit: <?php echo $row1['prices']?> VND</td>
				  <td style="text-align: center"><?php echo $row1['quantity']?></td>
				  <td style="text-align: center" id="total"><?php $sum = $row1['prices']*$row1['quantity']; echo $sum; ?></td>
				  </tr>
				  <?php }} else {header("Location:Cart.php?id=nopro"); } ?>
				  <?php $ship = 0; if ($total < 500000) {$ship = 20000; } else {$ship = 0;} ?>
				  <tr>
					  <td colspan="2" style="text-align: right">Product total: <?php echo $total ?> VND</td>
					  <td style="text-align: right">Shipping fee: <?php echo $ship ?> VND</td>
					  <td colspan="2" style="text-align: right">Total: <?php echo $total+$ship ?> VND</td>
				  </tr>
			  </tbody>
			</table>
		</div>
	</div>
	<div class="container" style="background-color: #EEEEEE">
		<div class="row" style="margin-top: 50px">
			<div class="col-4" style=" padding: 10px">
				<img src="images/Quy trình/login.png" class="img-fluid" height="470" width="350">
			</div>
			<div class="col-4">
				<table width="300" border="0" cellspacing="5" cellpadding="10" style="margin-left: 20px; ">
				  <tbody> 
					<tr>
					  <td colspan="2" style="padding-bottom: 1"><h1 style="font-family: Hysteria; font-size: 2em; margin: 20px 30px; text-align: center">Shipping Information</h1></td>
					</tr>
					<tr>
					  <td><b>Your name: </b></td>
					  <td><?php echo $cusinfo['Cus_name'] ?></td>
					</tr>
					<tr>
					  <td><b>Address: </b></td>
					  <td><?php echo $cusinfo['Cus_address'] ?></td>
					</tr>
					<tr>
					  <td><b>Phone: </b></td>
					  <td><?php echo $cusinfo['Cus_Phone'] ?></td>
					</tr>
				<form action="orderproceed.php" method="post">
					<?php if(!empty($_POST['check_list'])){
					foreach ($_POST['check_list'] as $check){ ?>
					<input type="hidden" name="cart_confirm[]" value="<?php echo $check ?>">
					<?php }} ?>
					<input type="hidden" name="orderprice" value="<?php echo $total+$ship ?>">
					<tr style="text-align: center">
					  <td><input type="submit" style="font-family: Hysteria; font-size: 2em; border-radius: 10px; background-color: white;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);" value="Confirm"></td>
					  <td><a href="Cart.php"><input type="button" style="font-family: Hysteria; font-size: 2em; border-radius: 10px; background-color: white;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);" value="Back to cart"></a></td>
					</tr>
				  </tbody>
				</table>
			</form>
			</div>
			<div class="col-4" style=" padding: 10px">
				<img src="images/Quy trình/login.png" class="img-fluid" height="470" width="350">
			</div>
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