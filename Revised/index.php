<?php
// Start session to store the UID
session_start();

// Check if there's a POST request with UID and store it in session
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['uid'])) {
    $uid = $_POST['uid'];
    if (!empty($uid)) {
        // Store the scanned UID in the session
        $_SESSION['uid'] = $uid;
    } else {
        $error_message = "No UID received";
    }
}

// Check if UID is stored in the session
if (isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid']; // Retrieve the UID from session
} else {
    $uid = "No UID found"; // Default message if no UID is in the session
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Session UID</title>
</head>
<body>
    <h1>Check Session UID</h1>

    <?php if (isset($error_message)) { echo "<p style='color: red;'>$error_message</p>"; } ?>

    <p><strong>Stored UID:</strong> <?php echo htmlspecialchars($uid); ?></p>

    <!-- Form to submit a new UID -->
    <form action="index.php" method="POST">
        <label for="uid">Scan your card here:</label>
        <input type="text" id="uid" name="uid" placeholder="Enter UID" required>
        <button type="submit">Submit</button>
    </form>

    <a href="logout.php">Logout</a> <!-- Link to logout page to destroy session -->
</body>
</html>
