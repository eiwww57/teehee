<?php
session_start();
require_once 'login.php';
$conn = connectDB();
	function mysqli_fix_string($con, $a){
		if (get_magic_quotes_gpc()) $a = stripcslashes($a);
			return $con->real_escape_string($a);
	}
	$uname = mysqli_fix_string($conn,$_POST['uname']);
	$pwd = mysqli_fix_string($conn,$_POST['psw']);
	$customer = "select Cus_ID from customers where Cus_username = '$uname' AND Cus_password = '$pwd'";
	$result = $conn->query($customer);
	if (mysqli_num_rows($result) == 1) { 
			header("Location:index.php");
			$row = mysqli_fetch_assoc($result);
			$_SESSION['Cus_ID'] = $row['Cus_ID'];
	}
	else { 
			header("Location:User_login.php?status=fail");
	}
?>