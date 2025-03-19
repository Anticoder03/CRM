<?php
// Include database connection
include '../../includes/db.php';

// Initialize arrays to store chart data
$labels = ['Completed', 'Pending', 'Cancelled'];
$data = [0, 0, 0]; // Default values for each status

// SQL query to get the count of sales for each sale_status
$sql = "SELECT sale_status, COUNT(*) AS count 
        FROM sales 
        GROUP BY sale_status";
$result = $conn->query($sql);

// Fetch the data and prepare it for the chart
while ($row = $result->fetch_assoc()) {
    if ($row['sale_status'] == 'completed') {
        $data[0] = $row['count']; // Count for 'completed' sales
    } elseif ($row['sale_status'] == 'pending') {
        $data[1] = $row['count']; // Count for 'pending' sales
    } elseif ($row['sale_status'] == 'cancelled') {
        $data[2] = $row['count']; // Count for 'cancelled' sales
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Status Distribution</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body class="bg-gray-100 flex flex-col items-center min-h-screen py-10">

    <!-- Go Back Button -->
    <div class="absolute top-4 left-4">
        <a href="javascript:history.back()" class="flex items-center bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            <i class="fa-solid fa-arrow-left mr-2"></i> Go Back
        </a>
    </div>

    <h2 class="text-2xl font-bold text-gray-800 mb-6">Sales Status Distribution</h2>
    
    <!-- Pie Chart Canvas -->
    <div class="w-3/4 lg:w-1/2 bg-white shadow-lg rounded-lg p-6 animate-fadeIn">
        <canvas id="salesStatusChart" width="600" height="400" style="margin: 0 auto;"></canvas>
    </div>

    <script>
        // Fetching PHP data (replace with your actual PHP data)
        const labels = <?php echo json_encode($labels); ?>; // Sale Status labels (e.g., completed, pending, cancelled)
        const data = <?php echo json_encode($data); ?>; // Count of sales for each status

        const ctx = document.getElementById('salesStatusChart').getContext('2d');

        // Create a new pie chart (can change to donut chart by modifying options)
        const salesStatusChart = new Chart(ctx, {
            type: 'pie', // Use 'donut' for a donut chart
            data: {
                labels: labels,
                datasets: [{
                    label: 'Sales Status Distribution',
                    data: data,
                    backgroundColor: ['#4CAF50', '#FFEB3B', '#F44336'], // Colors for completed, pending, cancelled
                    hoverBackgroundColor: ['#45a049', '#f1c40f', '#e74c3c'], // Hover colors
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' Sales';
                            }
                        }
                    },
                    // For Donut Chart, we can add this setting
                    doughnut: {
                        cutoutPercentage: 50, // For donut chart (default is 0 for pie chart)
                    }
                }
            }
        });
    </script>

</body>
</html>
