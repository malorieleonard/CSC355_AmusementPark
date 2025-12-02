<?php

include 'AmusementParkDatabase.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Low Stock Report</title>
    <meta charset ="utf-8"> 
    <style>
        body { font-family: sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { text-decoration: none; display: inline-block; margin-bottom: 20px; color: blue; }
    </style>
</head>
<body>

    <a href="AmusementParkDatabase.php">← Back to Main Menu</a>

    <h1>Report: Low Stock Menu Items</h1>
    <p>Items with stock count below the park average.</p>

    <table>
        <tr>
            <th>Item Name</th>
            <th>Stock Quantity</th>
        </tr>
        <?php

        $sql = "SELECT ItemName, StockQuantity 
                FROM MenuItem 
                WHERE StockQuantity < (SELECT AVG(StockQuantity) FROM MenuItem)";
        
        if (isset($conn)) {
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ItemName"] . "</td>";
                    echo "<td>" . $row["StockQuantity"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No low stock items found.</td></tr>";
            }
        } else {
             echo "<tr><td colspan='2'>Error: Database connection not found.</td></tr>";
        }
        ?>
    </table>

</body>
</html>
