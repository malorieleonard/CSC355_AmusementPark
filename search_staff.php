<?php
ini_set('display_errors', 1);
//Names: Anna Knowles, Madison Barrier, Leighanna Valenzuela, Malorie Leonard

require_once('../pdo_connect.php'); 

if (isset($_GET['staffName']) && !empty(trim($_GET['staffName']))) {
	$staffName = '%' . trim($_GET['staffName']) . '%';

	try {
		$sql = 'SELECT StaffID, AreaWorking, Position, FN, LN
				FROM Staff
				WHERE FN LIKE ? OR LN Like ?
				ORDER BY StaffID';

		$stmt = $dbc->prepare($sql);
		$stmt->execute([$staffName, $staffName]);	
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
	} catch (PDOException $e){
		echo "Database error!" . $e->getMessage();
		exit;
	}
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
<?php if (!empty($results)) : ?>
	<table>
		<tr>
			<th>Staff ID</th>
			<th>Area Working</th>
			<th>Position</th>
			<th>First Name</th>
			<th>Last Name</th>
		</tr>
		<?php foreach($results as $row) {
			echo "<tr>";
			echo "<td>".$row['StaffID']."</td>";
			echo "<td>".$row['AreaWorking']."</td>";
			echo "<td>".$row['Position']."</td>";
			echo "<td>".$row['FN']."</td>";
			echo "<td>".$row['LN']."</td>";
			echo "</tr>";
		}?> 
	</table>
<?php else: ?>
	<p>No results found. Try another name.</p>
<?php endif; ?>

</body>
</html>
