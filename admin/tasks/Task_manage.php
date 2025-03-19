<?php
include '../includes/db.php';

// Set Indian time zone
date_default_timezone_set("Asia/Kolkata");

// Handle form submission to add a new task
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_task'])) {
    $task_name = $_POST['task_name'];
    $description = $_POST['description'];
    $assigned_member = $_POST['assigned_member'];
    $due_date = $_POST['due_date'];
    $priority = $_POST['priority'];
    $status = $_POST['status'];
    $email = $_POST['email']; // New email field

    $stmt = $conn->prepare("INSERT INTO tasks (task_name, description, assigned_member, due_date, priority, status, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $task_name, $description, $assigned_member, $due_date, $priority, $status, $email);
    $stmt->execute();
    $stmt->close();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</head>
<body class="bg-gray-100 p-10">
<a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="history.go(-1);"><i class="fa-solid fa-arrow-left"></i> go back</a>

    <div class="max-w-4xl mx-auto bg-white p-8 shadow rounded-lg">
        <h2 class="text-2xl font-bold mb-6">Create Task</h2>
        <form method="POST" class="space-y-4">
            <input type="hidden" name="add_task" value="1">
            <div>
                <label for="task_name" class="block font-semibold">Task Name:</label>
                <input type="text" name="task_name" required class="w-full border border-gray-300 rounded p-2">
            </div>
            <div>
                <label for="description" class="block font-semibold">Description:</label>
                <textarea name="description" rows="3" class="w-full border border-gray-300 rounded p-2"></textarea>
            </div>
            <div>
                <label for="assigned_member" class="block font-semibold">Assigned Member:</label>
                <input type="text" name="assigned_member" class="w-full border border-gray-300 rounded p-2">
            </div>
            <div>
                <label for="email" class="block font-semibold">Email:</label>
                <input type="email" name="email" required class="w-full border border-gray-300 rounded p-2">
            </div>
            <div>
                <label for="due_date" class="block font-semibold">Due Date:</label>
                <input type="date" name="due_date" required class="w-full border border-gray-300 rounded p-2">
            </div>
            <div>
                <label for="priority" class="block font-semibold">Priority:</label>
                <select name="priority" class="w-full border border-gray-300 rounded p-2">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                </select>
            </div>
            <div>
                <label for="status" class="block font-semibold">Status:</label>
                <select name="status" class="w-full border border-gray-300 rounded p-2">
                    <option value="pending">Pending</option>
                    <option value="in-progress">In-Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create Task</button>
        </form>
    </div>

  
 

 
</body>
</html>
<?php $conn->close(); ?>
