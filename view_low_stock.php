<?php include 'AmusementParkDatabase.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Low Stock Report</title>
</head>
<body>

    <a href="index.html">Back to Menu</a>
    <h1>Low Stock Items</h1>

    <table border="1">
        <tr>
            <th>Item Name</th>
            <th>Stock</th>
        </tr>
        <?php
 
        $sql = "SELECT ItemName, StockQuantity FROM MenuItem 
                WHERE StockQuantity < (SELECT AVG(StockQuantity) FROM MenuItem)";
        

        $result = $conn->query($sql);

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ItemName"] . "</td>";
            echo "<td>" . $row["StockQuantity"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>
