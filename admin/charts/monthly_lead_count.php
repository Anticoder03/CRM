<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get monthly lead count
$sql = "SELECT DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS lead_count
        FROM leads
        GROUP BY DATE_FORMAT(created_at, '%Y-%m')";
$result = $conn->query($sql);

// Prepare data for the chart
$months = [];
$lead_counts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $months[] = $row['month'];
        $lead_counts[] = $row['lead_count'];
    }
} else {
    echo "No results found!";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Lead Count</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 shadow-lg rounded-lg w-full max-w-xl">
        <h1 class="text-2xl font-bold text-center text-gray-700 mb-4">Monthly Lead Count</h1>

        <!-- Dropdown to select chart type -->
        <div class="flex justify-center mb-6">
            <label for="chartType" class="mr-4 text-gray-600">Select Chart Type:</label>
            <select id="chartType" class="px-4 py-2 border border-gray-300 rounded-md">
                <option value="line">Line</option>
                <option value="bar">Bar</option>
            </select>
        </div>

        <!-- Canvas element for the chart -->
        <div class="flex justify-center">
            <canvas id="monthlyLeadChart" width="700" height="500"></canvas>
        </div>
    </div>

    <script>
        // Prepare chart data
        var chartData = {
            labels: <?php echo json_encode($months); ?>, // PHP data to JavaScript
            datasets: [{
                label: 'Leads Created',
                data: <?php echo json_encode($lead_counts); ?>, // PHP data to JavaScript
                backgroundColor: 'rgba(54, 162, 235, 0.5)', // Blue
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                fill: false,
                tension: 0.4 // Smoothens the line for line charts
            }]
        };

        // Initialize the chart
        var ctx = document.getElementById('monthlyLeadChart').getContext('2d');
        var monthlyLeadChart = new Chart(ctx, {
            type: 'line', // Default chart type
            data: chartData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Event listener for dropdown change
        document.getElementById('chartType').addEventListener('change', function() {
            var selectedChartType = this.value;

            // Destroy previous chart and create a new one with the selected type
            monthlyLeadChart.destroy();
            monthlyLeadChart = new Chart(ctx, {
                type: selectedChartType,
                data: chartData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

</body>
</html>
