<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "computerrental";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the pc_number for ESP32 (e.g., pc_number = 1)
$pc_number = 1;  // Change this value based on your configuration

// Query to check if a UID has a promo assigned and fetch the pc_number
$sql = "SELECT UID, promo, pc_number FROM customerregister_tbl 
        WHERE promo IS NOT NULL AND promo != '' AND pc_number = $pc_number LIMIT 1"; // Ensure we're fetching for the specific pc_number
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode([
        'UID' => $row['UID'],
        'promo' => $row['promo'],
        'pc_number' => $row['pc_number']
    ]);
} else {
    echo json_encode(['UID' => 'N/A', 'promo' => 'N/A', 'pc_number' => -1]);
}

$conn->close();
?>
