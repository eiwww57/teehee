<?php
date_default_timezone_set ("Asia/Ho_Chi_Minh");
session_start();
require_once '../login.php';
$conn = connectDB();
if (isset($_POST['catname'])){
	$cn = $_POST['catname'];
	$date = date('Y/m/d h:i:s ', time());
	if ($_POST['show'] == true) {$show = 1;}
	else {$show = 0;}
	$insert = "insert into Categories(Cat_name, create_date, isshow) values ('$cn','$date','$show')";
	$result = $conn->query($insert);
	if (!$result) { echo "Error: ".$conn->error."<br/>";}
	else {header("Location:category.php");}
} 
elseif (isset($_POST['proname'])){
	$pn = $_POST['proname'];
	$date = date('Y/m/d h:i:s ', time());
	$procat = $_POST['catpro'];
	$num = $_POST['numofpro'];
	$price = $_POST['price'];
	$desc = $_POST['prodesc'];
	$catverify = "select Cat_ID from categories where Cat_name = ('$procat')";
	$result1 =  $conn->query($catverify);
	$catid = mysqli_fetch_assoc($result1)['Cat_ID'];
	if ($_POST['show'] == true) {$show = 1;}
	else {$show = 0;}
	if ($_FILES){
		$imgname = $_FILES['proimg']['name'];
		move_uploaded_file($_FILES['proimg']['tmp_name'], "proimg/$imgname" );
	}
	$img = "proimg/$imgname";
	$insert = "insert into Products(Pro_name, Pro_img, Pro_num, Cat_ID, create_date, isshow, Pro_desc, prices) values ('$pn','$img','$num','$catid','$date','$show','$desc','$price')";
	$result = $conn->query($insert);
	if (!$result) { echo "Error: ".$conn->error."<br/>";}
	else {header("Location:products.php");}
} 
elseif (isset($_POST['usname'])){
	$username = $_POST['usname'];
	$pwd = $_POST['cuspwd'];
	$pwd1 = $_POST['cuspwd1'];
	$date = date('Y/m/d h:i:s ', time());
	$cusname = $_POST['cusname'];
	$email = $_POST['cusemail'];
	$address = $_POST['cusadd'];
	$cusphone = $_POST['cusphone'];
	$cusdob = $_POST['cusdob'];
	$insert_account = "insert into customers(Cus_username, Cus_password, Cus_name, Cus_address, Cus_Phone, Cus_email, create_date, Cus_DOB) values ('$username','$pwd','$cusname','$address','$cusphone','$email','$date','$cusdob')";
	if ($pwd == $pwd1) {
		$result = $conn->query($insert_account);
		if (!$result) { header("Location:../Signup.php?status=fus");}
		else {header("Location:../User_login.php");}
	}
	else { header("Location:../Signup.php?status=fpd");}
}
mysqli_close($conn);
?>