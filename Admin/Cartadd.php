<?php
date_default_timezone_set ("Asia/Ho_Chi_Minh");
require_once '../login.php';
$conn = connectDB();
if (isset($_POST['proid'])){
	$proid = $_POST['proid'];
	$cusid = $_POST['cusid'];
	$quantity = $_POST['quantity'];
	$insert = "insert into carts(Pro_ID, Cus_ID, quantity) values ('$proid','$cusid','$quantity')";
	$result = $conn->query($insert);
	if (!$result) { echo "Error: ".$conn->error."<br/>";}
	else {header("Location:../Cart.php");}
} 
mysqli_close($conn);
?>