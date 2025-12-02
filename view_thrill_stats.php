<?php include 'AmusementParkDatabase.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Thrill Stats</title>
</head>
<body>

    <a href="index.html">Back to Menu</a>
    <h1>High Capacity Thrill Rides</h1>

    <table border="1">
        <tr>
            <th>Thrill Level</th>
            <th>Avg Capacity</th>
        </tr>
        <?php
   
        $sql = "SELECT ThrillLevel, AVG(Capacity) AS AverageCapacity 
                FROM Rides 
                GROUP BY ThrillLevel 
                HAVING AVG(Capacity) > 14";

        $result = $conn->query($sql);


        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ThrillLevel"] . "</td>";
            echo "<td>" . $row["AverageCapacity"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>
