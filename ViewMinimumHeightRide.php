<?php
//Names: Anna Knowles, Madison Barrier, Leighanna Valenzuela, Malorie Leonard

	try { 
		require_once('../pdo_connect.php'); //Database connection
        // SQL Query
		$sql = 'SELECT * FROM Rides 
				WHERE RequiredHeight = 
				(SELECT MIN(RequiredHeight) 
				FROM Rides);
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
    <title>Ride With Minimum Height:</title>
	<meta charset ="utf-8"> 
</head>
<body>
    <!-- Column names for the data-->
	<h2>Ride With Minimum Height:</h2>
	<table>
		<tr>
			<th>Ride ID</th>
			<th>Required Height</th>
			<th>Ride Name</th>
			<th>Thrill Level</th>
			<th>Status</th>
			<th>Capacity</th>

		</tr>
    <!-- Loop through query results for data-->
	<?php foreach($result as $row) {
		echo "<tr>";
		echo "<td>".$row['RideID']."</td>";
		echo "<td>".$row['RequiredHeight']."</td>";
		echo "<td>".$row['RideName']."</td>";
		echo "<td>".$row['ThrillLevel']."</td>";
		echo "<td>".$row['Status']."</td>";
		echo "<td>".$row['Capacity']."</td>";
		echo "</tr>";
	}?> 
	</table>
</body>
</html>
