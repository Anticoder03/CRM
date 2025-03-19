<?php
include '../includes/db.php';
date_default_timezone_set("Asia/Kolkata");

// Fetch all tasks and their due dates
$sql = "SELECT task_id, task_name, due_date, status FROM tasks";
$result = $conn->query($sql);
$tasks = [];

while ($task = $result->fetch_assoc()) {
    $tasks[] = [
        'task_id' => $task['task_id'],
        'task_name' => $task['task_name'],
        'due_date' => $task['due_date'],
        'status' => $task['status']
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Calendar</title>
    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.print.css" rel="stylesheet" media="print">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
     
        #calendar {
            max-width: 80%; 
            margin: 0 auto; 
            height: 500px; 
            width: 55rem;
        }
    </style>
</head>
<body class="bg-gray-100 p-10">
    
    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="history.go(-1);"><i class="fa-solid fa-arrow-left"></i> go back</a>
    <div class="max-w-4xl mx-auto bg-white p-8 shadow rounded-lg">
        <h2 class="text-2xl font-bold mb-6">Task Calendar</h2>

        <!-- Calendar container -->
        <div id="calendar"></div>
    </div>

    <script>
        $(document).ready(function() {
            var tasks = <?php echo json_encode($tasks); ?>; // Fetch tasks from PHP into JS

            var events = tasks.map(function(task) {
                return {
                    title: task.task_name + ' (' + task.status + ')', // Task name with status
                    start: task.due_date, // Task due date
                    description: task.task_name, // Optional: you can add description as well
                    color: task.status === 'completed' ? '#32CD32' : (task.status === 'in-progress' ? '#FFA500' : '#FF6347'), // Status-based color
                    textColor: '#fff', // White text for better contrast
                    url: 'track_task2.php?task_id=' + task.task_id // Link to task details page
                };
            });

            // Initialize FullCalendar
            $('#calendar').fullCalendar({
                events: events,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: true,
                droppable: false, // Disable task dragging
                eventClick: function(event) {
                    // If you want to handle event click, redirect or display task details
                    window.location.href = event.url;
                }
            });
        });
    </script>

</body>
</html>

<?php $conn->close(); ?>
