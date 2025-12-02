<?php

ini_set('display_errors', 1);


require_once('../pdo_connect.php'); 


$sql = 'SELECT ItemName, StockQuantity 
        FROM MenuItem 
        WHERE StockQuantity < (SELECT AVG(StockQuantity) FROM MenuItem)';

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
    <title>Low Stock Report</title>
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

    <h2>Report: Low Stock Menu Items</h2>
    <p><em>Items with stock count below the park average.</em></p>

    <?php if (!empty($results)) : ?>
        <table>
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Stock Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($results as $row) {
                    echo "<tr>";
                    echo "<td>" . $row['ItemName'] . "</td>";
                    echo "<td>" . $row['StockQuantity'] . "</td>";
                    echo "</tr>";
                } ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No low stock items found. Great job on inventory!</p>
    <?php endif; ?>

</body>
</html>
