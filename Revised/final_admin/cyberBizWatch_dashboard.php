<?php
// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection
require 'transaction_reg_conn.php';

// Check if the request is for JSON data
if (isset($_GET['fetch_data']) && $_GET['fetch_data'] == 1) {
    // Get today's date (Y-m-d)
    $date = date('Y-m-d');  // Current date formatted as Y-m-d

    // Query to fetch today's revenue grouped by hour
    $query = "
        SELECT DATE_FORMAT(Time, '%H:00') AS hour, SUM(amount) AS total_amount 
        FROM sales_tbl 
        WHERE DATE(Date) = '$date'  -- Filter by today's date
        GROUP BY hour
        ORDER BY hour ASC
    ";

    $result = mysqli_query($conn, $query);

    // Prepare data for JSON response
    $data = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = [
                "time" => $row['hour'],
                "total_amount" => number_format($row['total_amount'], 2) // Format amount
            ];
        }
    } else {
        // If no data, return default values
        $data[] = ["time" => "00:00", "total_amount" => "0.00"];
    }

    // Send JSON response
    header('Content-Type: application/json');
    echo json_encode($data);

    // Close the connection
    mysqli_close($conn);
    exit; // Ensure no further output
}
?>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberDashboard</title>
    <link rel="stylesheet" href="css/mainStyle.css">
    <link rel="stylesheet" href="css/dashLayout.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="dashboard-layout">
    <!-- Sidebar -->
    <div class="side-nav-bar">
        <ul class="side-nav-container">
            <li class="nav-link"><a href="cyberBizWatch_dashboard.php">Dashboard</a></li>
            <li class="nav-link"><a href="cyberbizwatch_sales_revenue.php">Sales Revenue</a></li>
            <li class="nav-link"><a href="cyberBizWatch_transactions.php">Transactions</a></li>
            <li class="nav-link"><a href="cyberBizWatch_user-management.php">Card Holders</a></li>
            <li class="nav-link"><a href="#">Settings</a></li>
            <li class="nav-link"><a href="#">Sign Out</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="card-container">
        <div class="top-card-contents">
            <div class="active-sess-container">
                <div class="card-active-sessions">
                    <div class="nameCard">Active Sessions</div>
                    <div class="valueDisplay">0</div>
                </div>
            </div>

            <div class="available-comp-container">
                <div class="card-available-computers">
                    <div class="nameCard">Available Computers</div>
                    <div class="valueDisplay">0</div>
                </div>
            </div>

            <div class="revenue-card-container">
                <div class="card-revenue">
                    <div class="nameCard">Daily Revenue</div>
                    <div class="valueDisplay">0</div>
                </div>
            </div>
        </div>

        <div class="bot-card-contents">
            <!-- Chart Section -->
            <div class="quick-views">
                <div class="card-transactions-cont">
                    <div class="card-transactions">
                        <div class="l-nameCard">Transactions</div>
                    </div>
                </div>

                <div class="quick-chart">
                    <div class="card-quick-chart">
                        <canvas id="quick-line-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('quick-line-chart').getContext('2d');

    // Fetch today's revenue data grouped by time
    fetch('cyberbizwatch_dashboard.php?fetch_data=1')
        .then(response => response.json())
        .then(data => {
            // All possible times of the day (24 hours)
            const allTimes = [
                "00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", 
                "10:00", "11:00", "12:00", "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", "19:00", 
                "20:00", "21:00", "22:00", "23:00"
            ];

            // Initialize revenue map with 0 revenue for each time slot
            const revenueMap = {};
            allTimes.forEach(time => revenueMap[time] = 0);

            // Populate revenueMap with actual data from the server
            data.forEach(item => {
                revenueMap[item.time] = parseFloat(item.total_amount) || 0;
            });

            // Labels for the chart (time slots)
            const labels = allTimes;
            // Values for the chart (revenue for each time slot)
            const revenue = allTimes.map(time => revenueMap[time]);

            // Create the chart
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Revenue (PHP)',
                        data: revenue,
                        borderColor: '#3e95cd',
                        backgroundColor: 'rgba(62, 149, 205, 0.2)',
                        fill: true,
                        tension: 0.1
                    }],
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Time of Day'
                            },
                            ticks: {
                                autoSkip: true,
                                maxTicksLimit: 12 // Limit the number of ticks
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Total Revenue (PHP)'
                            },
                            min: 0,
                            ticks: {
                                callback: function(value) {
                                    return '₱' + value.toFixed(2); // Format y-axis as currency
                                }
                            }
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error fetching data:', error));
});
</script>

</body>
</html>
