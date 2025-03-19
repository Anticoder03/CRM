<?php
include '../includes/db.php';

// Set Indian time zone
date_default_timezone_set("Asia/Kolkata");

// AJAX request to update task status
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $task_id = $_POST['task_id'];
    $new_status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE tasks SET status = ? WHERE task_id = ?");
    $stmt->bind_param("si", $new_status, $task_id);
    $stmt->execute();
    echo "Status updated";
    exit();
}

// Fetch tasks for display
$sql = "SELECT * FROM tasks ORDER BY due_date";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Management</title>
    
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-gray-100 p-10">
    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="history.go(-1);"><i class="fa-solid fa-arrow-left"></i> go back</a>
    <div class="max-w-4xl mx-auto mt-10 bg-white p-8 shadow rounded-lg">

        <h2 class="text-2xl font-bold mb-6">Task List</h2>
        <table id="taskTable" class="w-full border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Task Name</th>
                    <th class="border px-4 py-2">Assigned</th>
                    <th class="border px-4 py-2">Due Date</th>
                    <th class="border px-4 py-2">Priority</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Completion (%)</th> <!-- New column -->
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($task = $result->fetch_assoc()): ?>
                    <tr class="text-center fade-in">
                        <td class="border px-4 py-2"><?= htmlspecialchars($task['task_name']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($task['assigned_member']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($task['due_date']) ?></td>
                        <td class="border px-4 py-2 <?= $task['priority'] == 'high' ? 'text-red-600 font-bold' : '' ?>">
                            <?= htmlspecialchars(ucfirst($task['priority'])) ?>
                        </td>
                        <td class="border px-4 py-2">
                            <select class="status-update" data-id="<?= $task['task_id'] ?>">
                                <option value="pending" <?= $task['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                                <option value="in-progress" <?= $task['status'] == 'in-progress' ? 'selected' : '' ?>>In-Progress</option>
                                <option value="completed" <?= $task['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
                            </select>
                        </td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($task['completion_percentage']) ?>%</td> <!-- New field -->
                        <td class="border px-4 flex py-2">
                            <a href="track_task.php?task_id=<?= $task['task_id'] ?>" class="bg-yellow-500 mx-3 text-white px-4 py-2 rounded hover:bg-yellow-600">Update</a>
                            <a href="delete_task.php?task_id=<?= $task['task_id'] ?>" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script>
        // Initialize DataTable
        $(document).ready(function() {
            $('#taskTable').DataTable({
                searching: true, // Enables search functionality
                paging: true,    // Enables pagination
                ordering: true   // Enables column sorting
            });

            // Fade-in effect for tasks
            $(".fade-in").hide().fadeIn(1000);

            // AJAX status update
            $('.status-update').change(function() {
                var task_id = $(this).data('id');
                var new_status = $(this).val();

                $.ajax({
                    url: '', // Current page
                    type: 'POST',
                    data: {
                        update_status: true,
                        task_id: task_id,
                        status: new_status
                    },
                    success: function(response) {
                        alert(response); // Show success message
                    },
                    error: function() {
                        alert("Error updating status!");
                    }
                });
            });
        });
    </script>
</body>
</html>
<?php $conn->close(); ?>
