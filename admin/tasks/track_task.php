<?php
include '../includes/db.php';
date_default_timezone_set("Asia/Kolkata");

// Handle form submission for updating task status and progress
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_task'])) {
    $task_id = $_POST['task_id'];
    $status = $_POST['status'];
    $completion_percentage = $_POST['completion_percentage'];

    $updated_at = date("Y-m-d H:i:s");

    // Set completion timestamp if task is marked as completed
    $completed_at = ($status === 'completed') ? $updated_at : NULL;

    // Update the task in the database
    $stmt = $conn->prepare("UPDATE tasks SET status = ?, completion_percentage = ?, updated_at = ?, completed_at = ? WHERE task_id = ?");
    $stmt->bind_param("sissi", $status, $completion_percentage, $updated_at, $completed_at, $task_id);
    $stmt->execute();
    $stmt->close();
}

// Fetch the task data for display
$task_id = $_GET['task_id'] ?? 1; // Replace with actual task ID or fetch dynamically
$sql = "SELECT * FROM tasks WHERE task_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $task_id);
$stmt->execute();
$task = $stmt->get_result()->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Task Progress</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100 p-10">
<a href="./DisplayTask.php" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="history.go(-1);"><i class="fa-solid fa-arrow-left"></i> go back</a>
<div class="max-w-2xl mx-auto bg-white p-8 shadow rounded-lg">
    <h2 class="text-2xl font-bold mb-6">Track Task Progress</h2>

    <form method="POST">
        <input type="hidden" name="task_id" value="<?= $task['task_id'] ?>">

        <!-- Task Name -->
        <div class="mb-4">
            <label class="block font-semibold">Task Name:</label>
            <p><?= htmlspecialchars($task['task_name']) ?></p>
        </div>

        <!-- Status Update -->
        <div class="mb-4">
            <label for="status" class="block font-semibold">Status:</label>
            <select name="status" class="w-full border border-gray-300 rounded p-2">
                <option value="pending" <?= $task['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="in-progress" <?= $task['status'] == 'in-progress' ? 'selected' : '' ?>>In-Progress</option>
                <option value="completed" <?= $task['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
            </select>
        </div>

        <!-- Completion Percentage -->
        <div class="mb-4">
            <label for="completion_percentage" class="block font-semibold">Completion Percentage:</label>
            <input type="number" name="completion_percentage" value="<?= htmlspecialchars($task['completion_percentage']) ?>" min="0" max="100" class="w-full border border-gray-300 rounded p-2">
        </div>

        <!-- Progress Bar -->
        <div class="mb-4">
            <label class="block font-semibold">Progress:</label>
            <div class="w-full bg-gray-300 rounded">
                <div class="bg-blue-500 text-white text-sm font-bold p-1 rounded" style="width: <?= $task['completion_percentage'] ?>%;">
                    <?= $task['completion_percentage'] ?>%
                </div>
            </div>
        </div>

        <button type="submit" name="update_task" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Task</button>
    </form>

    <!-- Timestamps Display -->
    <div class="mt-6">
        <h3 class="text-lg font-bold">Task Timeline</h3>
        <p><strong>Created At:</strong> <?= htmlspecialchars($task['created_at']) ?></p>
        <p><strong>Last Updated At:</strong> <?= htmlspecialchars($task['updated_at']) ?></p>
        <p><strong>Completed At:</strong> <?= $task['completed_at'] ? htmlspecialchars($task['completed_at']) : 'Not completed' ?></p>
    </div>
</div>

</body>
</html>

<?php $conn->close(); ?>
