<?php
// Database connection credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "computerrental";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the request is GET or POST
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Handle GET request to fetch data by UID
    $uid = $_GET['uid'] ?? '';

    if ($uid) {
        // Fetch user data from the database
        $sql = "SELECT * FROM customerregister_tbl WHERE UID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $uid);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $userData = $result->fetch_assoc();
            echo json_encode([
                'uid' => $userData['UID'],
                'balance' => $userData['balance'],
                'promo' => 'N/A' // Default or fetched promo
            ]);
        } else {
            echo json_encode(['error' => 'No user found for the given UID']);
        }
        $stmt->close();
    } else {
        echo json_encode(['error' => 'UID is required']);
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle POST request to process data
    $uid = $_POST['uid'] ?? '';
    $balance = $_POST['balance'] ?? '';
    $promo = $_POST['promo'] ?? '';

    if ($uid && $balance && $promo) {
        // Example processing logic (update database, apply promo, etc.)
        echo json_encode([
            'uid' => $uid,
            'balance' => $balance,
            'promo' => $promo
        ]);
    } else {
        echo json_encode(['error' => 'Missing data']);
    }
}

// Close the connection
$conn->close();
?>
