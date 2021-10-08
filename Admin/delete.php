<?php
require_once '../login.php';
$conn = connectDB();

if($_GET['id']=="cat"){
	$id = $_GET['value'];
	$delete = "delete from Categories where Cat_ID = ('$id')";
	$result = $conn->query($delete);
	if (!$result) { echo "Error: ".$conn->error."<br/>";}
	else {header("Location:category.php");}
}
elseif($_GET['id']=="pro"){
	$proid = $_GET['value'];
	$delete1 = "delete from products where Pro_ID = ('$proid')";
	$result1 = $conn->query($delete1);
	$proimg = $_GET['img'];
	if (!$result1) { echo "Error: ".$conn->error."<br/>";}
	else {
		header("Location:products.php");
		unlink($proimg);
	}
}
elseif ($_GET['id']=="cart") {
	$cartid = $_GET['value'];
	$delete1 = "delete from carts where Cart_ID = ('$cartid')";
	$result1 = $conn->query($delete1);
	if (!$result1) { echo "Error: ".$conn->error."<br/>";}
	else {
		header("Location:../Cart.php");
	}
}
mysqli_close($conn)
?>