<?php
//Names: Anna Knowles, Madison Barrier, LeighAnna Valenzuela, Malorie Leonard

	try{
		require_once('../pdo_connect.php'); //Connect to the database
        // SQL Query
		$sql = 'SELECT C1.StaffID AS Person1, 
				C2.StaffID AS Person2, 
				C1.FoodStandID FROM FoodOperates C1 
				JOIN FoodOperates C2 
				ON C1.FoodStandID = C2.FoodStandID 
				AND C1.StaffID < C2.StaffID;

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
    <title>View Staff Working at The Same Food Stands (By ID):</title>
	<meta charset ="utf-8"> 
</head>
<body>
    <!-- Column names for the data-->
<h2>Staff IDs at the Same Food Stand: </h2>
<?php if (!empty($results)) : ?>
	<table>
		<tr>
			<th>Staff ID 1</th>
			<th>Staff ID 2</th>
			<th>Food Stand ID</th>
		</tr>
        <!-- Loop through query results for data-->
		<?php foreach($results as $row) {
			echo "<tr>";
			echo "<td>".$row['Person1']."</td>";
			echo "<td>".$row['Person2']."</td>";
			echo "<td>".$row['FoodStandID']."</td>";
			echo "</tr>";
		}?> 
	</table>
<?php else: ?>
	<p>Nothing Found.</p>
<?php endif; ?>

</body>
</html>
