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

// Fetch the latest balance when requested (AJAX call)
if (isset($_GET['action']) && $_GET['action'] == 'getBalance') {
    // Retrieve the latest UID and balance
    $uid = "";
    $amount = 0.0;

    $sql = "SELECT UID, Amount FROM customerregister_tbl ORDER BY ID DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $uid = $row['UID'];
        $amount = $row['Amount'];
    } else {
        $uid = "No UID found";
        $amount = 0.0;
    }

    // Send response as JSON
    echo json_encode(['uid' => $uid, 'amount' => number_format($amount, 2)]);
    $conn->close();
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>TNC Cyber Cafe - Imus</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="reloadPageStyle.css">
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
                    <p>UID: <span id="uid"><?php echo $uid; ?></span></p>
                    <label for="pc_number">PC Number:</label>
                    <input type="text" name="pc_number" id="pc_number" readonly><br>
                    <label for="loadBal">Load Balance:</label>
                    <input type="text" name="loadBal" id="loadBal" value="₱<?php echo number_format($amount, 2); ?>" /><br><br>
                    <p id="current-load">Current Load: ₱<?php echo number_format($amount, 2); ?></p>
                    <!-- buttons -->
                    <button type="button" name="stopButton" id="stopButton" onclick="stopPC()" class="stopBtn">Stop</button><br>
                    <button type="button" name="loadButton" id="loadButton" onclick="addToLoad()" class="loadBtn">Load</button><br><br>
                </div>
            </form>
        </div>
    </div>

    <!-- countDownTimer -->
    <div>
        <div id="timer">00:00:00</div>
        <p id="cost">Total Cost: ₱0.00</p>
    </div>
</div>

<script src="js/counter.js"></script>
<script src="js/balanceRealTimeUpdate.js"></script>
</body>
</html>
