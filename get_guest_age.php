<?php
ini_set('display_errors', 1);

if(isset($_GET['submit'])) {
    $dob = trim($_GET['dob']);

    try {
        require_once('../pdo_connect.php'); // adjust path if needed

        $sql = 'SELECT GetGuestAge(:dob) AS Age';
        $stmt = $dbc->prepare($sql);
        $stmt->bindParam(':dob', $dob);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$result) {
            echo "No age returned. Please check the DOB format.";
            exit;
        }
    } catch(PDOException $e) {
        echo $e->getMessage();
        exit;
    }
} else {
    echo "<h2>You have reached this page in error</h2>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Guest Age Result</title>
</head>
<body>
<h2>Guest Age Result</h2>
<p>Date of Birth: <?php echo htmlspecialchars($dob); ?></p>
<p>Calculated Age: <strong><?php echo htmlspecialchars($result['Age']); ?></strong></p>
<a href="get_guest_age.html">Back</a>
</body>
</html>

