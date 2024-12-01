<?php
// Include the database connection
require 'transaction_reg_conn.php';

// Set timezone
date_default_timezone_set('Asia/Manila');

// Fetch the selected time period (default to 'today')
$timePeriod = isset($_GET['period']) ? $_GET['period'] : 'today';
$date = date("Y-m-d");

// Set the date condition and grouping logic based on the selected time period
if ($timePeriod === 'today') {
    $dateCondition = "WHERE Date = '$date'";
    $grouping = "HOUR(Time)";
    $labelColumn = "HOUR(Time) AS time_group";
} else {
    $dateCondition = match ($timePeriod) {
        'this_week' => "WHERE Date >= DATE_SUB('$date', INTERVAL 7 DAY)",
        'this_month' => "WHERE Date >= '" . date("Y-m-01") . "'",
        'this_year' => "WHERE YEAR(Date) = YEAR('$date')",
        default => "WHERE Date = '$date'",
    };
    $grouping = "Date";
    $labelColumn = "Date AS time_group";
}

// SQL query to fetch revenue data
$sql = "SELECT $labelColumn, SUM(amount) AS total_amount 
        FROM sales_tbl 
        $dateCondition 
        GROUP BY $grouping";
$result = $conn->query($sql);

// Initialize data points and total revenue
$dataPoints = [];
$total_revenue = 0;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dataPoints[] = [
            'label' => $timePeriod === 'today' 
                        ? sprintf("%02d:00", $row['time_group']) // Format hour for "today"
                        : date('Y-m-d', strtotime($row['time_group'])), // Format date otherwise
            'amount' => $row['total_amount']
        ];
        $total_revenue += $row['total_amount'];
    }
}

// SQL query to fetch Top 10 players
$topPlayersSql = "SELECT * 
                  FROM customerregister_tbl 
                  ORDER BY balance DESC 
                  LIMIT 10";
$topPlayersResult = $conn->query($topPlayersSql);

// Initialize array to hold top players
$topPlayers = [];

if ($topPlayersResult->num_rows > 0) {
    while ($player = $topPlayersResult->fetch_assoc()) {
        $topPlayers[] = $player;
    }
}

// Handle AJAX request
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['period'])) {
    header('Content-Type: application/json');
    echo json_encode([
        'total_revenue' => $total_revenue,
        'dataPoints' => $dataPoints,
        'topPlayers' => $topPlayers // Include Top Players here
    ]);
    exit;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CyberBiz.Watch - Sales Revenue</title>
    <link rel="stylesheet" href="css/salesRevStyle.css">
    <link rel="stylesheet" href="css/mainStyle.css">
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="side-nav-bar">
            <ul class="side-nav-container">
                <li class="nav-link"><a href="cyberBizWatch_dashboard.php">Dashboard</a></li>
                <li class="nav-link"><a href="cyberbizwatch_sales_revenue.php">Sales Revenue</a></li>
                <li class="nav-link"><a href="#">Transactions</a></li>
                <li class="nav-link"><a href="cyberbizwatch_cardholders.php">Card Holders</a></li>
                <li class="nav-link"><a href="#">Settings</a></li>
                <li class="nav-link"><a href="#">Sign Out</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <main class="salesContents">
            <form id="revenueForm">
                <div class="dropdown-filter-revenue">
                    <label for="time_period">Select Time Period:</label>
                        <select id="time_period" name="period">
                            <option value="this_year">This Year</option>
                            <option value="this_month">This Month</option>
                            <option value="this_week">This Week</option>
                            <option value="today" selected>Today</option>
                        </select>
                </div>
            </form>

            <!-- Container for the revenue graph -->
            <div class="container-cards">
                <div class="graph-Card">
                    <canvas id="linechart"></canvas>
                </div>

                <div class="summary-container">
                    <div class="total-earnings">
                        <h3>Total Revenue: <span id="total_revenue">₱0.00</span></h3>
                    </div>

                    <div class="top-gamers">
                        <h3>Top Gamers</h3>
                        <ul id="top_gamers_list">
                            <!-- List of Top Gamers will be dynamically inserted here -->
                        </ul>
                    </div>
                </div>
            </div>

        </main>
    </div>

<script>
// Initialize the chart and fetch data on page load
let chart;
document.addEventListener('DOMContentLoaded', function () {
    fetchRevenueData('today'); // Initial fetch
    setInterval(() => {
        const timePeriod = document.getElementById('time_period').value; // Get current period
        fetchRevenueData(timePeriod); // Poll for updates
    }, 5000); // Fetch every 5 seconds
});

// Fetch revenue data and update UI elements
function fetchRevenueData(period) {
    fetch(`cyberbizwatch_sales_revenue.php?period=${period}`)
        .then(response => response.json())
        .then(data => {
            // Update total revenue display
            document.getElementById('total_revenue').textContent = '₱' + parseFloat(data.total_revenue).toFixed(2);

            // Update chart data
            const labels = data.dataPoints.map(point => point.label);
            const amounts = data.dataPoints.map(point => point.amount);

            if (chart) {
                // Update existing chart with new data
                chart.data.labels = labels;
                chart.data.datasets[0].data = amounts;
                chart.options.scales.x.title.text = period === 'today' ? 'Time (24-hour)' : 'Date';
                chart.update();
            } else {
                // Create the chart if it doesn't exist
                createChart(labels, amounts, period === 'today' ? 'Time (24-hour)' : 'Date');
            }

            // Update Top Gamers List
            const topGamersList = document.getElementById('top_gamers_list');
            topGamersList.innerHTML = ''; // Clear existing list
            data.topPlayers.forEach(player => {
                const listItem = document.createElement('li');
                listItem.textContent = `${player.Username}: ${player.balance} points`;
                topGamersList.appendChild(listItem);
            });
        })
        .catch(error => {
            console.error('Error fetching revenue data:', error);
        });
}

// Create a new chart
function createChart(labels, amounts, xAxisTitle) {
    const ctx = document.getElementById('linechart').getContext('2d');
    chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Sales Amount (PHP)',
                data: amounts,
                borderColor: '#3e95cd',
                backgroundColor: 'rgba(62, 149, 205, 0.2)',
                fill: true,
                tension: 0.1,
                pointRadius: 5,
                pointHoverRadius: 7
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: { 
                    title: { display: true, text: xAxisTitle } 
                },
                y: {
                    title: { display: true, text: 'Total Amount (PHP)' },
                    ticks: {
                        callback: value => '₱' + value
                    }
                }
            }
        }
    });
}

</script>

</body>
</html>
