<?php
// Clear the RFID log file on every page load
$logFile = 'logs/rfid_logs.txt'; // Adjust the path if needed
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
  <link rel="stylesheet" href="css/loginstyle.css">
  </head>
<body style="background-color: #3B3B3B;">
<div class="loader"></div>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header class="" style="color: black;">Cyber Cafe </header>
      <form action="function/check_uid.php" method="POST" id="autosubmit">
        <textarea 
            id="uid-display" 
            class="UID" 
            name="uid" 
            placeholder="Enter the Card UID" 
            style="height: 60px; width: 100%; padding: 15px; font-size: 17px; margin-bottom: 1.3rem; border: 1px solid #ddd; border-radius: 6px; outline: none; resize: none;" 
            readonly>
        </textarea>
            <input type="submit" class="button" value="Submit" name="submit">
        </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <label for="check" ><a href="TNCSite/TNCRegister.php">Click Here!</a></label>
        </span>
      </div>
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
        fetch('logs/rfid_logs.txt?nocache=' + new Date().getTime())
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
