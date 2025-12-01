<?php
	ini_set('display_errors', 1);
//Names: Anna Knowles, Madison Barrier, Leighanna Valenzuela, Malorie Leonard

	try {
		require_once('../pdo_connect.php'); 
		$sql = 'SELECT MenuItemID, ItemName, StockQuantity, Price
				FROM MenuItem
				ORDER BY MenuItemID';

		$stmt = $dbc->prepare($sql);
		$stmt->execute();	
		$result = $stmt->fetchAll();
		
	} catch (PDOException $e){
		echo $e->getMessage();
		exit;
	}	
		
	
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Park Menu Items:</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>All Menu Items: </h2>
	<table>
		<tr>
			<th>Menu Item ID</th>
			<th>Menu Item Name</th>
			<th>Stock Quantity</th>
			<th>Item Price</th>
		</tr>
	<?php foreach($result as $row) {
		echo "<tr>";
		echo "<td>".$row['MenuItemID']."</td>";
		echo "<td>".$row['ItemName']."</td>";
		echo "<td>".$row['StockQuantity']."</td>";
		echo "<td>".$row['Price']."</td>";
		echo "</tr>";
	}?> 
	</table>
</body>
</html>
