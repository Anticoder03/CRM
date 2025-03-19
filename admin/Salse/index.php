<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Additional animation styles */
        .hover-animate {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-animate:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body class="bg-gray-100 flex flex-col items-center min-h-screen py-10">

    <h1 class="text-3xl font-bold text-gray-800 mb-8">Dashboard</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-4/5">

        <!-- Add New Sale Card -->
        <div class="hover-animate bg-white p-6 rounded-lg shadow-md cursor-pointer" id="newSaleCard">
            <div class="flex items-center justify-center h-24 bg-blue-100 rounded-md mb-4">
                <svg class="w-12 h-12 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-700 text-center">Add New Sale</h3>
        </div>

        <!-- View Records Card -->
        <div class="hover-animate bg-white p-6 rounded-lg shadow-md cursor-pointer" id="viewRecordsCard">
            <div class="flex items-center justify-center h-24 bg-green-100 rounded-md mb-4">
                <svg class="w-12 h-12 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m4 18V3m4 8H9" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-700 text-center">View Records</h3>
        </div>

        <!-- Charts Card -->
        <div class="hover-animate bg-white p-6 rounded-lg shadow-md cursor-pointer" id="chartsCard">
            <div class="flex items-center justify-center h-24 bg-yellow-100 rounded-md mb-4">
                <svg class="w-12 h-12 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6m6 13V10" />
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-700 text-center">Charts</h3>
        </div>

    </div>

    <script>
        $(document).ready(function() {
            // Redirect on card click
            $('#newSaleCard').click(function() {
                window.location.href = 'record_sale.php';
            });

            $('#viewRecordsCard').click(function() {
                window.location.href = 'admin_panal.php';
            });

            $('#chartsCard').click(function() {
                window.location.href = 'Charts/';
            });
        });
    </script>

</body>
</html>
