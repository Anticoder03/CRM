<?php
// Include database connection
include '../../includes/db.php';

// Initialize arrays to store chart data
$labels = [];
$data = [];
$paymentMethods = [];

// SQL query to get total sales grouped by payment_method
$sql = "SELECT payment_method, SUM(sale_amount) AS total_sales
        FROM sales
        GROUP BY payment_method";
$result = $conn->query($sql);

// Fetch the data and prepare it for the chart
while ($row = $result->fetch_assoc()) {
    $paymentMethods[] = $row['payment_method']; // Store payment methods (e.g., Credit Card, Cash)
    $data[] = $row['total_sales']; // Store total sales amount for each payment method
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales by Payment Method</title>
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

    <h2 class="text-2xl font-bold text-gray-800 mb-6">Sales by Payment Method</h2>
    
    <!-- Chart Canvas -->
    <div class="w-3/4 lg:w-1/2 bg-white shadow-lg rounded-lg p-6 animate-fadeIn">
        <canvas id="paymentMethodChart" width="600" height="400" style="margin: 0 auto;"></canvas>
    </div>

    <script>
        // Fetching PHP data (replace with your actual PHP data)
        const labels = <?php echo json_encode($paymentMethods); ?>; // Payment methods (e.g., Credit Card, Cash)
        const data = <?php echo json_encode($data); ?>; // Total sales amount for each payment method

        const ctx = document.getElementById('paymentMethodChart').getContext('2d');

        const paymentMethodChart = new Chart(ctx, {
            type: 'bar', // Use 'bar' for a bar chart
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total Sales Amount',
                    data: data,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Payment Method'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Total Sales Amount'
                        },
                        beginAtZero: true
                    }
                },
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
                }
            }
        });
    </script>

</body>
</html>
