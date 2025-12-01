<?php
require_once('../pdo_connect.php');

if (isset($_GET['dob'])) {
    $dob = $_GET['dob'];

    try {
        $sql = "SELECT GetGuestAge(?) AS age";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$dob]);

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $age = $result['age'];
    } catch (PDOException $e) {
        die("Database Error: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Guest Age Result</title>
    <meta charset="utf-8">
</head>
<body>

<h2>Guest Age Result</h2>

<?php if (isset($age)) : ?>
    <p><strong>Guest Age:</strong> <?= $age ?></p>
<?php else: ?>
    <p>No DOB provided.</p>
<?php endif; ?>

</body>
</html>
