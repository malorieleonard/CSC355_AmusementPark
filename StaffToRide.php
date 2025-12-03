<?php
//Names: Anna Knowles, Madison Barrier, LeighAnna Valenzuela, Malorie Leonard

	try{
		require_once('../pdo_connect.php'); //Connect to the database
        // SQL Query
		$sql = 'SELECT * FROM RidesOperates
                JOIN Staff ON Staff.StaffID = RidesOperates.StaffID;
                ';
		$result = $dbc-> query($sql);
        $results = $result->fetchAll(PDO::FETCH_ASSOC);
	} catch (PDOException $e){
		echo $e->getMessage();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Ride Operators:</title>
	<meta charset ="utf-8"> 
</head>
<body>
    <!-- Column names for the data-->
<h2>Search Ride Operators: </h2>
<?php if (!empty($results)) : ?>
	<table>
		<tr>
			<th>Staff ID</th>
			<th>FN</th>
			<th>LN</th>
			<th>Ride ID</th>
			<th>Ride Name</th>
		</tr>
        <!-- Loop through query results for data-->
		<?php foreach($results as $row) {
			echo "<tr>";
			echo "<td>".$row['StaffID']."</td>";
			echo "<td>".$row['FN']."</td>";
			echo "<td>".$row['LN']."</td>";
			echo "<td>".$row['RideID']."</td>";
			echo "<td>".$row['AreaWorking']."</td>";
			echo "</tr>";
		}?> 
	</table>
<?php else: ?>
	<p>Nothing Found.</p>
<?php endif; ?>

</body>
</html>
