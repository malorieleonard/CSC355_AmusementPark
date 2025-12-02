<?php
ini_set('display_errors', 1);
require_once('../pdo_connect.php'); 

$sql = 'SELECT ThrillLevel, AVG(Capacity) AS AverageCapacity 
        FROM Rides 
        GROUP BY ThrillLevel 
        HAVING AVG(Capacity) > 14';

try {
    $stmt = $dbc->query($sql);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Query Failed: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thrill Stats Report</title>
    <meta charset ="utf-8"> 
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; max-width: 600px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <p><a href="index.html">← Back to Main Menu</a></p>

    <h2>Report: High Capacity Thrill Rides</h2>
    <p><em>Thrill levels where the average capacity is greater than 14.</em></p>

    <?php if (!empty($results)) : ?>
        <table>
            <thead>
                <tr>
                    <th>Thrill Level</th>
                    <th>Average Capacity</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($results as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['ThrillLevel'] . "</td>";
                    // Using number_format to clean up decimals
                    echo "<td>" . number_format($row['AverageCapacity'], 1) . "</td>";
                    echo "</tr>";
                } ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>

</body>
</html>
