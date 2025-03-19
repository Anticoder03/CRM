<!-- delete_customer.php -->
<?php
include 'includes/db.php'; // Database connection file

// Check if customer ID is set
if (isset($_GET['id'])) {
    $customer_id = $_GET['id'];

    // Prepare the DELETE query
    $stmt = $conn->prepare("DELETE FROM customers WHERE customer_id = ?");
    $stmt->bind_param("i", $customer_id);

    // Execute and check if deletion was successful
    if ($stmt->execute()) {
        echo "<script>alert('Customer deleted successfully!'); window.location.href='display_customers.php';</script>";
    } else {
        echo "<script>alert('Failed to delete customer.');</script>";
    }

    $stmt->close();
}

$conn->close();
?>
