<?php
include 'includes/db.php'; // Database connection file

// Fetch leads from the database
$query = "SELECT * FROM leads";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leads Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .fade-in {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8 bg-white shadow-md rounded-lg mt-10 fade-in">
        <h3 class="text-3xl font-semibold mb-6 text-gray-800 text-center">Leads Management</h3>

        <?php if ($result->num_rows > 0): ?>
            <table class="max-w-full bg-white border table-auto border-spacing-x-3.5 border-gray-200">
                <thead>
                    <tr class="bg-slate-600">
                        <th class="py-2 px-2 border-b text-center text-gray-600">Lead ID</th>
                        <th class="py-2 px-2 border-b text-center text-gray-600">First Name</th>
                        <th class="py-2 px-2 border-b text-center text-gray-600">Last Name</th>
                        <th class="py-2 px-2 border-b text-center text-gray-600">Email</th>
                        <th class="py-2 px-2 border-b text-center text-gray-600">Phone</th>
                        <th class="py-2 px-2 border-b text-center text-gray-600">Company</th>
                        <th class="py-2 px-2 border-b text-center text-gray-600">Lead Source</th>
                        <th class="py-2 px-2 border-b text-center text-gray-600">Status</th>
                        <th class="py-2 px-2 border-b text-center text-gray-600">Opportunity Value</th>
                        <th class="py-2 px-2 border-b text-center text-gray-600">Close Date</th>
                        <th class="py-2 px-2 border-b text-center text-gray-600">Notes</th>
                        <!-- <th class="py-2 px-2 border-b text-center text-gray-600">Actions</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php while ($lead = $result->fetch_assoc()): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-2 border-b"><?php echo $lead['lead_id']; ?></td>
                            <td class="py-2 px-2 border-b"><?php echo htmlspecialchars($lead['first_name']); ?></td>
                            <td class="py-2 px-2 border-b"><?php echo htmlspecialchars($lead['last_name']); ?></td>
                            <td class="py-2 px-2 border-b"><?php echo htmlspecialchars($lead['email']); ?></td>
                            <td class="py-2 px-2 border-b"><?php echo htmlspecialchars($lead['phone']); ?></td>
                            <td class="py-2 px-2 border-b"><?php echo htmlspecialchars($lead['company_name']); ?></td>
                            <td class="py-2 px-2 border-b"><?php echo htmlspecialchars($lead['lead_source']); ?></td>
                            <td class="py-2 px-2 border-b"><?php echo htmlspecialchars($lead['lead_status']); ?></td>
                            <td class="py-2 px-2 border-b"><?php echo number_format($lead['opportunity_value'], 2); ?></td>
                            <td class="py-2 px-2 border-b"><?php echo htmlspecialchars($lead['close_date']); ?></td>
                            <td class="py-2 px-2 border-b"><?php echo htmlspecialchars($lead['notes']); ?></td>
                            <!-- <td class="py-2 px-2 border-b text-center">
                                <a href="update_lead.php?id=<?php echo $lead['lead_id']; ?>" class="text-blue-500 hover:text-blue-700">Edit</a> |
                                <a href="delete_lead.php?id=<?php echo $lead['lead_id']; ?>" class="text-red-500 hover:text-red-700" onclick="return confirm('Are you sure you want to delete this lead?');">Delete</a>
                            </td> -->
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center text-gray-600">No leads found.</p>
        <?php endif; ?>
    </div>
         
    <script>
        $(document).ready(function(){
            // Apply fade-in effect on page load
            $('.fade-in').fadeIn(1000);
        });
    </script>
</body>
</html>
