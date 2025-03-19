<?php
include 'includes/db.php'; // Database connection file

// Fetch customers from the database
$query = "SELECT * FROM customers";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management - Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Hover effect for table rows */
        tr:hover {
            background-color: #f1f1f1;
        }

        /* For animating table rows */
        .fade-in-row {
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }

        /* For adding transition effects to table actions */
        .action-buttons a {
            transition: transform 0.2s;
        }

        .action-buttons a:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4">Customer Management</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($customer = $result->fetch_assoc()): ?>
                    <tr class="fade-in-row">
                        <td><?= $customer['first_name'] ?></td>
                        <td><?= $customer['last_name'] ?></td>
                        <td><?= $customer['email'] ?></td>
                        <td><?= $customer['phone'] ?></td>
                        <td><?= $customer['company_name'] ?></td>
                        <td class="action-buttons">
                            <a href="update.php?id=<?= $customer['customer_id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Update</a>
                            <a href="delete_customer.php?id=<?= $customer['customer_id'] ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- jQuery, Bootstrap JS, and custom script for animations -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Animate table rows on load
            $('.fade-in-row').each(function(index) {
                $(this).delay(200 * index).fadeTo(1000, 1);  // Delay and fade in effect for each row
            });
        });
    </script>
</body>
</html>
