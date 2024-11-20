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

// Clear the RFID log file on every page load
$logFile = 'logs/rfid_logs.txt'; // Adjust the path if needed
if (file_exists($logFile)) {
    file_put_contents($logFile, ''); // Overwrite the file with an empty string
}


// Get the UID from the URL (passed from the previous page)
$uid = $_GET['uid'] ?? 'No UID received';

// Fetch user data based on the UID
$userData = null;
if ($uid != 'No UID received') {
    $sql = "SELECT * FROM customerregister_tbl WHERE UID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $uid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();  // Fetch user data
    }
    $stmt->close();
}

// Handle POST request to update balance
if (isset($_POST['balance']) && isset($_POST['uid'])) {
    $balance = floatval($_POST['balance']); // Get balance and convert to float
    $uid = $_POST['uid']; // Get UID sent by NodeMCU

    // Update the balance for the given UID
    $sql = "UPDATE customerregister_tbl SET Amount = ? WHERE UID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ds", $balance, $uid);

    if ($stmt->execute()) {
        echo "Balance updated successfully!";
    } else {
        echo "Error updating balance: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
    exit; // Stop further execution as this is an API endpoint
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>TNC Cyber Cafe - Imus</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../css/reloadPageStyle.css">
        <script src="counter.js"></script>
    </head>
<body>

<div class="container">
    <div class="header-container">
        <div class="header-content">
            <div class="branding">  
                <span class="cyber">Cyber</span><span class="watch">Watch</span>
            </div>
            <div class="subBranding">for TNC Cybercafe</div>
        </div>
    </div>

    <div class="formHolder">
        <div class="cardForm-Info">
            <form action="" method="POST" autocomplete="off">
                <div>
                    <!-- Display UID from GET -->
                    <p>UID: <span id="uid"><?php echo htmlspecialchars($uid); ?></span></p>
                    
                    <!-- Display the fetched user data if available -->
                    <?php if ($userData): ?>
                        <label for="pc_number">PC Number:</label>
                        <input type="text" name="pc_number" id="pc_number" value="" readonly><br>

                        <label for="loadBal">Load Balance:</label>
                        <input type="text" name="loadBal" id="loadBal" value="₱<?php echo number_format($userData['balance'], 2); ?>" readonly/><br><br>

                        <p id="current-load">Current Load: ₱<?php echo number_format($userData['balance'], 2); ?></p>
                    <?php else: ?>
                        <p>User not found</p>
                    <?php endif; ?>
                    
                    <!-- buttons -->
                    <button type="button" name="stopButton" id="stopButton" onclick="stopPC()" class="stopBtn">Stop</button><br>
                    <button type="button" name="loadButton" id="loadButton" onclick="addToLoad()" class="loadBtn">Load</button><br><br>
                </div>
            </form>
            <form action="../function/Logout.php" method="POST">
                <button type="submit" class="loadBtn">Logout</button><br><br>
            </form>

        </div>
    </div>

    <!-- countDownTimer -->
    <div>
        <div id="timer">00:00:00</div>
        <p id="cost">Total Cost: ₱0.00</p>
    </div>
</div>

<script src="../js/counter.js"></script>
<script src="../js/balanceRealTimeUpdate.js"></script>
</body>
</html>
