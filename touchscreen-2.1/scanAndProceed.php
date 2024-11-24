        <!--Function for RFID SCANNER___________________________________________________________________________-->
<?php 
$Write2 = "<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . "?>";
file_put_contents('uidNumField.php',$Write2);
?>

<!DOCTYPE html>
<html>
    <head>
        <title> TNC Cyber Cafe - Imus:  </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<meta http-equiv="X-UA-Compatible" content="ie=edge">-->
        <link rel = "stylesheet" type = "text/css" href = "sAPstyle.css">
        <script src = "jquery.min.js"></script>
        <script>
			$(document).ready(function(){
				$("#scanUID").load("uidNumField.php");
				setInterval(function() {
					$("#scanUID").load("uidNumField.php");
				}, 500);
			});
		    </script>
    </head>
<body>

<div class="header-logo"> 
    <div class="branding">  
        <span class="cyber"> Cyber</span><span class="watch">Watch </span>
    </div>
    <div class="subBranding"> for TNC Cybercafe</div>
</div>


<div class="container">
    <div class="form-container">
        <form action="" method="POST" id="autosubmit" autocomplete="off">
            <label for="scanUID" class="instruct-note"> Scan your card here to proceed. </label>
            <textarea class="UID" id="scanUID" name="scanUID" placeholder="Place your card here."  require> </textarea> <br>
            <!-- <input type="text" name="scanUID" id="scanUID" placeholder="Place your card here." required> <br> -->
            <button type="submit" name="proceedBtn" onclick="submitUid();" class="proceedBtn"> Proceed </button>
        </form>
    </div>
</div>


<!-- AJAX Prog. 
<script type="text/javascript">
    function submitUid() {
        var uid = $('#UID').val();

        $.ajax({
            url: 'ajaxHandler.php',  // Send the request to this PHP script
            type: 'POST',
            data: { uidNumField: uid },  // Send the UID field value
            success: function(response) {
                alert(response);
                if (response == "Complete!") {
                    window.location.href = 'reloadPage.php';  // Redirect on success
                }
            }
        });
    }
</script>-->

<!--<script>
    $(document).ready(function(){

        $('#autosubmit').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: 'scanAndProceed.php',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response){
                    alert("DATA SUBMITTED SUCCESSFULLY");
                },
                error: function(xhr, status, error){
                    alert("DATA SUBMISSION FAILED");
                }
            });
        });
        setTimeout(function(){
            $('#autosubmit').submit();
        }, 5000);
    });  
</script>-->
<script>
    $(document).ready(function(){

        $('#scanUID').on('input',function(){
            $.ajax({
                url: 'reloadPage.php',
                method: 'POST',
                success: function(response){

                    console.log('form submitted:', response);
                },
                error: function(xhr, status, error) {
                    console.log("submission failed:", error);
                }
            });
        });
    });
</script>

</body>
</html>


<?php
require 'dbconnection.php';


// Check if the form is submitted and if cardNumber is set
if (isset($_POST['scanUID'])) {
    // Retrieve the card number from POST request
    $uid = $_POST['scanUID'];

    // Validate the input
    if (!empty($uid)) {
        // Get the current date and time separately
        //$currentDate = date('Y-m-d'); // Current date (YYYY-MM-DD format)
        //$currentTime = date('H:i:s'); // Current time (HH:MM:SS format)

        // Escape the UID to prevent SQL injection
        $uid = mysqli_real_escape_string($conn, $uid);

        // Prepare the SQL query to insert UID, date, and time
        //$sql = "INSERT INTO custuid_tbl (UID, Date, Time) VALUES ('$uid', '$currentDate', '$currentTime')";
        $sql = "SELECT UID FROM customerregister_tbl WHERE UID = 'scanUID'";
        // Execute the query
        if (mysqli_query($conn, $sql)) {
            echo "Completed!";
            header ("Location: reloadPage.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        echo "Please enter a valid UID.";
    }
}

// Close the connection only if it was successfully established
if (isset($conn) && $conn !== null) {
    mysqli_close($conn);
}


?>