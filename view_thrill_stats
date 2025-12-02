<?php
include 'AmusementParkDatabase.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Thrill Ride Stats</title>
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

    <h1>Report: High Capacity Thrill Rides</h1>
    <p>Thrill levels where the average capacity is greater than 14.</p>

    <table>
        <tr>
            <th>Thrill Level</th>
            <th>Average Capacity</th>
        </tr>
        <?php

        $sql = "SELECT ThrillLevel, AVG(Capacity) AS AverageCapacity 
                FROM Rides 
                GROUP BY ThrillLevel 
                HAVING AVG(Capacity) > 14";
        
        if (isset($conn)) {
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ThrillLevel"] . "</td>";
                    echo "<td>" . number_format($row["AverageCapacity"], 1) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2'>No results found.</td></tr>";
            }
        }
        ?>
    </table>

</body>
</html>
