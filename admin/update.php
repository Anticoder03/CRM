<!-- update_customer.php -->
<?php
include 'includes/db.php'; // Database connection file

// Fetch customer data based on ID
if (isset($_GET['id'])) {
    $customer_id = $_GET['id'];
    $query = $conn->prepare("SELECT * FROM customers WHERE customer_id = ?");
    $query->bind_param("i", $customer_id);
    $query->execute();
    $result = $query->get_result();
    $customer = $result->fetch_assoc();
}

// Update customer details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal_code = $_POST['postal_code'];
    $country = $_POST['country'];
    $company_name = $_POST['company_name'];
    $position = $_POST['position'];
    $tags = $_POST['tags'];
    $notes = $_POST['notes'];

    $stmt = $conn->prepare("UPDATE customers SET first_name = ?, last_name = ?, email = ?, phone = ?, address = ?, city = ?, state = ?, postal_code = ?, country = ?, company_name = ?, position = ?, tags = ?, notes = ? WHERE customer_id = ?");
    $stmt->bind_param("sssssssssssssi", $first_name, $last_name, $email, $phone, $address, $city, $state, $postal_code, $country, $company_name, $position, $tags, $notes, $customer_id);

    if ($stmt->execute()) {
        echo "<script>alert('Customer updated successfully!'); window.location.href='display_customers.php';</script>";
    } else {
        echo "<script>alert('Update failed. Please try again.');</script>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3>Update Customer</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?= $customer['first_name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $customer['last_name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $customer['email'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?= $customer['phone'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= $customer['address'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="<?= $customer['city'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="state" name="state" value="<?= $customer['state'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="postal_code" class="form-label">Postal Code</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code" value="<?= $customer['postal_code'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" value="<?= $customer['country'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="company_name" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="company_name" name="company_name" value="<?= $customer['company_name'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="position" class="form-label">Position</label>
                <input type="text" class="form-control" id="position" name="position" value="<?= $customer['position'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <input type="text" class="form-control" id="tags" name="tags" value="<?= $customer['tags'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="notes" class="form-label">Notes</label>
                <textarea class="form-control" id="notes" name="notes" rows="3" required><?= $customer['notes'] ?></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update Customer</button>
            </div>
        </form>
    </div>
</body>
</html>
