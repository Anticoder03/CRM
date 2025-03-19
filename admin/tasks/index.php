<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Custom styles for card hover effect */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 250px; /* Increase card height */
            width: 100%;   /* Set card width to full */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .card-link {
            display: block;
            text-align: center;
            padding: 20px;
            color: white;
            text-decoration: none;
            font-size: 1.5rem; /* Increased font size */
            font-weight: bold;
            height: 100%; /* Ensures the link occupies the full height of the card */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .card-link:hover {
            opacity: 0.8;
        }

        .card i {
            font-size: 3rem; /* Increased icon size */
            margin-bottom: 10px;
        }

        .card span {
            font-size: 1.5rem; /* Increased text size */
            text-align: center;
        }
    </style>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-7xl mx-auto">
        <!-- Dashboard Header -->
        <div class="text-center mb-8">
            <h1 class="text-5xl font-extrabold text-gray-800">Task Management System</h1> <!-- Increased header size -->
            <p class="mt-2 text-xl text-gray-600">Manage and Track Tasks Efficiently</p> <!-- Increased subheader size -->
        </div>

        <!-- Card Section (2 cards per row) -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <!-- Add Task Card -->
            <div class="card bg-blue-500 rounded-lg shadow-lg hover:shadow-xl">
            <a href="Task_manage.php" target="mainframe" class="card-link">

                    <span class="block mb-2">Add New Task</span>
                    <i class="fa fa-plus-circle"></i>
                </a>
            </div>

            <!-- View Task Card -->
            <div class="card bg-green-500 rounded-lg shadow-lg hover:shadow-xl">
                <a href="DisplayTask.php" target="mainframe" class="card-link">
                    <span class="block mb-2">View All Tasks</span>
                    <i class="fa fa-tasks"></i>
                </a>
            </div>

            <!-- View Chart Card -->
            <div class="card bg-yellow-500 rounded-lg shadow-lg hover:shadow-xl">
                <a href="task_desh.php" target="mainframe" class="card-link">
                    <span class="block mb-2">View Task Analytics</span>
                    <i class="fa fa-chart-pie"></i>
                </a>
            </div>

            <!-- View Calendar Card -->
            <div class="card bg-red-500 rounded-lg shadow-lg hover:shadow-xl">
                <a href="task_calander.php" target="mainframe" class="card-link">
                    <span class="block mb-2">Task Calendar</span>
                    <i class="fa fa-calendar-alt"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- jQuery fade-in effect -->
    <script>
        $(document).ready(function() {
            $(".card").hide().fadeIn(1500);  // Apply fade-in effect to cards
        });
        
    </script>

</body>
</html>
