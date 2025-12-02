<?php

ini_set('display_errors', 1);

require_once('../pdo_connect.php');


try {
    $sql = "SELECT ItemName, StockQuantity 
            FROM MenuItem 
            WHERE StockQuantity < (SELECT AVG(StockQuantity) FROM MenuItem)";
            
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

    <a href="index.html">Back to Main Menu</a>
    <h2>Low Stock Items</h2>

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
        <p>No low stock items found.</p>
    <?php endif; ?>

</body>
</html>
