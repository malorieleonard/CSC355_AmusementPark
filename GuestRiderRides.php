<?php
//Names: Anna Knowles, Madison Barrier, LeighAnna Valenzuela, Malorie Leonard

	try {
		require_once('../pdo_connect.php'); //Database connection
        // SQL Query
		$sql = 'SELECT * FROM Rides 
                JOIN Experiences ON Experiences.RideID = Rides.RideID 
                JOIN Guest ON Guest.GuestID =  Experiences.GuestID;
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
    <title>View Guests That Rode Which Rides:</title>
	<meta charset ="utf-8"> 
</head>
<body>
    <!-- Ride information to be to be displayed -->
	<h2>Guests That Rode Which Ride</h2>
	<table>
		<tr>
            <th>Ride ID</th>
			<th>Ride Name</th>
            <th>Guest ID</th>
			<th>Guest First Name</th>
			<th>Guest Last Name</th>

		</tr>
        <!-- Ride information to be gathered and looped from results of query-->
	<?php foreach($result as $row) {
		echo "<tr>";
		echo "<td>".$row['RideID']."</td>";
		echo "<td>".$row['RideName']."</td>";
        echo "<td>".$row['GuestID']."</td>";
		echo "<td>".$row['FirstName']."</td>";
		echo "<td>".$row['LastName']."</td>";

		echo "</tr>";
	}?> 
	</table>
</body>
</html>
