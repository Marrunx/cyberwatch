<?php
// Start session to store the balance (optional)
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get balance from POST request
    $balance = $_POST['balance'] ?? '';

    if (!empty($balance)) {
        // Absolute path to the log file
        $logFile = 'C:/xampp/htdocs/ComputerRental/Revised/logs/balance_logs.txt';

        // Log the balance to the file (append mode)
        if (file_put_contents($logFile, $balance . "\n", FILE_APPEND)) {
            // Send success response
            echo "Balance logged successfully: PHP " . number_format((float)$balance, 2, '.', ',');
        } else {
            // File write failed
            echo "Failed to write balance to the log file.";
        }
    } else {
        // No balance received
        echo "No balance received in POST data.";
    }
}
?>
