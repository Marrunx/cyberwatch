<?php
// Start session to store the UID
session_start();

// Ensure no output before header (important for redirect)
ob_start();

// Debug: Check the request method
echo "Request Method: " . $_SERVER["REQUEST_METHOD"] . "<br>";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve UID from POST request
    $uid = $_POST['uid'] ?? '';

    if (!empty($uid)) {
        // Store the scanned UID in the session
        $_SESSION['uid'] = $uid;

        // Redirect to index.php after storing the UID
        header("Location: index.php"); 
        exit(); // Ensure the script stops after the redirect
    } else {
        // Response for missing UID
        echo "No UID received";
    }
} else {
    // Response for invalid request method
    echo "Invalid request method. Expected POST, but received: " . $_SERVER["REQUEST_METHOD"];
}

// Flush any previous output (if any)
ob_end_flush();
?>
