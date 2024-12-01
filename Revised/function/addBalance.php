<?php 
    $conn = mysqli_connect('localhost', 'root', '', 'computerrental');

    $uid = $_GET['uid'];
    $balance = $_GET['balance'];
    $bill = $_GET['bill'];
    $pc_number = $_GET['pcNumber'];
    $newBalance = $balance + $bill;

    $addBalanceSQL = "UPDATE customerregister_tbl SET balance = '$newBalance' WHERE UID = '$uid'";
    mysqli_query($conn, $addBalanceSQL);

    echo"
    <script>
        alert('PHP $bill has been added to your account');
        window.location.href = '../TNCSite/TNCLoad.php?uid=$uid&pcNumber=$pc_number';
    </script>
    ";

    header('Location: ../tncsite/tncload.php?uid='.$uid.'&pcNumber='.$pc_number );
?>