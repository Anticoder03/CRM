<?php
include '../includes/db.php'; // Connect to your database

// Initialize variables for form data, errors, and messages
$success = "";
$error = "";
$first_name = $last_name = $email = $phone = $company = $address = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $company = trim($_POST['company']);
    $address = trim($_POST['address']);

    // Validation errors array
    $validation_errors = [];

    // Validate first name
    if (empty($first_name)) {
        $validation_errors[] = "First name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
        $validation_errors[] = "First name can only contain letters and spaces.";
    }

    // Validate last name
    if (empty($last_name)) {
        $validation_errors[] = "Last name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
        $validation_errors[] = "Last name can only contain letters and spaces.";
    }

    // Validate email
    if (empty($email)) {
        $validation_errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $validation_errors[] = "Invalid email format.";
    }

    // Validate phone
    if (empty($phone)) {
        $validation_errors[] = "Phone number is required.";
    } elseif (!preg_match("/^\+?\d{10,15}$/", $phone)) {
        $validation_errors[] = "Phone number can only contain numbers and be 10-15 digits long.";
    }

    // Validate optional fields without additional validation
    $company = htmlspecialchars($company);
    $address = htmlspecialchars($address);

    // Check if there are any validation errors
    if (empty($validation_errors)) {
        // Check for duplicate email
        $email_check_query = "SELECT email FROM clients WHERE email = ?";
        $stmt = $conn->prepare($email_check_query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "This email is already registered. Please use a different email.";
        } else {
            // Insert new client data
            $stmt->close();
            $stmt = $conn->prepare("INSERT INTO clients (first_name, last_name, email, phone, company, address) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $first_name, $last_name, $email, $phone, $company, $address);

            if ($stmt->execute()) {
                $success = "Client registered successfully!";
                // Clear the form fields
                $first_name = $last_name = $email = $phone = $company = $address = "";
            } else {
                $error = "Error registering client. Please try again.";
            }
        }
        $stmt->close();
    } else {
        $error = implode("<br>", $validation_errors); // Show all validation errors
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-screen flex items-center justify-center">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Client Registration</h2>

        <?php if ($success): ?>
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6"><?= $success ?></div>
        <?php elseif ($error): ?>
            <div class="bg-red-100 text-red-800 p-4 rounded mb-6"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-4">
                <label for="first_name" class="block font-semibold">First Name</label>
                <input type="text" name="first_name" required class="w-full border border-gray-300 rounded p-2" value="<?= htmlspecialchars($first_name) ?>">
            </div>
            <div class="mb-4">
                <label for="last_name" class="block font-semibold">Last Name</label>
                <input type="text" name="last_name" required class="w-full border border-gray-300 rounded p-2" value="<?= htmlspecialchars($last_name) ?>">
            </div>
            <div class="mb-4">
                <label for="email" class="block font-semibold">Email</label>
                <input type="email" name="email" required class="w-full border border-gray-300 rounded p-2" value="<?= htmlspecialchars($email) ?>">
            </div>
            <div class="mb-4">
                <label for="phone" class="block font-semibold">Phone</label>
                <input type="text" name="phone" required class="w-full border border-gray-300 rounded p-2" value="<?= htmlspecialchars($phone) ?>">
            </div>
            <div class="mb-4">
                <label for="company" class="block font-semibold">Company</label>
                <input type="text" name="company" class="w-full border border-gray-300 rounded p-2" value="<?= htmlspecialchars($company) ?>">
            </div>
            <div class="mb-4">
                <label for="address" class="block font-semibold">Address</label>
                <textarea name="address" rows="3" class="w-full border border-gray-300 rounded p-2"><?= htmlspecialchars($address) ?></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded mt-4 hover:bg-blue-600">Register Client</button>
        </form>
    </div>
</body>
</html>

<?php $conn->close(); ?>
