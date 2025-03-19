<?php
include '../includes/db.php';
date_default_timezone_set("Asia/Kolkata");

// Fetching the task counts based on status
$sql_pending = "SELECT COUNT(*) FROM tasks WHERE status = 'pending'";
$result_pending = $conn->query($sql_pending);
$pending_tasks = $result_pending->fetch_row()[0];

$sql_in_progress = "SELECT COUNT(*) FROM tasks WHERE status = 'in-progress'";
$result_in_progress = $conn->query($sql_in_progress);
$in_progress_tasks = $result_in_progress->fetch_row()[0];

$sql_completed = "SELECT COUNT(*) FROM tasks WHERE status = 'completed'";
$result_completed = $conn->query($sql_completed);
$completed_tasks = $result_completed->fetch_row()[0];

// Total number of tasks
$sql_total = "SELECT COUNT(*) FROM tasks";
$result_total = $conn->query($sql_total);
$total_tasks = $result_total->fetch_row()[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-gray-100 p-10">
<a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="history.go(-1);"><i class="fa-solid fa-arrow-left"></i> go back</a>

    <div class="max-w-4xl mx-auto bg-white p-8 shadow rounded-lg">
        <h2 class="text-2xl font-bold mb-6">Task Dashboard</h2>

        <!-- Task Count -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <div class="bg-blue-500 text-white p-4 rounded">
                <h3>Total Tasks</h3>
                <p class="text-xl"><?= $total_tasks ?></p>
            </div>

            <!-- Pending Tasks -->
            <div class="bg-red-500 text-white p-4 rounded">
                <h3>Pending Tasks</h3>
                <p class="text-xl"><?= $pending_tasks ?></p>
            </div>

            <!-- In Progress Tasks -->
            <div style="background-color: #FFA500;" class="text-white p-4 rounded">
                <h3>In Progress Tasks</h3>
                <p class="text-xl"><?= $in_progress_tasks ?></p>
            </div>

            <!-- Completed Tasks -->
            <div class="bg-green-500 text-white p-4 rounded">
                <h3>Completed Tasks</h3>
                <p class="text-xl"><?= $completed_tasks ?></p>
            </div>
        </div>

        <!-- Task Status Pie Chart -->
        <div class="mt-10">
            <canvas id="taskStatusChart"></canvas>
        </div>
    </div>

    <script>
        // Task Status Pie Chart
        var ctx = document.getElementById('taskStatusChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Pending', 'In Progress', 'Completed'],
                datasets: [{
                    data: [<?= $pending_tasks ?>, <?= $in_progress_tasks ?>, <?= $completed_tasks ?>],
                    backgroundColor: ['#FF6347', '#FFA500', '#32CD32'],
                }]
            }
        });
    </script>
</body>
</html>

<?php $conn->close(); ?>
