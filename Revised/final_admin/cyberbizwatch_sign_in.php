<!DOCTYPE html>
<html>
    <head>
        <title> TNC CyberBizWatch | Sign In </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/sign_in_design.css">
        <link rel="stylesheet" href="css/admin-registration.css">
        <script src="../scripts/showPassword.js"></script>
    </head>
<body>

<div class="header">
    <p class="logo-branding"> CyberBiz Watch </p>
    <p class="sub-logo"> for TNC Cyber Cafe </p>
</div>

<div class="container">
    <form action="" method="POST" autocomplete="off">
        <div class="form-content">
            <label for="uname"> Username </label>
            <input type="text" id="uname" name="uname" placeholder="Enter username" required>
            <label for="password"> Password </label>
            <input type="password" id="adminPw" name="adminPw" placeholder="Enter password" required>

            <div class="showPassword-box">
                <input type="checkbox" id="showPass" onclick="togglePassword()">
                <p class="instruction"> Show Password </p>
            </div>

            <button type="submit" name="loginButton" id="loginButton"> Sign In </button>
                <div class="register-link">
                    <p class="new-member"> Not yet an Admin or Staff? <a href="cyberbizwatch_admin_staff_reg.php"> Register here </a> </p>
                </div>
        </div>
    </form>
</div>

</body>
</html>

<?php
// Include database connection
require 'dbconn.php';

if (isset($_POST['loginButton'])) {
    // Get user inputs
    $uname = trim($_POST['uname']);
    $adminPw = trim($_POST['adminPw']);

    // Escaping special characters in username
    $uname = mysqli_real_escape_string($conn, $uname);

    // Prepare the SQL statement without placeholders
    $sql = "SELECT * FROM adminstaff_tbl WHERE Username = '$uname' LIMIT 1";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch the user data
        $user = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($adminPw, $user['Password'])) {
            // Start a session
            session_start();
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['username'] = $user['Username'];
            $_SESSION['role'] = $user['Roles']; // Store role in session

            // Check the role and redirect accordingly
            if ($user['Roles'] === 'Admin') {
                header("Location: cyberbizwatch_dashboard.php");
            } elseif ($user['Roles'] === 'Staff') {
                header("Location: cardscanner.php");
            } else {
                echo "<script>alert('Invalid role detected.');</script>";
            }
            exit();
        } else {
            // Incorrect password
            echo "<script>alert('Incorrect password. Please try again.');</script>";
        }
    } else {
        // Username not found
        echo "<script>alert('Username not found. Please try again.');</script>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

