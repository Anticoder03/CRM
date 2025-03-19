<?php
// Include database connection
include '../../includes/db.php';

// Initialize arrays to store chart data
$labels = [];
$data = [];

// SQL query to get sales data grouped by month
$sql = "SELECT DATE_FORMAT(sale_date, '%Y-%m') AS month, SUM(sale_amount) AS total_sales 
        FROM sales
        GROUP BY month
        ORDER BY month";
$result = $conn->query($sql);

// Fetch the data and prepare it for the chart
while ($row = $result->fetch_assoc()) {
    $labels[] = $row['month']; // Store the date/month on X-Axis
    $data[] = $row['total_sales']; // Store the total sales amount on Y-Axis
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales by Date</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animate/1.0.0/jquery.animate.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100 flex flex-col items-center min-h-screen py-10">

    <!-- Go Back Button -->
    <div class="absolute top-4 left-4">
        <a href="javascript:history.back()" class="flex items-center bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            <i class="fa-solid fa-arrow-left mr-2"></i> Go Back
        </a>
    </div>

    <h2 class="text-2xl font-bold text-gray-800 mb-6">Sales by Date</h2>
    
    <div class="mb-8">
        <label for="chartType" class="block text-gray-700 font-medium mb-2">Select Chart Type:</label>
        <select id="chartType" class="border border-gray-300 rounded-md px-4 py-2 focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out">
            <option value="line">Line</option>
            <option value="bar">Bar</option>
        </select>
    </div>
    
    <div class="w-3/4 lg:w-1/2 bg-white shadow-lg rounded-lg p-6 animate-fadeIn">
        <canvas id="salesChart" width="500" height="300"></canvas>
    </div>

    <script>
        const labels = <?php echo json_encode($labels); ?>; 
        const data = <?php echo json_encode($data); ?>; 

        let currentChart;

        function renderChart(type) {
            const ctx = $('#salesChart')[0].getContext('2d');

            if (currentChart) {
                currentChart.destroy(); 
            }

            currentChart = new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Sales Amount',
                        data: data,
                        borderColor: '#FF5733',
                        backgroundColor: type === 'line' ? 'rgba(255, 87, 51, 0.2)' : ['#FF5733', '#33FF57', '#3357FF', '#FF33A6'],
                        fill: type === 'line',
                        tension: 0.3,
                    }]
                },
                options: {
                    responsive: true,
                    animation: {
                        duration: 1000,
                        easing: 'easeInOutBounce'
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                    }
                }
            });

            // Animate container
            $('#salesChart').parent().hide().fadeIn(800);
        }

        function updateChartType() {
            const selectedType = $('#chartType').val();
            renderChart(selectedType);
        }

        $(document).ready(function() {
            renderChart('line'); // Initial render

            $('#chartType').on('change', function() {
                updateChartType();
            });

            // Add a custom animation on chart type change
            $('#chartType').on('change', function() {
                $('#salesChart').animate({ opacity: 0.5 }, 300, function() {
                    $('#salesChart').animate({ opacity: 1 }, 300);
                });
            });
        });
    </script>

</body>
</html>
