<?php
include 'includes/db.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data and sanitize inputs
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $postal_code = trim($_POST['postal_code']);
    $country = trim($_POST['country']);
    $company_name = trim($_POST['company_name']);
    $position = trim($_POST['position']);
    $tags = trim($_POST['tags']);
    $notes = trim($_POST['notes']);
    $status = 'prospect';

    // Server-side validation
    $errors = [];

    if (empty($first_name) || strlen($first_name) > 50) {
        $errors[] = "First name is required and should not exceed 50 characters.";
    }

    if (empty($last_name) || strlen($last_name) > 50) {
        $errors[] = "Last name is required and should not exceed 50 characters.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 100) {
        $errors[] = "A valid email is required and should not exceed 100 characters.";
    }

    if (!empty($phone) && !preg_match('/^\+?[0-9]*$/', $phone)) {
        $errors[] = "Phone number can only contain numbers and optional '+' sign.";
    }

    if (!empty($postal_code) && !preg_match('/^[A-Za-z0-9\s\-]{4,20}$/', $postal_code)) {
        $errors[] = "Postal code can only contain letters, numbers, spaces, and hyphens, and should be 4-20 characters long.";
    }

    if (empty($errors)) {
        // Check if email already exists
        $query = $conn->prepare("SELECT * FROM customers WHERE email = ?");
        $query->bind_param("s", $email);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Email is already registered'); window.location.href='signup.php';</script>";
        } else {
            // Insert new customer data
            $stmt = $conn->prepare("INSERT INTO customers (first_name, last_name, email, phone, address, city, state, postal_code, country, company_name, position, tags, notes, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssssssssss", $first_name, $last_name, $email, $phone, $address, $city, $state, $postal_code, $country, $company_name, $position, $tags, $notes, $status);
            
            if ($stmt->execute()) {
                echo "<script>alert('Sign-up successful!'); window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Sign-up failed. Please try again.');</script>";
            }
            $stmt->close();
        }
        $query->close();
    } else {
        // Output validation errors
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    }
    $conn->close();
}
?>
