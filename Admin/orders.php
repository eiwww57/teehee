<?php 
	require_once '../login.php';
	$conn = connectDB();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
	
<body>
	<h1>View all orders</h1>
	<br/><a href="AdminIndex.html">Back to homepage</a></br>
	<table width="100%" border="1" cellspacing="3" cellpadding="5">
			  <tbody>
				<tr>
				  <th>No.</th>
				  <th>Order Date</th>
				  <th>Customer ID</th>
				  <th>Products</th>
				  <th>Ship time</th>
				  <th>Total</th>
				  <th>Status</th>
				  <th>Isview</th>
				  <th></th>
				</tr>
				<?php $i = 0;
				$select = "SELECT DISTINCT o.Ord_ID, totalprice, Ord_status, Cus_ID, isview, Ship_time from orders o inner join carts c on o.Ord_ID = c.Ord_ID";
				$selectresult = $conn->query($select);
				while ($row1 = mysqli_fetch_assoc($selectresult)) {
					$i++;
					$oid = $row1['Ord_ID'];
					$selectresult2 = $conn->query("Select * from carts c inner join products p on c.Pro_ID = p.Pro_ID where Ord_ID = ('$oid')"); ?>				    	
				<tr>
				  <td style="text-align: center"><?php echo $i ?></td>
				  <td width="100" ><?php echo $oid?></td>
				  <td><?php echo $row1['Cus_ID'] ?></td>
				  <td width="700" ><table cellpadding="10" cellspacing="5" >
					  <?php while ($row2 = mysqli_fetch_assoc($selectresult2)) { ?>
					  <tr>
						<td><?php echo "Name: " ?></td>
					  	<td><?php echo $row2['Pro_name']?></td>
					 	<td><?php echo "Quantity: " ?></td>
					  	<td><?php echo $row2['quantity'] ?></td>
					  	<td><?php echo "Price: " ?></td>
					  	<td><?php echo $row2['prices']*$row2['quantity']?> VND</td>
					  </tr> <?php } ?> </table></td>
				  <td width="100"><?php echo $row1['Ship_time'] ?></td>
				  <td><?php echo $row1['totalprice'] ?> VND</td>
				  <td><?php if ($row1['Ord_status']==0){ echo "on progress";} else {echo "finished";} ?> </td>
				  <td><?php if ($row1['isview']==0){ echo "hidden";} else {echo "viewable";} ?> </td>
				  <td><a href='update_interface.php?id=ord&value=<?php echo $row1['Ord_ID']?>'>update</a></td>
				</tr>
				<?php } ?>
			  </tbody>
			</table>
</body>
</html>