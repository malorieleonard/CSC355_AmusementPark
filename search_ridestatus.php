<?php
	ini_set('display_errors', 1);
//Names: Anna Knowles, Madison Barrier, Leighanna Valenzuela, Malorie Leonard

if (!isset($_GET['status']) || empty($_GET['status'])) {
	echo "<h2>Please select a status to search:</h2>";
	exit; 
}

$status = '%' . $_GET['status'] . '%';

	try {
		require_once('../pdo_connect.php'); 
		$sql = 'SELECT RideID, RequiredHeight, RideName, ThrillLevel, Status, Capacity
				FROM Rides
				WHERE Status = ?
				ORDER BY RideID';

		$stmt = $dbc->prepare($sql);
		$stmt->bindParam(1, $status);
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
    <title>Status Search Results:</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>Ride Status Results: </h2>
	<table>
		<tr>
			<th>Ride ID</th>
			<th>Required Height</th>
			<th>Ride Name</th>
			<th>Thrill Level</th>
			<th>Status</th>
			<th>Capacity</th>
		</tr>
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
