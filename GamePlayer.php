<?php
//Names: Anna Knowles, Madison Barrier, LeighAnna Valenzuela, Malorie Leonard

	try{
		require_once('../pdo_connect.php'); //Connect to the database
        // SQL Query
		$sql = 'SELECT DISTINCT Guest.GuestID, Guest.FirstName, Guest.LastName, Games.GameName FROM Plays 
                JOIN Guest ON Guest.GuestID = Plays.GuestID 
                JOIN Games ON Games.GameID = Plays.GameID;
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
    <title>View Game Players:</title>
	<meta charset ="utf-8"> 
</head>
<body>
    <!-- Column names for the data-->
<h2>View Game Players: </h2>
<?php if (!empty($results)) : ?>
	<table>
		<tr>
			<th>Guest ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Game Name</th>
		</tr>
        <!-- Loop through query results for data-->
		<?php foreach($results as $row) {
			echo "<tr>";
			echo "<td>".$row['GuestID']."</td>";
			echo "<td>".$row['FirstName']."</td>";
			echo "<td>".$row['LastName']."</td>";
			echo "<td>".$row['GameName']."</td>";
			echo "</tr>";
		}?> 
	</table>
<?php else: ?>
	<p>Nothing Found.</p>
<?php endif; ?>

</body>
</html>
