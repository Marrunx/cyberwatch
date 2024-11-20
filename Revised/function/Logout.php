<?php

// Start the session
session_start();

// Destroy all session variables
session_unset();

// Destroy the session itself
session_destroy();

// Redirect to the login page (or any page you want)
header("Location: ../TNCScan.php");
exit;

?>