<?php 
$conn = mysqli_connect('localhost', 'root', '', 'computerrental');

$uid = $_GET['uid'];

$uidDataSQL = "SELECT * FROM customerregister_tbl WHERE uid='$uid'";
$uidDataQRY = mysqli_query($conn, $uidDataSQL);
$uidData = mysqli_fetch_assoc($uidDataQRY);

$promo = $uidData['promo'];
$pc_number = $uidData['pc_number'];
?>