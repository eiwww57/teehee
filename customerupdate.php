<?php
	session_start();
	require_once 'login.php';
	$conn = connectDB();
	if (!isset($_SESSION['Cus_ID'])){ $_SESSION['Cus_ID'] = "false"; } else {$customer = $_SESSION['Cus_ID']; }
	$login = "select * from customers where Cus_ID = ('$customer')";
	$result = $conn->query($login);
	$cusinfo = mysqli_fetch_assoc($result);
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
	<script>
		function update_val(x){
			if (x=="fpd") {
				alert("Incorrect old password");					
			}
			else {
				alert ("Old password and new password are the same")
			}
		}
	</script>
  </head>
  <body onLoad="update_val('<?php if (isset($_GET['status'])) echo $_GET['status'] ?>')">
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
	<h1 style="font-family: Hysteria; font-size: 4em; margin: 20px 30px; text-align: center">Your personal information</h1>
	<div class="container" style="background-color: #EEEEEE">
		<div class="row">
			<div class="col-4" style=" padding: 10px">
				<img src="images/Quy trình/login.png" class="img-fluid" height="470" width="350">
			</div>
			<div class="col-4">
			<form action="Admin/update.php" method="post">
				<input type="hidden" name="cusid" value="<?php echo $cusinfo['Cus_ID'] ?>">
				<table width="350" border="0" cellspacing="10" cellpadding="10" style="padding: 10px; ">
				  <tbody> 
					<tr>
					  <td>Username: </td>
					  <td><?php echo $cusinfo['Cus_username'] ?></td>
					</tr>
					<tr>
					  <td>Old Password</td>
					  <td><input type="password" name="cuspwd"></td>
					</tr>
					<tr>
					  <td>New password </td>
					  <td><input type="password" name="newpwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"></td>
					</tr>
					<tr>
					  <td>Your name: </td>
					  <td><input type="text" name="cusname" value="<?php echo $cusinfo['Cus_name'] ?>"></td>
					</tr>
					<tr>
					  <td>Your email: </td>
					  <td><input type="text" name="cusemail" value="<?php echo $cusinfo['Cus_email'] ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"></td>
					</tr>
					<tr>
					  <td>Address:</td>
					  <td><input type="text" name="cusadd" value="<?php echo $cusinfo['Cus_address'] ?>"></td>
					</tr>
					<tr>
					  <td>Phone:</td>
					  <td><input type="text" name="cusphone" value="<?php echo $cusinfo['Cus_Phone'] ?>" pattern="([0-9]+)(.{9,12})"></td>
					</tr>
					<tr>
					  <td>Date of birth:</td>
					  <td><input type="date" name="cusdob" value="<?php echo $cusinfo['Cus_DOB'] ?>" max="2009-01-01"></td>
					</tr>
					<tr>
					  <td colspan="2" style="text-align: center"><input type="submit" style="font-family: Hysteria; font-size: 2em; border-radius: 10px; background-color: white;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);" value="Update your account"></td>
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