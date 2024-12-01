<?php
// reset_pc_number.php

if (isset($_GET['pc_number'])) {
    $pc_number = $_GET['pc_number'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "computerrental";

    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the pc_number to null for the given pc_number
    $sql = "UPDATE customerregister_tbl SET pc_number = NULL WHERE pc_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $pc_number);

    if ($stmt->execute()) {
        echo "PC Number reset to null.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "PC number not specified.";
}
?>
