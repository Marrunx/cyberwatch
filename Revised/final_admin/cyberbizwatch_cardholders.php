<?php
// Database connection
require 'transaction_reg_conn.php';

// Query to fetch data from rfid_users_table
$sql = "SELECT * FROM rfid_users_tbl"; // Adjust column names as needed
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RFID Users Table</title>
    <link rel="stylesheet" href="cardholders.css">
</head>
<body>
    <h1>RFID Users</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>UID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Balance</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if the result has rows
            if (mysqli_num_rows($result) > 0) {
                // Fetch and display each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['UID_Number'] . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Username'] . "</td>";
                    echo "<td>" . $row['Balance'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data available</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
<?php
// Close the database connection
mysqli_close($conn);
?>
