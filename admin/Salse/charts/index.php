<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Analysis</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .hover-animate {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-animate:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <!-- Go Back Button -->
    <div class="absolute top-4 left-4">
        <a href="javascript:history.back()" class="flex items-center bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            <i class="fa-solid fa-arrow-left mr-2"></i> Go Back
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-4/5">
        
        <!-- By Date Section -->
        <div class="hover-animate bg-white p-8 rounded-lg shadow-md text-center cursor-pointer" id="byDate">
            <div class="flex items-center justify-center h-24 bg-indigo-100 rounded-md mb-4">
                <i class="fas fa-calendar-alt text-indigo-500 text-4xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-700">Sales By Date</h3>
            <p class="text-gray-600 mt-2">View detailed sales records sorted by date.</p>
        </div>

        <!-- Sales By Payment Method Section -->
        <div class="hover-animate bg-white p-8 rounded-lg shadow-md text-center cursor-pointer" id="salesByPaymentMethod">
            <div class="flex items-center justify-center h-24 bg-teal-100 rounded-md mb-4">
                <i class="fas fa-credit-card text-teal-500 text-4xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-700">Sales By Payment Method</h3>
            <p class="text-gray-600 mt-2">Analyze total sales based on payment methods used.</p>
        </div>

        <!-- Sales Status Distribution Section -->
        <div class="hover-animate bg-white p-8 rounded-lg shadow-md text-center cursor-pointer" id="salesStatusDistribution">
            <div class="flex items-center justify-center h-24 bg-pink-100 rounded-md mb-4">
                <i class="fas fa-chart-pie text-pink-500 text-4xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-700">Sales Status Distribution</h3>
            <p class="text-gray-600 mt-2">View sales distribution by order status.</p>
        </div>
        
    </div>

    <script>
        $(document).ready(function() {
            $('#byDate').click(function() {
                window.location.href = 'By_Date.php';
            });

            $('#salesByPaymentMethod').click(function() {
                window.location.href = 'sales_by_payment_method.php';
            });

            $('#salesStatusDistribution').click(function() {
                window.location.href = 'sales_status_distribution.php';
            });
        });
    </script>

</body>
</html>
