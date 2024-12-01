<?php
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "computerrental"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//check if user has promo
$uid = $_POST['uid'];
$checkPromo = "SELECT * FROM customerregister_tbl WHERE uid = '$uid'";
$checkPromoSql = mysqli_query($conn, $checkPromo);
$checkPromoResult = mysqli_fetch_assoc($checkPromoSql);

$promoValue = $checkPromoResult['promo'];

if($promoValue > 0){
    echo"
    <script>
        alert('You have an active session ongoing.');
        window.location.href = ('../TNCScan.php');
    </script>1
    ";
}else{
// Function to check if all numbers (1-10) are taken
function areAllNumbersTaken($conn) {
    // Query to get all distinct numbers in the column
    $query = "SELECT DISTINCT pc_number FROM customerregister_tbl WHERE pc_number BETWEEN 1 AND 2"; // Replace 'your_column' and 'your_table'
    $result = $conn->query($query);

    // Check if the result is valid and if we have 10 distinct numbers
    if ($result) {
        // Count the number of distinct numbers found
        $numRows = $result->num_rows;

        // If there are 10 distinct numbers, all numbers from 1 to 10 are present
        if ($numRows == 2) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Function to generate a unique random number
function getUniqueRandomNumber($conn) {
    $number = rand(1, 2);  // Generate random number between 1 and 10

    // Check if the number exists in the database
    $query = "SELECT * FROM customerregister_tbl WHERE pc_number = $number"; // Replace 'your_table' and 'your_column'
    $result = $conn->query($query);

    // If the number exists, regenerate until it's unique
    while ($result->num_rows > 0) {
        $number = rand(1, 2);
        $result->free(); // Free the previous result set
        $query = "SELECT * FROM customerregister_tbl WHERE pc_number = $number";
        $result = $conn->query($query);
    }

    return $number; // Return the unique number
}

// Check if all numbers are taken
if (areAllNumbersTaken($conn)) {
    $uid = $_POST['uid'] ?? '';
    header("Location: /ComputerRental/Revised/TNCSite/TNCLoad.php?uid=$uid&pcNumber=0");
} else {
   $finalNum = getUniqueRandomNumber($conn);
// Close the connection


if($_SERVER["REQUEST_METHOD"] === "POST") {
    $uid = $_POST['uid'] ?? '';
    session_start();
    $_SESSION['uid'] = $uid;

    if (!empty($uid)) {
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
            header("Location: /ComputerRental/Revised/TNCSite/TNCLoad.php?uid=$uid&pcNumber=$finalNum");
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
}
}
$conn->close();
?>
