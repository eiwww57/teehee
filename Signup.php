<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>T-HEE SIGN UP</title>
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
		td{
			font-family: Geomanist;
			font-size: 1em;
			font-weight: 400;
		}
	</style>
	<script>
		function signup_val(x){
			if (x=="fus") {
				alert("This username is already registered");					
			}
			else if (x=="fpd") {
				alert("Password and Confirm-password are not matched")
			}
		}
	</script>
  </head>
  <body onLoad="signup_val('<?php if (isset($_GET['status'])) echo $_GET['status'] ?>')">
	 <input type="hidden" name="status" value="<?php if (isset($_GET['status'])) echo $_GET['status'] ?>">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="Index.html"><img src="images/Quy trình/logo.png" width="150" height="75"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
	  <h1 style="font-family: Geomanist; font-weight: 700; font-size: 3em">T-HEE UNIFORM</h1>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="About.php">About <span class="sr-only"></span></a>
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
		<li class="nav-item">
            <a class="nav-link active" href="User_login.php">Log in</a>
          </li>
        </ul>
      </div>
    </nav>
	<h1 style="font-family: Hysteria; font-size: 4em; margin: 20px 30px; text-align: center">Create your account</h1>
	<div class="container" style="background-color: #EEEEEE">
		<div class="row">
			<div class="col-4" style=" padding: 10px">
				<img src="images/Quy trình/login.png" class="img-fluid" height="470" width="350">
				<img src="images/Quy trình/footer.png" class="img-fluid" width="350" style="margin-top: 2%">
			</div>
			<div class="col-4">
			<form enctype="multipart/form-data" action="Admin/insert.php" name="tired" method="post" onsubmit="return ma_alert(this)">
				<table width="310" border="0" cellspacing="10" cellpadding="10" style="padding: 10px; ">
				  <tbody> 
					<tr>
					  <td>Username: </td>
					  <td><input type="text" name="usname" title="5-20 characters" pattern=".{5,}" ></td>
					</tr>
					<tr>
					  <td>Password</td>
					  <td><input type="password" name="cuspwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"></td>
					</tr>
					<tr>
					  <td>Confirm Password</td>
					  <td><input type="password" name="cuspwd1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"></td>
					</tr>
					<tr>
					  <td width="115">Your name: </td>
					  <td width="160"><input type="text" name="cusname" required ></td>
					</tr>
					<tr>
					  <td>Your email: </td>
					  <td><input type="text" id="email1" name="cusemail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required ></td>
					</tr>
					<tr>
					  <td>Address:</td>
					  <td><input type="text" name="cusadd" required ></td>
					</tr>
					<tr>
					  <td>Phone:</td>
					  <td><input type="tel" name="cusphone" pattern="([0-9]+)(.{9,12})" required></td>
					</tr>
					<tr>
					  <td>Date of birth:</td>
					  <td><input type="date" name="cusdob" max="2009-01-01" required ></td>
					</tr>
					<tr>
					  <td colspan="2" style="text-align: center"><input type="checkbox" required>       I agree with T-Hee Policy</td>
					</tr>
					<tr>
					  <td colspan="2" style="text-align: center"><input type="submit" style="font-family: Hysteria; font-size: 2em; border-radius: 10px; background-color: white;box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);" value="Create an account"></td>
					</tr>
				  </tbody>
				</table>
			</form>
			</div>
			<div class="col-4" style=" padding: 10px; padding-left: 20px">
				<img src="images/Quy trình/login.png" class="img-fluid" height="470" width="350">
				<img src="images/Quy trình/footer.png" class="img-fluid" width="350" style="margin-top: 2%">
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