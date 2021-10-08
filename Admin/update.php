<?php
date_default_timezone_set ("Asia/Ho_Chi_Minh");
require_once '../login.php';
$conn = connectDB();
if (isset($_POST['catname'])){
	$id = $_POST['catid'];
	$cn = $_POST['catname'];
	$date = date('Y/m/d h:i:s ', time());
	if ($_POST['show'] == true) {$show = 1;}
	else {$show = 0;}
	$update = "update Categories set Cat_name = ('$cn'), modify_date = ('$date'), isshow = ('$show') where Cat_ID = ('$id')";
	$result = $conn->query($update);
	if (!$result) { echo "Error: ".$conn->error."<br/>";}
	else {header("Location:category.php");}
} 
elseif (isset($_POST['proname'])){
	$pid = $_POST['proid'];
	$pn = $_POST['proname'];
	$date = date('Y/m/d h:i:s ', time());
	$procat = $_POST['catpro'];
	$num = $_POST['numofpro'];
	$price = $_POST['price'];
	$desc = $_POST['prodesc'];
	$catverify = "select Cat_ID from categories where Cat_name = ('$procat')";
	$result1 =  $conn->query($catverify);
	$catid = mysqli_fetch_assoc($result1)['Cat_ID'];
	$olfproimg = $_POST['proimg'];
	if ($_POST['show'] == true) {$show = 1;}
	else {$show = 0;}
	if (file_exists($_FILES['proimg']['tmp_name']) || (is_uploaded_file($_FILES['proimg']['tmp_name']))){
		$imgname = $_FILES['proimg']['name'];
		move_uploaded_file($_FILES['proimg']['tmp_name'], "proimg/$imgname" );
		$img = "proimg/$imgname";
		unlink($oldproimg);
	}
	else {$img = $olfproimg;}
	$update = "update products set Pro_name = ('$pn'), modify_date = ('$date'), isshow = ('$show'), Cat_ID = ('$catid'), Pro_num = ('$num'), Pro_img = ('$img'), Pro_desc = ('$desc'), prices = ('$price') where Pro_ID = ('$pid')";
	$result = $conn->query($update);
	if (!$result) { echo "Error: ".$conn->error."<br/>";}
	else {
		header("Location:products.php");
	}
}
elseif(isset($_GET['id'])){
	$id = $_GET['id'];
	$ban = $_GET['value'];
	if ($ban == "ban") {$isban = 1;} else {$isban = 0;}
	$date = date('Y/m/d h:i:s ', time());
	$update = "update customers set isbanned = ('$isban'), MODIFY_date = ('$date') where Cus_ID = ('$id')";
	$result = $conn->query($update);
	if (!$result) { echo "Error: ".$conn->error."<br/>";}
	else {
		header("Location:customer.php");
	}
}
elseif(isset($_POST['cusid'])){
	$cusid = $_POST['cusid']; 
	$pwd1 = $_POST['cuspwd'];
	$pwd = $_POST['newpwd'];
	$date = date('Y/m/d h:i:s ', time());
	$cusname = $_POST['cusname'];
	$email = $_POST['cusemail'];
	$address = $_POST['cusadd'];
	$cusphone = $_POST['cusphone'];
	$cusdob = $_POST['cusdob'];
	$check = $conn->query("Select Cus_password from customers where Cus_ID = ('$cusid')");
	$checkresult = mysqli_fetch_assoc($check);
	if ($pwd1 !== $checkresult['Cus_password'] ) { 
		header("Location:../customerupdate.php?status=fpd");
	}
	else if ($pwd1 == $pwd){
		header("Location:../customerupdate.php?status=fpd1");
	}
	else { 
		$update = "update customers set  Cus_password = ('$pwd'), Cus_name = ('$cusname'), MODIFY_date = ('$date'), Cus_email = ('$email'), Cus_Phone = ('$cusphone'), Cus_DOB = ('$cusdob') where Cus_ID = ('$cusid')";
		$result = $conn->query($update);
		if (!$result) { echo "Error: ".$conn->error."<br/>";}
		else {
			header("Location:../customerinfo.php");
		}
	}
}
elseif(isset($_GET['caid'])){
	$cartid = $_GET['caid'];
	$quan = $_GET['value'];
	$update = "update carts set quantity = ('$quan') where Cart_ID = ('$cartid')";
	$result = $conn->query($update);
	if (!$result) { echo "Error: ".$conn->error."<br/>";}
	else {
		header("Location:../Cart.php");
	}
}
elseif(isset($_POST['ordid'])){
	$oid = $_POST['ordid'];
	if ($_POST['status'] == true ) {$ship = 1;} else {$ship = 0;}
	if ($_POST['show'] == true ) {$view = 1;} else {$view = 0;}
	$shipdate = $_POST['shipdate'];
	$upord = $conn->query("update orders set Ord_status = ('$ship'), isview = ('$view'), Ship_time = ('$shipdate') where Ord_ID = ('$oid')");
	if (!$upord) { echo "Error: ".$conn->error."<br/>";}
	else {
		header("Location:orders.php");
	}
	
}

mysqli_close($conn);
?>