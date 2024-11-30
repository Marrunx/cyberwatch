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
$logBalanceFile = '../logs/balance_logs.txt'; // Adjust the path if needed
if (file_exists($logBalanceFile)) {
    file_put_contents($logBalanceFile, ''); // Overwrite the file with an empty string
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

// Check if the form was submitted to add balance
if (isset($_POST['submit_balance'])) {
    $balanceToAdd = $_POST['balance'] ?? '';

    if (!empty($balanceToAdd)) {
        // Get the current balance and add the new balance value to it
        $currentBalance = $userData['balance'] ?? 0;
        $newBalance = $currentBalance + $balanceToAdd;

        // Update the balance by adding the new value
        $updateSql = "UPDATE customerregister_tbl SET balance = ? WHERE UID = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("ds", $newBalance, $uid);  // 'd' for double (for balance)

       
            if (file_exists($logBalanceFile)) {
                file_put_contents($logBalanceFile, ''); // Overwrite the file with an empty string
                }           

        if ($updateStmt->execute()) {
            echo "<script>alert('Balance added successfully!'); window.location.href = window.location.href;</script>";
        } else {
            echo "Error adding balance: " . $updateStmt->error;
        }

        // Close the update statement
        $updateStmt->close();
    } else {
        echo "Balance is required.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link href="../images/icon/web-icon.png" rel="website icon" type="png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TNC Dashboard</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="../css/loginstyle.css">
  </head>
<body style="background-color: #3B3B3B;">
<div class="loader"></div>
<div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header class="" style="color: black;">Cyber Café</header>
      <form action="" method="POST" id="autosubmit">
      <label for="loadBal">UID</label>
      <input type="text" name="uid" id="uid" value="<?php echo $uid; ?>" style="text-align:center;"readonly/><br>



        <?php if ($userData): ?>
            <label for="pc_number">PC Number</label>
            <input type="text" name="pc_number" id="pc_number" value="" style="text-align:center;" readonly><br>

            <label for="loadBal">Load Balance</label>
            <input type="text" name="loadBal" id="loadBal" value="<?php echo($userData['balance']); ?>" style="text-align:center;"readonly/><br>

            <label for="">Promos</label>
                        <select id="promo" name="promoList" class="promoText">
                            <option value="" selected disabled>Select promo</option>
                            <option value="20">1 Hour | PHP 20</option>
                            <option value="40">2 Hours | PHP 40</option>
                            <option value="60">3 Hours | PHP 60</option>
                        </select>
        <?php else: ?>
            <p>User not found</p>
        <?php endif; ?>
        <br>

        <!--<label for="balance">Add Balance </label><br>-->
        <input type="number " id="balance" name="balance" value="" style="text-align:center;" hidden    placeholder="Insert a bill" ><br><br>

        <input type="submit" name="loadButton" id="loadButton" class="button" value="Load"></input>
        <!--<input type="submit" name="submit_balance" value="Add Balance" class="button"></input>-->

        </form>

               
            
    </div>
  </div>

<script src="../js/counter.js"></script>
<script src="../js/balanceRealTimeUpdate.js"></script>
<script src="../js/TNCLoad.js" defer></script>
<<script src="../js/balance_insertion.js" defer></script>
<body>
</html>

<?php
//php load fuction
if(isset($_POST['loadButton'])){
    $uid = $_POST['uid'];
    $promo = $_POST['promoList'];
    $pc_number =$_POST['pc_number'];

    $newBalance = $userData['balance'] - $promo;

    $sqlLoadUID = "UPDATE customerregister_tbl SET balance = '$newBalance', promo = '$promo', pc_number = '$pc_number' WHERE uid = '$uid'";
    $qryLoadUID = mysqli_query($conn, $sqlLoadUID);

    echo"
        <script>
            alert('Promo availed! Please proceed to your designated PC number.');
            window.open('../function/submitData.php?uid=$uid','_blank');
        </script>
    ";
}
// Closing the connection to the database
$conn->close();
?>
