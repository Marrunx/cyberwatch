<?php

$logFile = '../logs/rfid_register_logs.txt'; // Adjust the path if needed
if (file_exists($logFile)) {
    file_put_contents($logFile, ''); // Overwrite the file with an empty string
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="../images/icon/web-icon.png" rel="website icon" type="png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TNC Registration</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="../css/loginstyle.css">


  <!--scripts-->

  <!-- validate registration form-->
  <script>
    function validateForm() {
        const uid = document.getElementById("uid-display").value.trim();
        const username = document.getElementById("username").value.trim();
        const balance = document.getElementById("balance").value.trim();

        // Regex for alphanumeric UID
        const validUID = /^[a-zA-Z0-9]+$/;

        // Validate UID
        if (!uid) {
            alert("UID cannot be empty.");
            return false;
        } else if (!validUID.test(uid)) {
            alert("UID must be alphanumeric.");
            return false;
        }

        // Validate Username
        if (!username) {
            alert("Username cannot be empty.");
            return false;
        }

        // Validate Balance
        if (!balance) {
            alert("Balance cannot be empty.");
            return false;
        } else if (isNaN(balance) || balance <= 0) {
            alert("Balance must be a positive number.");
            return false;
        }

        return true; // Form is valid
    }
</script>

  <!--validate sign in form-->
    <script>
      function validateLogin(){

        var loginEmail = document.getElementById('email').value;

      }
    </script>
</head>
<body style="background-color: #3B3B3B;">
<div class="loader"></div>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header class="" style="color: black;">Register your Card here  </header>
      <form action="../function/Register.php" onsubmit="return validateForm()" method="post">
        <textarea 
            id="uid-display" 
            class="UID" 
            name="uid" 
            placeholder="Enter the Card UID" 
            style="height: 60px; width: 100%; padding: 15px; font-size: 17px; border: 1px solid #ddd; border-radius: 6px; outline: none; resize: none;" 
            readonly>
        </textarea>
        <input type="text" id="username" name="username" placeholder="Enter Username" style="padding-left: 10px;">
        <input type="number" id="balance" name="balance" placeholder="Enter Balance" style="padding-left: 10px;"><br><br>
        <input type="submit" class="button" value="Submit" name="submit">
    </ffor>
    </div>

  </div>

  <script>
    // Debugging log to ensure the script is loaded
    console.log("Script loaded");

    // Clear the textarea on page load
    document.addEventListener("DOMContentLoaded", () => {
        const uidDisplay = document.getElementById('uid-display');
        if (uidDisplay) {
            uidDisplay.value = ''; // Clear the textarea
            console.log("Textarea cleared");
        } else {
            console.error("Textarea not found");
        }
    });

    function fetchUID() {
        fetch('../logs/rfid_register_logs.txt?nocache=' + new Date().getTime())
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.text();
            })
            .then(data => {
                // Split by newlines and get the last UID
                const uids = data.trim().split('\n');
                const lastUID = uids[uids.length - 1] || "Please scan your Card.";

                // Update the textarea with the last UID
                const uidDisplay = document.getElementById('uid-display');
                if (uidDisplay) {
                    uidDisplay.value = lastUID;
                    console.log("UID updated:", lastUID);
                } else {
                    console.error("Textarea not found");
                }
            })
            .catch(error => {
                console.error('Error fetching UID:', error);
            });
    }

    // Fetch UID every 2 seconds
    setInterval(fetchUID, 2000);
    fetchUID();
</script>
</body>
</html>

<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "computerrental";

// Initialize the result message
$message = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form inputs
    $uid = $_POST['uid'] ?? null;
    $username = $_POST['username'] ?? null;
    $balance = $_POST['balance'] ?? null;

    // Validate inputs
    if ($uid && $username && is_numeric($balance) && $balance > 0) {
        try {
            // Connect to the database
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare SQL query to insert data
            $stmt = $pdo->prepare("INSERT INTO customerregister_tbl (uid, username, balance) VALUES (:uid, :username, :balance)");
            $stmt->execute([
                ':uid' => $uid,
                ':username' => $username,
                ':balance' => $balance,
            ]);
            $message = "Registration successful! Your User ID is " . $pdo->lastInsertId();
        } catch (PDOException $e) {
            $message = "Error saving data: " . $e->getMessage();
        }
    } else {
        $message = "Invalid input. Please try again.";
    }
}
?>

