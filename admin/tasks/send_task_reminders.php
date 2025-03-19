<?php
date_default_timezone_set("Asia/Kolkata");
include '../includes/db.php';

// Fetch tasks due in two days that are not completed and haven't had reminders sent
$sql = "SELECT * FROM tasks 
        WHERE DATE(due_date) = CURDATE() + INTERVAL 2 DAY 
        AND reminder_sent = FALSE 
        AND status != 'completed'";
        
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($task = $result->fetch_assoc()) {
        $to = $task['email'];
        $subject = "Task Reminder: " . $task['task_name'];
        $message = "Hello " . $task['assigned_member'] . ",\n\nThis is a reminder that your task '" . $task['task_name'] . "' is due on " . $task['due_date'] . ".\n\nPlease ensure it's completed on time.\n\nThank you.";

        if (mail($to, $subject, $message)) {
            // Update reminder_sent to TRUE after sending the reminder email
            $updateSql = "UPDATE tasks SET reminder_sent = TRUE WHERE task_id = " . $task['task_id'];
            $conn->query($updateSql);
        }
    }
} else {
    echo "No reminders to send.";
}

$conn->close();
?>


<!-- this has to done every day at 9:00 AM  -->
<!-- 0 9 * * * php /path/to/send_task_reminders.php -->