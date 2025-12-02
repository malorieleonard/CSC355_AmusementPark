<?php
	ini_set('display_errors', 1);
//Names: Anna Knowles, Madison Barrier, Leighanna Valenzuela, Malorie Leonard

	try {
		require_once('../pdo_connect.php'); 
		$sql = 'SELECT FoodStandID, CuisineType, StandName, OpenTime, ClosingTime
				FROM FoodStands
				ORDER BY FoodStandID';

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
    <title>Park Food Stands:</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>All Food Stands: </h2>
	<table>
		<tr>
			<th>Food Stand ID</th>
			<th>Cuisine Type</th>
			<th>Stand Name</th>
			<th>Open Time</th>
			<th>Closing Time</th>
		</tr>
	<?php foreach($result as $row) {
		echo "<tr>";
		echo "<td>".$row['FoodStandID']."</td>";
		echo "<td>".$row['CuisineType']."</td>";
		echo "<td>".$row['StandName']."</td>";
		echo "<td>".$row['OpenTime']."</td>";
		echo "<td>".$row['ClosingTime']."</td>";
		echo "</tr>";
	}?> 
	</table>
</body>
</html>
