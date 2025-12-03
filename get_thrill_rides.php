<?php
ini_set('display_errors', 1);

if(isset($_GET['submit'])) {
    $minThrill = intval($_GET['minThrill']); // Convert user input to integer 

    try {
        require_once('../pdo_connect.php');  // Connect to database
		
		// Call stored procedure with parameter 
        $sql = 'CALL GetThrillRides(:minThrill)';
        $stmt = $dbc->prepare($sql);
        $stmt->bindParam(':minThrill', $minThrill, PDO::PARAM_INT);
        $stmt->execute();

        $rides = $stmt->fetchAll(PDO::FETCH_ASSOC); // Get all results 

        if(count($rides) == 0) {  // No rides found 
            echo "No rides found with thrill level >= $minThrill.";
            exit;
        }
    } catch(PDOException $e) {
        echo $e->getMessage(); // Show DB error 
        exit;
    }
} else {
    echo "<h2>You have reached this page in error</h2>"; // Direct access without form 
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thrill Rides Result</title>
</head>
<body>
<h2>Thrill Rides with Minimum Level <?php echo htmlspecialchars($minThrill); ?></h2>
<table border="1" cellpadding="8">
    <tr>
        <th>RideID</th>
        <th>RideName</th>
        <th>ThrillLevel</th>
        <th>Capacity</th>
    </tr>
<?php foreach($rides as $row): ?>
    <tr>
        <td><?php echo htmlspecialchars($row['RideID']); ?></td>
        <td><?php echo htmlspecialchars($row['RideName']); ?></td>
        <td><?php echo htmlspecialchars($row['ThrillLevel']); ?></td>
        <td><?php echo htmlspecialchars($row['Capacity']); ?></td>
    </tr>
<?php endforeach; ?>
</table>
<br>
<a href="get_thrill_rides.html">Back</a>
</body>
</html>

