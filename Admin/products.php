<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Products</title>
</head>

<body>
<?php
	require_once '../login.php';
	$conn = connectDB();
	$select = "select * from products";
	$result = $conn->query($select);
?>
	<h1>Products Modification</h1>
	<h3>You can add new Products, delete or update it.</h3>
	<br/><a href="insert_interface.php?id=pro">Insert new product</a></br>
	<a href="AdminIndex.html">Back to homepage</a></br>
	<table width="600" border="1" cellspacing="3" cellpadding="3" border>
    <tr>
      <th>Product ID</th>
      <th>Product Name</th>
	  <th>Product Description</th>
	  <th>Product Image Link</th>
	  <th>Number of Products</th>
	  <th>Product Price</th>
	  <th>Category ID</th>
      <th>Create Date</th>
      <th>Modify Date</th>
      <th>isshow</th>
      <th></th>
      <th></th>
    </tr>
    <?php if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)){
	?>
		<tr>
			<td><?php echo $row['Pro_ID']?></td>
			<td><?php echo $row['Pro_name']?></td>
			<td><?php echo $row['Pro_desc']?></td>
			<td><?php echo $row['Pro_img']?></td>
			<td><?php echo $row['Pro_num']?></td>
			<td><?php echo $row['prices']?></td>
			<td><?php echo $row['Cat_ID']?></td>
			<td><?php echo $row['create_date']?></td>
			<td><?php echo date($row['modify_date'])?></td>
			<td><?php echo $row['isshow']?></td>
			<td><a href='delete.php?id=pro&value=<?php echo $row['Pro_ID']?>&img=<?php echo $row['Pro_img']?>' onclick="return confirm('Are you sure you want to delete this product?');">delete</td>
			<td><a href='update_interface.php?id=pro&value=<?php echo $row['Pro_ID']?>'>update</td>
		</tr>
	<?php }
}   else {
	echo "0 result";
}
    mysqli_close($conn);
	?>
</table>

</body>
</html>