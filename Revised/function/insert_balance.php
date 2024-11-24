<?php
// Database connection (adjust with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "computerrental";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the balance from the POST data
    $balance = $_POST['balance'] ?? '';

    // Check if balance is not empty
    if (!empty($balance)) {
        // Prepare and bind the SQL statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO customerregister_tbl (balance) VALUES (?)");
        $stmt->bind_param("s", $balance); // "s" indicates the type (string) for the balance column

        // Execute the query
        if ($stmt->execute()) {
            echo "<script>alert('Success.'); window.history.back();</script>";
        } else {
            echo "Error inserting balance: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Balance is required.";
    }
}

// Close the connection
$conn->close();
?>
