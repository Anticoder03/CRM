<?php
include '../includes/db.php'; // Updated path for db connection
session_start();

$note_id = $_GET['id'];

// Fetch note details
$sql = "SELECT * FROM notes WHERE note_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $note_id);
$stmt->execute();
$note = $stmt->get_result()->fetch_assoc();

if (!$note) {
    die("Note not found.");
}

// Update note on form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $category = trim($_POST['category']);
    $tags = trim($_POST['tags']);

    // Validate inputs
    if (empty($title) || empty($content)) {
        die("Title and Content are required fields.");
    }

    // Update the note
    $sql = "UPDATE notes SET title = ?, content = ?, category = ?, tags = ? WHERE note_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssii", $title, $content, $category, $tags, $note_id);

    if ($stmt->execute()) {
        header("Location: view_notes.php?msg=Note updated successfully");
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
        <h1 class="text-2xl font-bold text-center mb-6">Edit Note</h1>
        <form method="POST" id="edit-note-form" class="bg-white p-6 rounded shadow-md">
            <label class="block mb-2 font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($note['title']); ?>" 
                required class="block w-full border rounded mb-4 p-2">

            <label class="block mb-2 font-medium text-gray-700">Content</label>
            <textarea name="content" required class="block w-full border rounded mb-4 p-2">
                <?php echo htmlspecialchars($note['content']); ?>
            </textarea>

            <label class="block mb-2 font-medium text-gray-700">Category</label>
            <input type="text" name="category" value="<?php echo htmlspecialchars($note['category']); ?>" 
                class="block w-full border rounded mb-4 p-2">

            <label class="block mb-2 font-medium text-gray-700">Tags</label>
            <input type="text" name="tags" value="<?php echo htmlspecialchars($note['tags']); ?>" 
                class="block w-full border rounded mb-4 p-2">

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">Update Note</button>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            // Add animation to form fields on focus
            $('input, textarea').focus(function () {
                $(this).animate({ borderWidth: '3px', borderColor: '#3b82f6' }, 200);
            }).blur(function () {
                $(this).animate({ borderWidth: '1px', borderColor: '#d1d5db' }, 200);
            });

            // Add submit animation
            $('#edit-note-form').on('submit', function () {
                $(this).fadeOut(300, function () {
                    $(this).html('<p class="text-center text-green-600">Updating...</p>').fadeIn(300);
                });
            });
        });
    </script>
</body>
</html>
