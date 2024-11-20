<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $uid = $_POST['uid'] ?? '';

    if (!empty($uid)) {
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "computerrental";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if UID exists in the database
        $stmt = $conn->prepare("SELECT UID FROM customerregister_tbl WHERE uid = ?");
        $stmt->bind_param("s", $uid);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // UID exists, redirect to another page
            header("Location: /ComputerRental/Revised/TNCSite/TNCLoad.php?uid=" . urlencode($uid));
            exit();
        } else {
            // UID not found
            echo "<script>alert('Card not found.'); window.history.back();</script>";
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "<script>alert('UID is empty!'); window.history.back();</script>";
    }
}
?>
