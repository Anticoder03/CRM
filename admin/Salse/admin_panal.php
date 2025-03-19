<?php
include '../includes/db.php'; // Database connection file

// Fetch sales records from the database
$sql = "SELECT * FROM sales ORDER BY sale_date DESC";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Sales Records</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class="bg-gray-100">

    <!-- Admin Panel Header -->
    <div class="bg-blue-500 mb-7 p-6 text-white text-center font-semibold text-2xl">
        <h1>Admin Panel - Sales Records</h1>
    </div>
    <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onclick="history.go(-1);"><i class="fa-solid fa-arrow-left"></i> Go Back</a>

    <!-- Sales Table Section -->
    <div class="container mx-auto p-6">
        <!-- Success or Error Message -->
        <?php if (isset($successMessage)): ?>
            <div class="bg-green-100 text-green-700 px-4 py-3 mb-4 rounded"><?= $successMessage ?></div>
        <?php elseif (isset($errorMessage)): ?>
            <div class="bg-red-100 text-red-700 px-4 py-3 mb-4 rounded"><?= $errorMessage ?></div>
        <?php endif; ?>

        <!-- Sales Table -->
        <div class="overflow-x-auto bg-white p-4 rounded-lg shadow-lg">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="px-4 py-2">Sale Date</th>
                        <th class="px-4 py-2">Amount</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Payment Method</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr class="hover:bg-yellow-50 transition-all duration-300">
                                <td class="px-4 py-2 text-center"><?= date('Y-m-d', strtotime($row['sale_date'])) ?></td>
                                <td class="px-4 py-2 text-center"><?= number_format($row['sale_amount'], 2) ?></td>
                                <td class="px-4 py-2 text-center">
                                    <span class="px-2 py-1  text-white rounded-full <?= ($row['sale_status'] == 'completed') ? 'bg-green-500' : ($row['sale_status'] == 'pending' ? 'bg-yellow-500' : 'bg-red-500') ?>">
                                        <?= ucfirst($row['sale_status']) ?>
                                    </span>
                                </td>
                                <td class="px-4 py-2 text-center"><?= htmlspecialchars($row['payment_method']) ?></td>
                                <td class="px-4 py-2 text-center">
                                    <a href="edit_salse.php?id=<?php echo $row['sale_id'] ?>" class="bg-blue-500 text-white px-3 py-1 rounded-md hover:bg-blue-600 transition-all duration-200">Edit</a>
                                    <a href="delete_salse.php?id=<?php echo $row['sale_id'] ?>" class="bg-red-500  text-white px-3 py-1 rounded-md hover:bg-red-600 transition-all duration-200">Delete</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center px-4 py-2">No sales records found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Fade-in animation for the sales table
            $(".table-auto").hide().fadeIn(1000);
        });
    </script>

</body>
</html>
