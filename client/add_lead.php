<?php
include 'includes/db.php'; // Database connection file

$errors = [];
$successMessage = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and validate form data
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $phone = trim($_POST['phone']);
    $company_name = trim($_POST['company_name']);
    $position = trim($_POST['position']);
    $lead_source = trim($_POST['lead_source']);
    $lead_status = $_POST['lead_status'];
    $opportunity_value = filter_var($_POST['opportunity_value'], FILTER_VALIDATE_FLOAT);
    $close_date = $_POST['close_date'];
    $notes = trim($_POST['notes']);

    // Check required fields
    if (!$first_name || !$last_name || !$lead_status) {
        $errors[] = "Please fill out all required fields.";
    }
    if ($email === false && !empty($_POST['email'])) {
        $errors[] = "Please enter a valid email.";
    }
    if ($opportunity_value === false && !empty($_POST['opportunity_value'])) {
        $errors[] = "Please enter a valid opportunity value.";
    }

    if (empty($errors)) {
        // Insert lead into the database
        $stmt = $conn->prepare("INSERT INTO leads (first_name, last_name, email, phone, company_name, position, lead_source, lead_status, opportunity_value, close_date, notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssdss", $first_name, $last_name, $email, $phone, $company_name, $position, $lead_source, $lead_status, $opportunity_value, $close_date, $notes);

        if ($stmt->execute()) {
            $successMessage = "Lead added successfully!";
        } else {
            $errors[] = "Failed to add lead. Please try again.";
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Lead</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/lead.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8 w-1/2 bg-white shadow-md rounded-lg mt-10 fade-in">
        <h3 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Lead Registration</h3>

        <?php if (!empty($errors)): ?>
            <div class="bg-red-100 text-red-600 border border-red-200 p-4 rounded mb-4">
                <?php foreach ($errors as $error): ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php elseif ($successMessage): ?>
            <div class="bg-green-100 text-green-600 border border-green-200 p-4 rounded mb-4">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <div class="flex space-x-4">
                <div class="w-1/2">
                    <label for="first_name" class="block text-gray-600">First Name*</label>
                    <input type="text" class="w-full p-2 border rounded" id="first_name" name="first_name" required>
                </div>
                <div class="w-1/2">
                    <label for="last_name" class="block text-gray-600">Last Name*</label>
                    <input type="text" class="w-full p-2 border rounded" id="last_name" name="last_name" required>
                </div>
            </div>
            <div>
                <label for="email" class="block text-gray-600">Email</label>
                <input type="email" class="w-full p-2 border rounded" id="email" name="email">
            </div>
            <div>
                <label for="phone" class="block text-gray-600">Phone</label>
                <input type="text" class="w-full p-2 border rounded" id="phone" name="phone">
            </div>
            <div>
                <label for="company_name" class="block text-gray-600">Company Name</label>
                <input type="text" class="w-full p-2 border rounded" id="company_name" name="company_name">
            </div>
            <div>
                <label for="position" class="block text-gray-600">Position</label>
                <input type="text" class="w-full p-2 border rounded" id="position" name="position">
            </div>
            <div>
                <label for="lead_source" class="block text-gray-600">Lead Source</label>
                <input type="text" class="w-full p-2 border rounded" id="lead_source" name="lead_source">
            </div>
            <div>
                <label for="lead_status" class="block text-gray-600">Lead Status*</label>
                <select class="w-full p-2 border rounded" id="lead_status" name="lead_status" required>
                    <option value="new">New</option>
                    <option value="contacted">Contacted</option>
                    <option value="qualified">Qualified</option>
                    <option value="converted">Converted</option>
                    <option value="lost">Lost</option>
                </select>
            </div>
            <div>
                <label for="opportunity_value" class="block text-gray-600">Opportunity Value</label>
                <input type="number" step="0.01" class="w-full p-2 border rounded" id="opportunity_value" name="opportunity_value">
            </div>
            <div>
                <label for="close_date" class="block text-gray-600">Close Date</label>
                <input type="date" class="w-full p-2 border rounded" id="close_date" name="close_date">
            </div>
            <div>
                <label for="notes" class="block text-gray-600">Notes</label>
                <textarea class="w-full p-2 border rounded" id="notes" name="notes" rows="4"></textarea>
            </div>
            <div>
                <button type="submit" class="w-full p-3 bg-blue-600 text-white rounded hover:bg-blue-700 transition duration-200">Register Lead</button>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            // Apply fade-in effect on form load
            $('.fade-in').hide().fadeIn(1000);
        });
    </script>
</body>
</html>
