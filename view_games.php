<?php
	ini_set('display_errors', 1);
//Names: Anna Knowles, Madison Barrier, Leighanna Valenzuela, Malorie Leonard

	try {
		require_once('../pdo_connect.php'); 
		$sql = 'SELECT GameID, MinimumAge, Status, GameName, PlayersAmount
				FROM Games
				ORDER BY GameID';

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
    <title>Park Games:</title>
	<meta charset ="utf-8"> 
</head>
<body>
	<h2>All Games: </h2>
	<table>
		<tr>
			<th>Game ID</th>
			<th>Minimum Age</th>
			<th>Game Status</th>
			<th>Game Name</th>
			<th>Players Amount</th>
		</tr>
	<?php foreach($result as $row) {
		echo "<tr>";
		echo "<td>".$row['GameID']."</td>";
		echo "<td>".$row['MinimumAge']."</td>";
		echo "<td>".$row['Status']."</td>";
		echo "<td>".$row['GameName']."</td>";
		echo "<td>".$row['PlayersAmount']."</td>";
		echo "</tr>";
	}?> 
	</table>
</body>
</html>
