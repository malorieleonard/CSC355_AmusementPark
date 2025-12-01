<?php
	ini_set('display_errors', 1);
//Names: Anna Knowles, Madison Barrier, Leighanna Valenzuela, Malorie Leonard

	try {
		require_once('../pdo_connect.php'); 
		$sql = 'SELECT GuestID, DOB, LastName, FirstName
				FROM Guests
				ORDER BY GuestID';

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
    <title>Park Guests:</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>All Guests: </h2>
	<table>
		<tr>
			<th>Guest ID</th>
			<th>Guest Date of Birth</th>
			<th>Guest Last Name</th>
			<th>Guest First Name</th>
		</tr>
	<?php foreach($result as $row) {
		echo "<tr>";
		echo "<td>".$row['GuestID']."</td>";
		echo "<td>".$row['DOB']."</td>";
		echo "<td>".$row['LastName']."</td>";
		echo "<td>".$row['FirstName']."</td>";
		echo "</tr>";
	}?> 
	</table>
</body>
</html>
