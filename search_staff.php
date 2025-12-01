<?php
	ini_set('display_errors', 1);
//Names: Anna Knowles, Madison Barrier, Leighanna Valenzuela, Malorie Leonard

if (!isset($_GET['staffName']) || empty($_GET['staffName'])) {
	echo "<h2>Please enter first or last name to search staff:</h2>";
	exit;
}

$staffName = '%' . $_GET['staffName'] . '%';

	try {
		require_once('../pdo_connect.php'); 
		$sql = 'SELECT StaffID, AreaWorking, Position, FN, LN
				FROM Staff
				WHERE FirstName LIKE ? OR LastName Like ?
				ORDER BY StaffID';

		$stmt = $dbc->prepare($sql);
		$stmt->bindParam(1, $staffName);
		$stmt->bindParam(2, $staffName);
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
    <title>Staff Search Results:</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>Search Results: </h2>
	<table>
		<tr>
			<th>Staff ID</th>
			<th>Area Working</th>
			<th>Position</th>
			<th>First Name</th>
			<th>Last Name</th>
		</tr>
	<?php foreach($result as $row) {
		echo "<tr>";
		echo "<td>".$row['StaffID']."</td>";
		echo "<td>".$row['AreaWorking']."</td>";
		echo "<td>".$row['Position']."</td>";
		echo "<td>".$row['FN']."</td>";
		echo "<td>".$row['LN']."</td>";
		echo "</tr>";
	}?> 
	</table>
</body>
</html>
