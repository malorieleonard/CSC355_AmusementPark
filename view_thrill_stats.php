<?php

ini_set('display_errors', 1);

require_once('../pdo_connect.php');

try {

    $sql = "SELECT ThrillLevel, 
                   GROUP_CONCAT(RideName SEPARATOR ', ') AS RideNames, 
                   AVG(Capacity) AS AverageCapacity 
            FROM Rides 
            GROUP BY ThrillLevel 
            HAVING AVG(Capacity) > 14";

    $stmt = $dbc->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thrill Stats Report</title>
    <meta charset="utf-8">
    <style>table, th, td { border: 1px solid black; border-collapse: collapse; padding: 10px; }</style>
</head>
<body>

    <h2>High Capacity Thrill Rides</h2>

    <?php if (!empty($results)) : ?>
        <table>
            <tr>
                <th>Thrill Level</th>
                <th>Ride Names</th> 
                <th>Avg Capacity</th>
            </tr>
            <?php foreach($results as $row) {
                echo "<tr>";
                echo "<td>" . $row['ThrillLevel'] . "</td>";
                
                echo "<td>" . $row['RideNames'] . "</td>"; 
                
                echo "<td>" . number_format($row['AverageCapacity'], 1) . "</td>";
                echo "</tr>";
            } ?>
        </table>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>

</body>
</html>
