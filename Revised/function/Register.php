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

// Get form data
$uid = $_POST['uid'];
$username = $_POST['username'];
$balance = $_POST['balance'];

// Check if the UID already exists
$qryCheck = "SELECT * FROM customerregister_tbl WHERE uid = '$uid'";
$sqlCheck = mysqli_query($conn, $qryCheck);
$result = mysqli_num_rows($sqlCheck);

if ($result > 0) {
    echo "
    <script>
        alert('UID is already in use!');
        window.history.go(-1);
    </script>
    ";
} else {
    // Insert the new record into the table
    $qry = "INSERT INTO customerregister_tbl (uid, username, balance) VALUES ('$uid', '$username', '$balance')";
    $sql = mysqli_query($conn, $qry);

    if ($sql) {
        echo "
        <script>
            alert('You have successfully registered!');
            window.location.href = '../TNCScan.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Error occurred while registering. Please try again.');
            window.history.go(-1);
        </script>
        ";
    }
}
?>
