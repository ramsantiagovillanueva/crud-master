<html>
<head>
		<title>Product Status</title>
<!-- bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
<div class="container">
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$ProductName = $_POST['Pname'];
	$Price = $_POST['Pprice'];
	$Stocks = $_POST['Pstock'];
	// checking empty fields
	if(empty($ProductName) || empty($Price) || empty($Stocks)) {
				
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
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<h2 class=\"text-success\">Data added successfully.</h2>";
		echo "<br/><h2 class=\"text-success\"><a href='index.php'>View Result</a></h2>";
	}
}

?>
</div>
</body>
</html>
