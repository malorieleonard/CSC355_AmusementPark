<?php
ini_set('display_errors', 1);
//Names: Anna Knowles, Madison Barrier, Leighanna Valenzuela, Malorie Leonard

require_once('../pdo_connect.php'); 

if (isset($_GET['guestName']) && !empty(trim($_GET['guestName']))) {
	$guestName = '%' . trim($_GET['guestName']) . '%';

	try {
		$sql = 'SELECT GuestID, DOB, LastName, FirstName
				FROM Guest
				WHERE FirstName LIKE ? OR LastName Like ?
				ORDER BY GuestID';

		$stmt = $dbc->prepare($sql);
		$stmt->bindParam(1, $guestName);
		$stmt->bindParam(2, $guestName);
		$stmt->execute();	
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
	} catch (PDOException $e){
		echo "No Guests Match that Name!" . $e->getMessage();
		exit;
	}	
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
<?php if (!empty($results)) : ?>
	<table>
		<tr>
			<th>Guest ID</th>
			<th>Date of Birth</th>
			<th>Last Name</th>
			<th>First Name</th>
		</tr>
		<?php foreach($results as $row) {
			echo "<tr>";
			echo "<td>".$row['GuestID']."</td>";
			echo "<td>".$row['DOB']."</td>";
			echo "<td>".$row['LastName']."</td>";
			echo "<td>".$row['FirstName']."</td>";
			echo "</tr>";
		}?> 
	</table>
<?php else: ?>
	<p> No results found. Try another nam.</p>
<?php endif; ?>

</body>
</html>
