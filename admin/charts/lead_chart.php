<?php
// Example: Fetching data from the database
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

// Query to get data
$sql = "SELECT company_name, opportunity_value FROM leads";
$result = $conn->query($sql);

// Prepare data for the chart
$labels = [];
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['company_name'];
        $data[] = $row['opportunity_value'];
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
    <title>Lead Chart</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 shadow-lg rounded-lg w-full max-w-xl">
        <h1 class="text-2xl font-bold text-center text-gray-700 mb-4">Opportunity Value Chart</h1>

        <!-- Dropdown to select chart type -->
        <div class="flex justify-center mb-6">
            <label for="chartType" class="mr-4 text-gray-600">Select Chart Type:</label>
            <select id="chartType" class="px-4 py-2 border border-gray-300 rounded-md">
                <option value="bar">Bar</option>
                <option value="line">Line</option>
                <option value="pie">Pie</option>
                <option value="radar">Radar</option>
                <option value="doughnut">Doughnut</option>
            </select>
        </div>

        <!-- Canvas element for the chart -->
        <div class="flex justify-center">
            <canvas id="myChart" width="700" height="500"></canvas>
        </div>
    </div>

    <script>
        // Prepare chart data
        var chartData = {
            labels: <?php echo json_encode($labels); ?>, // PHP data to JavaScript
            datasets: [{
                label: 'Opportunity Value Data',
                data: <?php echo json_encode($data); ?>, // PHP data to JavaScript
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)', // Red
                    'rgba(54, 162, 235, 0.5)', // Blue
                    'rgba(75, 192, 192, 0.5)', // Teal
                    'rgba(255, 206, 86, 0.5)', // Yellow
                    'rgba(153, 102, 255, 0.5)', // Purple
                    'rgba(255, 159, 64, 0.5)', // Orange
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                ],
                borderWidth: 1
            }]
        };

        // Create a variable to store the chart
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // Default chart type is bar
            data: chartData,
            options: {
                responsive: true, // Enable responsive behavior
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Event listener for dropdown change
        document.getElementById('chartType').addEventListener('change', function() {
            var selectedChartType = this.value; // Get selected chart type from the dropdown

            // Destroy the previous chart and create a new one with the selected type
            myChart.destroy();
            myChart = new Chart(ctx, {
                type: selectedChartType,
                data: chartData,
                options: {
                    responsive: true, // Enable responsive behavior
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
