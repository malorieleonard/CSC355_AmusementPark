<?php
//Names: Anna Knowles, Madison Barrier, LeighAnna Valenzuela, Malorie Leonard

	try {
		require_once('../pdo_connect.php'); //Database connection
        //SQL Query
		$sql = 'SELECT FoodStandID, 
			COUNT(*) AS NumberOfSales FROM Sells 
			GROUP BY FoodStandID 
			ORDER BY NumberOfSales DESC;
';

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
    <title>Sales Per Food Stand:</title>
	<meta charset ="utf-8"> 
</head>
<body>
    <!-- Column names for the data-->
	<h2>Sales Per Food Stand</h2>
	<table>
		<tr>
			<th>Food Stand Number</th>
			<th>Number Of Sales</th>

		</tr>
    <!-- Loop through query results for data-->
	<?php foreach($result as $row) {
		echo "<tr>";
		echo "<td>".$row['FoodStandID']."</td>";
		echo "<td>".$row['NumberOfSales']."</td>";
		echo "</tr>";
	}?> 
	</table>
</body>
</html>
