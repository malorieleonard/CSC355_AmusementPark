<?php
	ini_set ('error_reporting', 1); //Turns on error reporting - remove once everything works.
	
	try{
		require_once('../pdo_connect.php'); //Connect to the database
		$sql = 'SELECT MenuItem.MenuItemID, MenuItem.ItemName, 
                COUNT(Purchase.GuestID) AS PurchaseCount 
                FROM Purchase 
                JOIN MenuItem ON Purchase.MenuItemID = MenuItem.MenuItemID 
                GROUP BY MenuItem.ItemName, MenuItem.MenuItemID;
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
    <title>Menu Item Purchase Count:</title>
	<meta charset ="utf-8"> 
</head>
<body>

<h2>Menu Item Purchase Count Results: </h2>
<?php if (!empty($results)) : ?>
	<table>
		<tr>
			<th>Menu Item ID</th>
			<th>Item Name</th>
			<th>Purchase Counr</th>
		</tr>
		<?php foreach($results as $row) {
			echo "<tr>";
			echo "<td>".$row['MenuItemID']."</td>";
			echo "<td>".$row['ItemName']."</td>";
			echo "<td>".$row['PurchaseCount']."</td>";
			echo "</tr>";
		}?> 
	</table>
<?php else: ?>
	<p>Nothing Found.</p>
<?php endif; ?>

</body>
</html>
