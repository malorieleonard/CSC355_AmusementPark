<?php
require_once('../pdo_connect.php');

$rides = [];

if (isset($_GET['thrill'])) {
    $thrill = $_GET['thrill'];

    try {
        $sql = "CALL GetThrillRides(?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$thrill]);

        $rides = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor(); 
    } catch (PDOException $e) {
        die("Database Error: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rides Result</title>
    <meta charset="utf-8">
</head>
<body>

<h2>Rides With Thrill Level >= <?= isset($thrill) ? htmlspecialchars($thrill) : '' ?></h2>

<?php if (!empty($rides)) : ?>
<table border="1" cellpadding="8">
    <tr>
        <th>Ride ID</th>
        <th>Ride Name</th>
        <th>Thrill Level</th>
        <th>Capacity</th>
    </tr>

    <?php foreach ($rides as $ride) : ?>
    <tr>
        <td><?= $ride['RideID'] ?></td>
        <td><?= $ride['RideName'] ?></td>
        <td><?= $ride['ThrillLevel'] ?></td>
        <td><?= $ride['Capacity'] ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
<p>No rides found or no thrill level provided.</p>
<?php endif; ?>

</body>
</html>
