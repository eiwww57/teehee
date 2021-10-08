<?php
function connectDB(){
	$servername ="localhost";
	$username = "chuayeulam";
	$password = "01011994";
	$dbname = "teehee";
	//create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	//check connection
	if (!$conn) {
		die("Connection fail: ".mysqli_connect_error());
	}
	return $conn;
}
$lamie = connectDB();
function mysqli_fix_strings($con, $a){
		if (get_magic_quotes_gpc()) $a = stripcslashes($a);
			return $con->real_escape_string($a);
}
if (isset($_POST['un'])) {
	$uname = mysqli_fix_strings($lamie,$_POST['un']);
	$pwd = mysqli_fix_strings($lamie,$_POST['pwd']);
	$admin = "select Ad_ID from admins where Ad_uname = '$uname' AND Ad_pass = '$pwd'";
	$result = $lamie->query($admin);
	if (mysqli_num_rows($result) == 1) { 
			header("Location:Admin/AdminIndex.html");
			$row = mysqli_fetch_assoc($result);
			$_SESSION['Ad_ID'] = $row['Ad_ID'];
	}
	else { 
			echo "Wrong username or password";
	}
	
}

?>