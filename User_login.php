<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>T-HEE UNIFORM</title>
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
		function login_val(x){
			if (x=="fail") {
				alert("Wrong username or password");					
			}
		}
	</script>
  </head>
<body onLoad="login_val('<?php if (isset($_GET['status'])) echo $_GET['status'] ?>')">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="Index.php"><img src="images/Quy trình/logo.png" width="150" height="75"></a>
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
            <a class="nav-link" href="#">Cart</a>
          </li>
		<li class="nav-item">
            <a class="nav-link" href="#">Log in</a>
          </li>
        </ul>
      </div>
    </nav>
	<h1 style="font-family: Hysteria; font-size: 4em; margin: 20px 30px; text-align: center">Start your sustainable-fashion shopping here</h1>
	<div class="container" style="background-color: #EBEBEB">
		<div class="row">
			<div class="col-6" style="margin-top: 10px;" >
				<div id="mycarousel" class="carousel slide" data-ride="carousel"> 
					<ol class="carousel-indicators">
						<li data-target="#mycarousel" data-slide-to="0" class="active"></li>
						<li data-target="#mycarousel" data-slide-to="1"></li>
						<li data-target="#mycarousel" data-slide-to="2"></li>
					  </ol>
					<div class="carousel-inner">
						<div class="carousel-item active">
							<img class="img-fluid" src="images/ALBUM1/5.jpg" alt="First slide"> 
						</div>
						<div class="carousel-item">
							<img class="img-fluid" src="images/Planet B1/8.png"  alt="Second slide">
						</div>
						<div class="carousel-item">
							<img class="img-fluid" src="images/Planet B1/6.png" alt="Third slide">
						</div>
					</div>
					<a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
					</div>
			</div>
			<div class="col-6">
				<h2 style="font-family: Geomanist; font-size: 2em; font-weight: 600; text-align: center; margin: 10px;">LOG IN</h2>
				<div id="id01">
				  <form action="userlogin.php" method="post" name="loginuser" onSubmit="return login_val()" >
					<div class="container" style=" align-content: center">
					  <table width="500" border="0" cellspacing="3" cellpadding="10">
							<tr>
							  <td><label style="font-family: Geomanist;"><b>Username:</b></label></td>
							  <td><input type="text" placeholder="Enter Username" name="uname" required></td>
							</tr>
							<tr>
							  <td><label style="font-family: Geomanist;"><b>Password: </b></label></td>
							  <td> <input type="password" placeholder="Enter Password" name="psw" required></td>
							</tr>
						    <tr>
							  <td> </td>
							  <td><label style="font-family: Geomanist;"><input type="checkbox" checked="checked" name="remember"> Remember me</label>
							  </td>
							</tr>
						    <tr>
							  <td></td>
							  <td><button type="submit" style="font-family: Geomanist; margin-right: 20px; border-radius: 10px;">Login</button><button type="reset" style="font-family: Geomanist;border-radius: 10px;">Cancel</button></td>
							</tr>
						    <tr>
							  <td colspan="2" style="text-align: right"><a href="Signup.php">Don't have an account? Create one!</a></td>
							</tr>
					  </table>					
				 	</div>
				</form>
			</div>	
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>