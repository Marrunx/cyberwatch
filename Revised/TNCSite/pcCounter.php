<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Rental | Timer</title>

    <style>
        .main-body{
            width: 500px;
            height: 500px;
            border: solid;
            align-items: center;
        }

        .header h1{
            text-align: center;
        }

        .timer-info{
            display: block;
        }

        .row-1, .row-2{
            display: flex;
            height: 20%;
            width: 100%;
        }

        .col-1, .col-2{
            height: 20%;
            width: 50%;
            border: solid;
        }

        .col-2{
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="main-body">
        <div class="header">
            <h1>PC TIMER</h1>
        </div>

        <div class="timer-info">
            <div class="row-1">
                <div class="col-1">
                    <h1>PC NUMBER:</h1>
                </div>
                <div class="col-2">
                    <h1 id="pc_number"></h1>
                </div>
            </div>   
            
            <div class="row-2">
                <div class="col-1">
                    <h1>Time Left:</h1>
                </div>
                <div class="col-2">
                    <h1 id="timer">00:00:00</h1>
                </div>
            </div>
        </div>
    </div>
</body>

<script defer>
    //get url parameter values
    function getQueryParam(param){
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(param);
    }

    //display pc number
    const pcNumber = getQueryParam("pc_number");
    const uid = getQueryParam("uid");
    console.log(uid);
    document.getElementById('pc_number').textContent = pcNumber;

    //timer logic
    let timeInSeconds = parseInt(getQueryParam("time")) * 60 || 0; // Convert minutes to seconds

function startTimer() {
  const timerElement = document.getElementById("timer");

  const interval = setInterval(() => {
    if (timeInSeconds <= 0) {
      clearInterval(interval);
      timerElement.textContent = "Time's up!";
    } else {
      // Calculate hours, minutes, and seconds
      const hours = Math.floor(timeInSeconds / 3600);
      const minutes = Math.floor((timeInSeconds % 3600) / 60);
      const seconds = timeInSeconds % 60;

      // Display the countdown
      timerElement.textContent = `${hours}h ${minutes}m ${seconds}s`;

      // Decrement the timer
      timeInSeconds--;
            }
        }, 1000); // Update every second
    }

    if (timeInSeconds > 0) {
        startTimer();
    } else {
        console.error("Invalid or missing time parameter");
}

startTimer()


</script>
</html>

<?php 
$conn = mysqli_connect('localhost', 'root', '', 'computerrental');


$uid = $_GET['uid'];

$time = $_GET['time'];

//conversion of time to php

$promo = ($time / 60) * 20;

//get current balance in database
$sqlGetBal = "SELECT balance FROM customerregister_tbl WHERE uid = '$uid'";
$qryGetBal = mysqli_query($conn, $sqlGetBal);
$resultGetBal = mysqli_fetch_assoc($qryGetBal);

$balance = $resultGetBal['balance'];

$newBalance = $balance - $promo;

$sqlNewBal = "UPDATE customerregister_tbl SET balance = '$newBalance' WHERE uid = '$uid'";
$qryNewBal = mysqli_query($conn, $sqlNewBal);

echo $newBalance;
?>