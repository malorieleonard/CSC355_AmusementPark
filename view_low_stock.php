<?php
// view_low_stock.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AmusementPark"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

echo "<h2>Low Stock Alert (Items Below Average Stock)</h2>";
echo "<p><em>Demonstrates Subquery Requirement</em></p>";

$sql = "SELECT ItemName, StockQuantity 
        FROM MenuItem 
        WHERE StockQuantity < (SELECT AVG(StockQuantity) FROM MenuItem)";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1' style='color: red;'>";
    echo "<tr><th>Item Name</th><th>Stock Quantity</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ItemName"] . "</td>";
        echo "<td>" . $row["StockQuantity"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "All items are stocked above average levels.";
}

echo "<br><a href='index.html'>Back to Home</a>";
$conn->close();
?>
