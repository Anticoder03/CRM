<?php
include '../includes/db.php'; // Database connection file

// Initialize variables
$successMessage = $errorMessage = "";

// Check if a sale ID is passed in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $sale_id = $_GET['id'];

    // Fetch the sale record based on the provided ID
    $sql = "SELECT * FROM sales WHERE sale_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $sale_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $sale = $result->fetch_assoc();
    } else {
        $errorMessage = "Sale record not found.";
    }
    $stmt->close();
} else {
    $errorMessage = "Invalid sale ID.";
}

// Handle form submission for updating sale details
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
    } else {
        // Prepare and bind the SQL statement to update the sale record
        $sql = "UPDATE sales SET sale_date = ?, sale_amount = ?, sale_status = ?, payment_method = ?, notes = ? WHERE sale_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sdsssi", $sale_date, $sale_amount, $sale_status, $payment_method, $notes, $sale_id);

        if ($stmt->execute()) {
            $successMessage = "Sale record updated successfully!";
            header("location:admin_panal.php");
        } else {
            $errorMessage = "Error updating sale: " . $stmt->error;
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
    <title>Edit Sale</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100">

    <!-- Admin Panel Header -->
    <div class="bg-blue-500 p-6 text-white text-center font-semibold text-2xl">
        <h1>Edit Sale Record</h1>
    </div>

    <!-- Edit Sale Form Section -->
    <div class="container mx-auto p-6">
        <!-- Display success or error message -->
        <?php if ($successMessage): ?>
            <div class="bg-green-100 text-green-700 px-4 py-3 mb-4 rounded"><?= $successMessage ?></div>
        <?php elseif ($errorMessage): ?>
            <div class="bg-red-100 text-red-700 px-4 py-3 mb-4 rounded"><?= $errorMessage ?></div>
        <?php endif; ?>

        <!-- Sale Edit Form -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <form action="" method="POST" class="space-y-4">
                <!-- Sale Date -->
                <div>
                    <label for="sale_date" class="block font-semibold">Sale Date:</label>
                    <input type="date" name="sale_date" value="<?= isset($sale['sale_date']) ? htmlspecialchars($sale['sale_date']) : '' ?>" required class="w-full border border-gray-300 rounded p-2">
                </div>
                <!-- Sale Amount -->
                <div>
                    <label for="sale_amount" class="block font-semibold">Sale Amount:</label>
                    <input type="number" step="0.01" name="sale_amount" value="<?= isset($sale['sale_amount']) ? htmlspecialchars($sale['sale_amount']) : '' ?>" required class="w-full border border-gray-300 rounded p-2" placeholder="Enter amount">
                </div>
                <!-- Sale Status -->
                <div>
                    <label for="sale_status" class="block font-semibold">Sale Status:</label>
                    <select name="sale_status" class="w-full border border-gray-300 rounded p-2">
                        <option value="pending" <?= isset($sale['sale_status']) && $sale['sale_status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="completed" <?= isset($sale['sale_status']) && $sale['sale_status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
                        <option value="cancelled" <?= isset($sale['sale_status']) && $sale['sale_status'] == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                    </select>
                </div>
                <!-- Payment Method -->
                <div>
                    <label for="payment_method" class="block font-semibold">Payment Method:</label>
                    <input type="text" name="payment_method" value="<?= isset($sale['payment_method']) ? htmlspecialchars($sale['payment_method']) : '' ?>" class="w-full border border-gray-300 rounded p-2" placeholder="e.g., Credit Card, Cash">
                </div>
                <!-- Notes -->
                <div>
                    <label for="notes" class="block font-semibold">Notes:</label>
                    <textarea name="notes" rows="3" class="w-full border border-gray-300 rounded p-2" placeholder="Enter additional notes..."><?= isset($sale['notes']) ? htmlspecialchars($sale['notes']) : '' ?></textarea>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update Sale</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Fade-in effect for the form
            $(".bg-white").hide().fadeIn(1000);
        });
    </script>

</body>
</html>
