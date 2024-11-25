<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "computerrental";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the UID from the request
$uid = $_GET['UID'];

if ($uid) {
    // Update query to reset promo to 0
    $sql = "UPDATE customerregister_tbl SET promo = 0 WHERE UID = '$uid'";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'Promo reset']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to reset promo']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No UID provided']);
}

$conn->close();
?>
