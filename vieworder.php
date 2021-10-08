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
    <title>CARTS</title>
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
			font-size: 1em;
			text-align: center;
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
            <a class="nav-link active" href="customerinfo.php">Welcome, <?php echo $cusinfo['Cus_name'] ?>!</a>
          </li>
		  <?php } ?>
        </ul>
      </div>
    </nav>
	<h1 style="font-family: Hysteria; font-size: 4em; margin: 20px 30px; text-align: center">Your orders</h1>
	<div class="container">
		<div class="row">
			<table width="100%" border="1" cellspacing="3" cellpadding="5">
			  <tbody>
				<tr>
				  <th>No.</th>
				  <th>Order Date</th>
				  <th>Products</th>
				  <th>Ship date</th>
				  <th>Total</th>
				  <th>Status</th>
				</tr>
				<?php $i = 0;
				$select = "SELECT DISTINCT o.Ord_ID, totalprice, Ord_status, Ship_time from orders o inner join carts c on o.Ord_ID = c.Ord_ID where Cus_ID = ('$customer')";
				$selectresult = $conn->query($select);
				while ($row1 = mysqli_fetch_assoc($selectresult)) {
					$i++;
					$oid = $row1['Ord_ID'];
					$selectresult2 = $conn->query("Select * from carts c inner join products p on c.Pro_ID = p.Pro_ID where Ord_ID = ('$oid')"); ?>				    	
				<tr>
				  <td style="text-align: center"><?php echo $i ?></td>
				  <td><?php echo $oid?></td>
				  <td width="600" ><table cellpadding="10" cellspacing="5" >
					  <?php while ($row2 = mysqli_fetch_assoc($selectresult2)) { ?>
					  <tr>
						<td><?php echo "Name: " ?></td>
					  	<td><?php echo $row2['Pro_name']?></td>
					 	<td><?php echo "Quantity: " ?></td>
					  	<td><?php echo $row2['quantity'] ?></td>
					  	<td><?php echo "Price: " ?></td>
					  	<td><?php echo $row2['prices']*$row2['quantity']?> VND</td>
					  </tr> <?php } ?> </table></td>
				  <td><?php echo $row1['Ship_time'] ?></td>
				  <td><?php echo $row1['totalprice'] ?> VND</td>
				  <td><?php if ($row1['Ord_status']==0){ echo "on progress";} else {echo "finished";} ?> </td>
				</tr>
				<?php } ?>
			  </tbody>
			</table>
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