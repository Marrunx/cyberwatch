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
  <title>TNC </title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="css/loginstyle.css">
  </head>
<body style="background-color: #3B3B3B;">
<div class="loader"></div>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header class="" style="color: black;">Cyber Café </header>
      <form action="function/check_uid.php" method="POST" id="autosubmit">
        <textarea 

            id="uid-display" 
            class="UID" 
            name="uid" 
            placeholder="Enter the Card UID" 
            style="height: 60px; width: 100%; padding: 15px; font-size: 17px; margin-bottom: 1.3rem; border: 1px solid #ddd; border-radius: 6px; outline: none; resize: none;" >
        </textarea>
            <input type="submit" class="button" value="Submit" name="submit">
        </form>
    </div>

  </div>

  <script src="js/scan_uid.js" defer></script>
</body>
</html>


