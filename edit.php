<?php
// including the database connection file
include_once("config.php");


if(isset($_POST['update']))
{	

	$ProductName = $_POST['Pname'];
	$Price = $_POST['Pprice'];
	$Stocks = $_POST['Pstock'];
	
	if(empty($ProductName) || empty($Price) || empty($Stocks) || empty($supplier)) {
	

		if(empty($ProductName)) {
			echo "<h4 class=\"text-danger\">Product Name field is empty.</h4><br/>";
		}
		
		if(empty($Price)) {
			echo "<h4 class=\"text-danger\">Price field is empty.</h4><br/>";
		}
		
		if(empty($Stocks)) {
			echo "<h4 class=\"text-danger\">Stocks field is empty.</h4><br/>";
		}
		
		//link to the previous page
		echo "<br/><a class=\"btn btn-primary\" href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO products(Pname, Pprice, Pstock) VALUES(:Pname, :Pprice, :Pstock)";
		$query = $dbConn->prepare($sql);
		
		$query->bindparam(':Pname', $ProductName);
		$query->bindparam(':Pprice', $Price);
		$query->bindparam(':Pstock', $Stocks);
		$query->execute();
		
		
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: home.php");
	}
}
?>
<?php
//getting id from url


//selecting data associated with this particular id
$sql = ("SELECT `Oid`, o.Pid, Pname, Pprice, Pstock FROM orders o INNER JOIN products p on o.Pid = p.Pid INNER JOIN users u on o.Uid = u.Uid");
$query = $dbConn->prepare($sql);
$query->execute(array(':Pid' => $Pid));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$Pid = $row['Pid'];
	$Pname = $row['Pname'];
	$Pprice = $row['Pprice'];
	$Pstock = $row['Pstock'];
}
?>
<html>
<head>	
</head>

<body>
	<a href="edit.php">Edit</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>ProductName</td>
				<td><input type="text" name="Pname" value="<?php echo $Pname;?>"></td>
			</tr>
			<tr> 
				<td>Price</td>
				<td><input type="text" name="Pprice" value="<?php echo $Pprice;?>"></td>
			</tr>
			<tr> 
				<td>Stocks</td>
				<td><input type="text" name="Pstock" value="<?php echo $Pstock;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="Pid" value=<?php echo $_GET['Pid'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
