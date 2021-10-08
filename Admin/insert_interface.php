<?php
	require_once '../login.php';
	$conn = connectDB();
	$selectpro = "SELECT * FROM categories";
	$result = $conn->query($selectpro);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php if($_GET['id']== "cat") {
	?>
	<h1>INSERT INTERFACE</h1>
	<form action="insert.php" method="post">
	<table width="400" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td>Category Name</td>
      <td><input type="text" name="catname"></td>
    </tr>
    <tr>
      <td>Isshow</td>
      <td><input type="checkbox" name="show"></td>
    </tr>
    <tr>
      <td><input type="reset" value="Cancel"></td>
      <td><input type="submit" value="Submit"></td>
    </tr>
</table>
	</form>
	<?php } elseif ($_GET['id']=="pro") { ?>
	<h1>INSERT PRODUCT INTERFACE</h1>
	<form action="insert.php" method="post" enctype="multipart/form-data" id="insertform">
	<table width="400" border="0" cellspacing="3" cellpadding="3">
    <tr>
      <td>Product Name</td>
      <td><input type="text" name="proname"></td>
    </tr>
	<tr>
      <td>Product Description</td>
      <td><textarea rows="5" cols="50" name="prodesc" form="insertform"></textarea></td>
    </tr>
	<tr>
      <td>Product Price</td>
      <td><input type="text" name="price"></td>
    </tr>
	<tr>
      <td>Product Image</td>
      <td><input type="file" name="proimg"></td>
    </tr>
    <tr>
      <td>Isshow</td>
      <td><input type="checkbox" name="show"></td>
    </tr>
	<tr>
      <td>Number of products</td>
      <td><input type="text" name="numofpro"></td>
    </tr>
	<tr>
      <td>Category</td>
      <td><select name="catpro">
		  <?php if (mysqli_num_rows($result) > 0) {
		  while ($row = mysqli_fetch_assoc($result)){
		  ?>
   	 	  	<option value="<?php echo $row['Cat_name'] ?>"><?php echo $row['Cat_name']; ?></option>
		  <?php } } ?>
		  </select>
		  <?php mysqli_close($conn); ?>
	  </td>
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
