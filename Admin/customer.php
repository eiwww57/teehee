<?php
	require_once '../login.php';
	$conn = connectDB();
	$select = "select * from customers";
	$result = $conn->query($select);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Customers View</title>
</head>
<body>
	<h1>Customers View</h1>
	<h3>You can view your customers information</h3>
	<br/><a href="AdminIndex.html">Back to homepage</a></br>
	<table width="600" border="1" cellspacing="3" cellpadding="3" border>
    <tr>
      <th>Customer ID</th>
      <th>Customer Name</th>
      <th>Customer Username</th>
      <th>Customer Email</th>
	  <th>Customer Phone</th>
	  <th>Customer Address</th>
	  <th>Customer Date of Birth</th>
	  <th>Create date</th>
	  <th>Modify date</th>
      <th>isbanned</th>
      <th></th>
      <th></th>
    </tr>
    <?php if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)){
	?>
		<tr>
			<td><?php echo $row['Cus_ID']?></td>
			<td><?php echo $row['Cus_name']?></td>
			<td><?php echo $row['Cus_username']?></td>
			<td><?php echo $row['Cus_email']?></td>
			<td><?php echo $row['Cus_Phone']?></td>
			<td><?php echo $row['Cus_address']?></td>
			<td><?php echo $row['Cus_DOB']?></td>
			<td><?php echo $row['create_date']?></td>
			<td><?php echo ($row['MODIFY_date'])?></td>
			<td><?php echo $row['isbanned']?></td>
			<?php if ($row['isbanned']==1) { $ban = "unban"; } else { $ban = "ban";} ?>
			<td><a href='delete.php?id=cus&value=<?php echo $row['Cus_ID']?>'>Delete</td>
			<td><a href='update.php?id=<?php echo $row['Cus_ID'] ?>&value=<?php echo $ban ?>'><?php echo $ban ?></td>
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