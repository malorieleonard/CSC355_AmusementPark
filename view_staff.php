<?php
	ini_set('display_errors', 1);
//Names: Anna Knowles, Madison Barrier, Leighanna Valenzuela, Malorie Leonard

	try {
		require_once('../pdo_connect.php'); 
		$sql = 'SELECT StaffID, AreaWorking, Position, FN, LN
				FROM Staff
				ORDER BY StaffID';

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
    <title>Park Staff:</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>All Staff: </h2>
	<table>
		<tr>
			<th>Staff ID</th>
			<th>Area Working</th>
			<th>Staff Position</th>
			<th>Staff First Name</th>
			<th>Staff Last Name</th>
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
