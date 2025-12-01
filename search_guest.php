<?php
	ini_set('display_errors', 1);
//Names: Anna Knowles, Madison Barrier, Leighanna Valenzuela, Malorie Leonard

if (!isset($_GET['guestName']) || empty($_GET['guestName'])) {
	echo "<h2>Please enter first or last name to search guests:</h2>";
	exit;
}

$guestName = '%' . $_GET['guestName'] . '%';

	try {
		require_once('../pdo_connect.php'); 
		$sql = 'SELECT GuestID, DOB, LastName, FirstName
				FROM Guest
				WHERE FirstName LIKE ? OR LastName Like ?
				ORDER BY GuestID';

		$stmt = $dbc->prepare($sql);
		$stmt->bindParam(1, $guestName);
		$stmt->bindParam(2, $guestName);
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
    <title>Guest Search Results:</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>Search Results: </h2>
	<table>
		<tr>
			<th>Guest ID</th>
			<th>Date of Birth</th>
			<th>Last Name</th>
			<th>First Name</th>
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
