<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
require_once '../login.php';
$conn = connectDB();
if ($_GET['id']=="cat"){ 
	$id = $_GET['value'];
	$select = "select * from Categories where Cat_ID = ('$id')";
	$result = $conn->query($select);
	while ($row = mysqli_fetch_assoc($result)){
		 $catname = $row['Cat_name'];
		 $isshow = $row['isshow'];
	}
} elseif ($_GET['id']=="pro") {
	$proid = $_GET['value'];
	$select = "select * from products where Pro_ID = ('$proid')";
	$result = $conn->query($select);
	while ($row = mysqli_fetch_assoc($result)){
		 $proname = $row['Pro_name'];
		 $img = $row['Pro_img'];
		 $num = $row['Pro_num'];
		 $catid = $row['Cat_ID'];
		 $isshow = $row['isshow'];
		 $desc = $row['Pro_desc'];
		 $price = $row['prices'];
	}
	$selectpro = "SELECT * FROM categories";
	$result1 = $conn->query($selectpro);
}
?>
	<?PHP if ($_GET['id'] == "cat") { ?>
	<h1>UPDATE INTERFACE</h1>
	<form action="update.php" method="post">
	<input type="hidden" name="catid" value="<?php echo $id ?>">
	<table width="400" border="0" cellspacing="3" cellpadding="3">
	<tr>
      <td>Category ID</td>
	  <td><?php echo $id ?></td>
    </tr>
    <tr>
      <td>Category Name</td>
      <td><input type="text" name="catname" value="<?php echo $catname ?> "></td>
    </tr>
    <tr>
      <td>Isshow</td>
      <?php if ($isshow == "1") { ?>
      <td><input checked type="checkbox" name="show"></td>
	  <?php } else { ?>
	  <td><input type="checkbox" name="show"></td>
	  <?php } ?>
    </tr>
    <tr>
      <td><input type="reset" value="Cancel"></td>
      <td><input type="submit" value="Submit"></td>
    </tr>
</table>
	</form>
	<?php } elseif ($_GET['id'] == "pro") { ?>
	<h1>UPDATE PRODUCT INTERFACE</h1>
	<img src="<?php echo $img ?>" width="400" height="300">
	<form action="update.php" method="post" enctype="multipart/form-data" id="updateform">
	<input type="hidden" name="proid" value="<?php echo $proid ?>">
	<input type="hidden" name="proimg" value="<?php echo $img ?>">
	<table width="400" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td>Product ID: </td>
	  <td><?php echo $proid ?></td>
    </tr>
	<tr>
      <td>Product Name</td>
      <td><input type="text" name="proname" value="<?php echo $proname ?>"></td>
    </tr>
	<tr>
      <td>Product Description</td>
      <td><textarea rows="5" cols="50" name="prodesc" form="updateform"><?php echo $desc ?></textarea></td>
    </tr>
	<tr>
      <td>Product Price</td>
      <td><input type="text" name="price" value="<?php echo $price ?>"></td>
    </tr>
	<tr>
	<tr>
      <td>Change Image</td>
      <td><input type="file" name="proimg"></td>
    </tr>
    <tr>
      <td>Isshow</td>
	  <?php if ($isshow == "1") { ?>
      <td><input checked type="checkbox" name="show"></td>
	  <?php } else { ?>
	  <td><input type="checkbox" name="show"></td>
	  <?php } ?>
    </tr>
	<tr>
      <td>Number of products</td>
      <td><input type="text" name="numofpro" value="<?php echo $num ?>"></td>
    </tr>
	<tr>
      <td>Category</td>
      <td><select name="catpro">
		  <?php if (mysqli_num_rows($result1) > 0) {
		  while ($row1 = mysqli_fetch_assoc($result1)){
		  ?> 
		  <?php if ($row1['Cat_ID'] !== $catid) { ?>
   	 	  	<option value="<?php echo $row1['Cat_name'] ?>"><?php echo $row1['Cat_name'];?></option>
		  <?php } else { ?>
		  	<option selected value="<?php echo $row1['Cat_name'] ?>"><?php echo $row1['Cat_name'];?></option>
		  <?php } } } ?>
		  </select>
	  </td>
    </tr>
    <tr>
      <td><input type="reset" value="Cancel"></td>
      <td><input type="submit" value="Submit"></td>
    </tr>
</table>
	</form>
	<?php } elseif ($_GET['id']=="ord") { $oid = $_GET['value']; ?>
	<h1>UPDATE INTERFACE</h1>
	<?php 
	$orders = $conn->query("Select * from orders where Ord_ID = ('$oid')");
	$oresult = mysqli_fetch_assoc($orders)
	?>
	<form action="update.php" method="post">
	<input type="hidden" name="ordid" value="<?php echo $oid ?>">
	<table width="400" border="0" cellspacing="3" cellpadding="3">
	<tr>
      <td>Ord ID</td>
	  <td><?php echo $oid ?></td>
    </tr>
    <tr>
      <td>isshipped:</td>
      <?php if ($oresult['Ord_status'] == "1") { ?>
      <td><input checked type="checkbox" name="status"></td>
	  <?php } else { ?>
	  <td><input type="checkbox" name="status"></td>
	  <?php } ?>
    </tr>
    <tr>
      <td>Isview</td>
      <?php if ($oresult['isview'] == "1") { ?>
      <td><input checked type="checkbox" name="show"></td>
	  <?php } else { ?>
	  <td><input type="checkbox" name="show"></td>
	  <?php } ?>
    </tr>
	<tr>
      <td>Ship date:</td>
	  <td><input type="date" name="shipdate" value="<?php echo $oresult['Ship_time'] ?>" ></td>
    </tr>
    <tr>
      <td><input type="reset" value="Cancel"></td>
      <td><input type="submit" value="Submit"></td>
    </tr>
</table>
	</form>
	<?php } ?>
</body>
</html>
<?php mysqli_close($conn); ?>
