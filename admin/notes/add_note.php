<?php
include '../includes/db.php'; // Database connection
session_start();

// Generate a CSRF token if not already set
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check CSRF token
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("CSRF token validation failed");
    }

    // Validate and sanitize inputs
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $associated_type = $_POST['associated_type'];
    $associated_id = filter_var($_POST['associated_id'], FILTER_VALIDATE_INT);
    $created_by = 1; // Replace with the actual logged-in user ID.
    $category = trim($_POST['category']);
    $tags = trim($_POST['tags']);

    if (empty($title) || empty($content) || !$associated_id) {
        die("Invalid input. Please ensure all fields are filled out correctly.");
    }

    // Prepared statement to prevent SQL injection
    $sql = "INSERT INTO notes (title, content, associated_type, associated_id, created_by, category, tags) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssisss", $title, $content, $associated_type, $associated_id, $created_by, $category, $tags);

    if ($stmt->execute()) {
        header("Location: view_notes.php?msg=Note added successfully");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto my-8">
        <button id="toggle-form" class="bg-blue-500 text-white px-4 py-2 rounded">Add Note</button>
        <form id="note-form" method="POST" class="hidden bg-white p-6 rounded shadow-md">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <input type="text" name="title" placeholder="Title" required class="block w-full border rounded mb-4 p-2">
            <textarea name="content" placeholder="Write your note here..." required class="block w-full border rounded mb-4 p-2"></textarea>
            <select name="associated_type" required class="block w-full border rounded mb-4 p-2">
                <option value="customer">Customer</option>
                <option value="lead">Lead</option>
                <option value="task">Task</option>
            </select>
            <input type="number" name="associated_id" placeholder="Associated Record ID" required class="block w-full border rounded mb-4 p-2">
            <input type="text" name="category" placeholder="Category" class="block w-full border rounded mb-4 p-2">
            <input type="text" name="tags" placeholder="Tags (comma-separated)" class="block w-full border rounded mb-4 p-2">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save Note</button>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $("#toggle-form").click(function () {
                $("#note-form").slideToggle();
            });
        });
    </script>
</body>
</html>
