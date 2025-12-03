<?php
//Names: Anna Knowles, Madison Barrier, LeighAnna Valenzuela, Malorie Leonard

	try {
		require_once('../pdo_connect.php'); //Database connection
        //SQL Query
		$sql = 'SELECT VisitDate, COUNT(*) AS VisitCount 
				FROM GuestVisitDate 
				GROUP BY VisitDate 
				ORDER BY VisitDate DESC;
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
    <!-- Column names for the data-->
    <title>Park Visit Head Count Per Day:</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>Park Visit Head Count Per Day:</h2>
	<table>
		<tr>
			<th>Visit Date</th>
			<th>Visit Count</th>

		</tr>
    <!-- Loop through query results for data-->
	<?php foreach($result as $row) {
		echo "<tr>";
		echo "<td>".$row['VisitDate']."</td>";
		echo "<td>".$row['VisitCount']."</td>";
		echo "</tr>";
	}?> 
	</table>
</body>
</html>
