<?php
date_default_timezone_set ("Asia/Ho_Chi_Minh");
session_start();
require_once 'login.php';
$conn = connectDB();
$date = date('Y/m/d h:i', time());
$shipdate = date( "Y-m-d", strtotime( "$date +7 day" ));
if(!empty($_POST['cart_confirm'])){
	$totalprice = $_POST['orderprice'];
	$add_order = "Insert into orders(Ord_ID, Ord_status, totalprice, Ship_time) values ('$date',0,'$totalprice','$shipdate')";
	$mysql1 = $conn->prepare($add_order);
	$mysql1->execute();
	foreach ($_POST['cart_confirm'] as $check){ 
		$add_cart_order = "update carts set Ord_ID = ('$date'), Cart_status = 1 where Cart_ID = ('$check')";
		$mysql2 = $conn->query($add_cart_order);
		if ($mysql2) {
			$mysql3 = $conn->query("Select c.Pro_ID, Pro_num, quantity from carts c inner join products p on c.Pro_ID = p.Pro_ID where Cart_ID = ('$check')");
			$result3 = mysqli_fetch_assoc($mysql3);
			$afterquan = $result3['Pro_num'] - $result3['quantity'];
			$pid = $result3['Pro_ID'];
			$mysql4 = $conn->query("Update products set Pro_num = '$afterquan'where Pro_ID = ('$pid')");
		}
	}
}
header("Location:vieworder.php");
echo("Successful");
?>