<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$result = $dbConn->query("SELECT `Oid`, o.Pid, Pname, Pdesc, Pprice, Pstock FROM orders o INNER JOIN products p on o.Pid = p.Pid INNER JOIN users u on o.Uid = u.Uid");

?>

<html>
	
<head>	
</head>

<body>

<a href="Add.html">Add New Product</a><br/><br/>
	<table width='70%' border=0>
	<tr bgcolor='#CCCCCC'>
		<td>ProductName</td>
		<td>Price</td>
		<td>Pdesc</td>
		<td>Stocks</td>
		<td>Update</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['Pname']."</td>";
		echo "<td>".$row['Pprice']."</td>";
		echo "<td>".$row['Pdesc']."</td>";
		echo "<td>".$row['Pstock']."</td>";	
		echo "<td><a href=\"edit.php?id=$row[Pid]\">Edit</a> | <a href=\"delete.php?id=$row[Pid]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
