<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Category</title>
</head>
<body>
<?php
	require_once '../login.php';
	$conn = connectDB();
	$select = "select * from Categories";
	$result = $conn->query($select);
?>
	<h1>Category Modification</h1>
	<h3>You can add new category, delete or update it.</h3>
	<br/><a href="insert_interface.php?id=cat">Insert new category</a></br>
	<br/><a href="AdminIndex.html">Back to homepage</a></br>
	<table width="600" border="1" cellspacing="3" cellpadding="3" border>
    <tr>
      <th>Category ID</th>
      <th>Category Name</th>
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
			<td><?php echo $row['Cat_ID']?></td>
			<td><?php echo $row['Cat_name']?></td>
			<td><?php echo $row['create_date']?></td>
			<td><?php echo date($row['modify_date'])?></td>
			<td><?php echo $row['isshow']?></td>
			<td><a href='delete.php?id=cat&value=<?php echo $row['Cat_ID']?>' onclick="return confirm('Are you sure you want to delete this category?');">delete</td>
			<td><a href='update_interface.php?id=cat&value=<?php echo $row['Cat_ID']?>'>update</td>
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