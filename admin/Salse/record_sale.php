<?php
include '../includes/db.php'; // Database connection file

// Initialize variables
$successMessage = $errorMessage = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sale_date = $_POST['sale_date'];
    $sale_amount = $_POST['sale_amount'];
    $sale_status = $_POST['sale_status'];
    $payment_method = $_POST['payment_method'];
    $notes = $_POST['notes'];

    // Validate fields
    if (empty($sale_date) || empty($sale_amount) || empty($sale_status)) {
        $errorMessage = "Please fill in all required fields.";
    } elseif (!is_numeric($sale_amount) || $sale_amount <= 0) {
        $errorMessage = "Sale amount must be a positive number.";
    } elseif (strtotime($sale_date) > time()) {
        $errorMessage = "Sale date cannot be in the future.";
    } elseif (empty($payment_method)) {
        $errorMessage = "Please specify the payment method.";
    } else {
        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO sales (sale_date, sale_amount, sale_status, payment_method, notes) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sdsss", $sale_date, $sale_amount, $sale_status, $payment_method, $notes);

        if ($stmt->execute()) {
            $successMessage = "Sale record added successfully!";
            // Clear the form after successful submission
            $sale_date = $sale_amount = $sale_status = $payment_method = $notes = "";
        } else {
            $errorMessage = "Error adding sale: " . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <!-- Go Back Button -->
    <div class="absolute top-4 left-4">
        <a href="javascript:history.back()" class="flex items-center bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            <i class="fa-solid fa-arrow-left mr-2"></i> Go Back
        </a>
    </div>

    <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-lg fade-in">
        <h2 class="text-2xl font-bold mb-6 text-center">Record New Sale</h2>

        <!-- Display success or error message -->
        <?php if ($successMessage): ?>
            <div class="bg-green-100 text-green-700 px-4 py-3 mb-4 rounded"><?= $successMessage ?></div>
        <?php elseif ($errorMessage): ?>
            <div class="bg-red-100 text-red-700 px-4 py-3 mb-4 rounded"><?= $errorMessage ?></div>
        <?php endif; ?>

        <form action="" method="POST" id="salesForm" class="space-y-4">
            <!-- Sale Date -->
            <div>
                <label for="sale_date" class="block font-semibold">Sale Date:</label>
                <input type="date" name="sale_date" value="<?= isset($sale_date) ? htmlspecialchars($sale_date) : date('Y-m-d') ?>" required class="w-full border border-gray-300 rounded p-2">
            </div>
            <!-- Sale Amount -->
            <div>
                <label for="sale_amount" class="block font-semibold">Sale Amount:</label>
                <input type="number" step="0.01" name="sale_amount" value="<?= isset($sale_amount) ? htmlspecialchars($sale_amount) : '' ?>" required class="w-full border border-gray-300 rounded p-2" placeholder="Enter amount">
            </div>
            <!-- Sale Status -->
            <div>
                <label for="sale_status" class="block font-semibold">Sale Status:</label>
                <select name="sale_status" class="w-full border border-gray-300 rounded p-2">
                    <option value="pending" <?= isset($sale_status) && $sale_status == 'pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="completed" <?= isset($sale_status) && $sale_status == 'completed' ? 'selected' : '' ?>>Completed</option>
                    <option value="cancelled" <?= isset($sale_status) && $sale_status == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                </select>
            </div>
            <!-- Payment Method -->
            <div>
                <label for="payment_method" class="block font-semibold">Payment Method:</label>
                <input type="text" name="payment_method" value="<?= isset($payment_method) ? htmlspecialchars($payment_method) : '' ?>" class="w-full border border-gray-300 rounded p-2" placeholder="e.g., Credit Card, Cash">
            </div>
            <!-- Notes -->
            <div>
                <label for="notes" class="block font-semibold">Notes:</label>
                <textarea name="notes" rows="3" class="w-full border border-gray-300 rounded p-2" placeholder="Enter additional notes..."><?= isset($notes) ? htmlspecialchars($notes) : '' ?></textarea>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save Sale</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            // Fade-in effect for the form
            $(".fade-in").hide().fadeIn(1000);
        });
    </script>
</body>
</html>
