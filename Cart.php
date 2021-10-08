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
	$select = "select * from carts c inner join products p on c.Pro_ID = p.Pro_ID where Cus_ID = ('$customer')";
	$selectresult = $conn->query($select);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CARTS</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
	<script>
		function thealert(x) {
		  	if (x=="nopro"){
				alert("No products added");
			}
		}
		function quanchange(y,z) {
			y = String(y);
			z = String(z);
			location.href = "Admin/update.php?caid="+z+"&value="+y;
		}
	</script>
	
  </head>
  <body onLoad="thealert('<?php if (isset($_GET['id'])) echo $_GET['id'] ?>')">
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
            <a class="nav-link active" href="#">Cart</a>
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
	<h1 style="font-family: Hysteria; font-size: 4em; margin: 20px 30px; text-align: center">Your cart</h1>
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
				  <th>Select</th>
				  <th>Delete</th>
				</tr>
				<form action="ConfirmOrder.php" name="submitcart" style="margin: 10px 40%" method="post">
				<?php $i = 0;
				while ($row1 = mysqli_fetch_assoc($selectresult)) {
					if (!$row1['Cart_status']==1) { $i++ ?>	  	
				<tr>
				  <td style="text-align: center"><?php echo $i ?></td>
				  <td width="310" height="210" style="text-align: center" ><img class="img-fluid" width="300" height="200" src="Admin/<?php echo $row1['Pro_img']?>"</td>
				  <td>Product name: <?php echo $row1['Pro_name']?><br/>Description: <?php echo $row1['Pro_desc']?><br/>Price per unit: <?php echo $row1['prices']?> VND</td>
				  <td style="text-align: center"><input type="number" name="quantity" min="1" max="<?php echo $row1['Pro_num'] ?>" value="<?php echo $row1['quantity']?>" onChange="quanchange(this.value,<?php echo $row1['Cart_ID'] ?>)"></td>
				  <td style="text-align: center" id="total"><?php $sum = $row1['prices']*$row1['quantity']; echo $sum; ?></td>
				  <td style="text-align: center"><input type="checkbox" name="check_list[]" value="<?php echo $row1['Cart_ID'] ?>"></td>
				  <td style="text-align: center"><a href="Admin/delete.php?id=cart&value=<?php echo $row1['Cart_ID'] ?>" >Delete</a></td>
				</tr>
				<?php }} ?>
			  </tbody>
			</table>
				<input type="submit" value="Proceed Payment" style="font-family: Hysteria; font-size: 3em; border-radius: 20px; margin: 20px 43%" >
			</form>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>