<?php
$server = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'computerrental';

    $conn = mysqli_connect($server, $username, $password, $databaseName);
        if (!$conn) {
            die ("Connection failed: " . mysqli_connect_error());
        }
?>
