<?php

ini_set('display_errors', 1);

require_once('../pdo_connect.php');

try {
    $sql = "SELECT ItemName, StockQuantity 
            FROM MenuItem 
            WHERE StockQuantity < 75 
            ORDER BY StockQuantity ASC";
            
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
    <title>Low Stock Report</title>
    <meta charset="utf-8">
    <style>table, th, td { border: 1px solid black; border-collapse: collapse; padding: 10px; }</style>
</head>
<body>

    <h2>Critical Low Stock Items (Below 75)</h2>

    <?php if (!empty($results)) : ?>
        <table>
            <tr>
                <th>Item Name</th>
                <th>Stock</th>
            </tr>
            <?php foreach($results as $row) {
                echo "<tr>";
                echo "<td>" . $row['ItemName'] . "</td>";
                echo "<td>" . $row['StockQuantity'] . "</td>";
                echo "</tr>";
            } ?>
        </table>
    <?php else: ?>
        <p>No items are below stock level 75.</p>
    <?php endif; ?>

</body>
</html>
