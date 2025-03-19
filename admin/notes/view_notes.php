<?php
include '../includes/db.php'; // Database connection

$sql = "SELECT * FROM notes ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto my-8">
        <canvas id="notesChart" class="mb-8"></canvas>
        <table class="table-auto w-full bg-white rounded shadow">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Content</th>
                    <th class="px-4 py-2">Category</th>
                    <th class="px-4 py-2">Tags</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($row['title']); ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($row['content']); ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($row['category']); ?></td>
                    <td class="border px-4 py-2"><?php echo htmlspecialchars($row['tags']); ?></td>
                    <td class="border px-4 py-2">
                        <a href="edit_note.php?id=<?php echo $row['note_id']; ?>" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                        <a href="delete_note.php?id=<?php echo $row['note_id']; ?>" class="bg-red-500 text-white px-2 py-1 rounded" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
