<?php
require_once('../pdo_connect.php');

$updated = [];

if (isset($_GET['item']) && isset($_GET['qty'])) {
    $itemID = $_GET['item'];
    $qty = $_GET['qty'];

    try {
        // Insert purchase (trigger fires here)
        $insert = "INSERT INTO Purchase (MenuItemID, Quantity) VALUES (?, ?)";
        $stmt = $conn->prepare($insert);
        $stmt->execute([$itemID, $qty]);

        // Retrieve updated stock
        $sql = "SELECT MenuItemID, ItemName, StockQuantity FROM MenuItem WHERE MenuItemID = ?";
        $stmt2 = $conn->prepare($sql);
        $stmt2->execute([$itemID]);

        $updated = $stmt2->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        die("Database Error: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trigger Result</title>
    <meta charset="utf-8">
</head>
<body>

<h2>Trigger Executed: Updated Stock</h2>

<?php if (!empty($updated)) : ?>
<p><strong>Menu Item ID:</strong> <?= $updated['MenuItemID'] ?></p>
<p><strong>Item Name:</strong> <?= $updated['ItemName'] ?></p>
<p><strong>Updated Stock Quantity:</strong> <?= $updated['StockQuantity'] ?></p>
<?php else: ?>
<p>No purchase or invalid item.</p>
<?php endif; ?>

</body>
</html>
