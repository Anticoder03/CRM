<!-- index.php -->
<?php include 'includes/db.php'; 
// Query to count total clients
$sql = "SELECT COUNT(*) AS total_clients FROM customers";
$result = $conn->query($sql);

$total_clients = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_clients = $row['total_clients'];
}   

//salse amount

// Query to calculate total sales amount
$sql = "SELECT SUM(sale_amount) AS total_sales FROM sales WHERE sale_status = 'Completed'";
$result = $conn->query($sql);

// Fetch total sales amount
$total_sales = 0;
if ($result && $row = $result->fetch_assoc()) {
    $total_sales = $row['total_sales'] ?? 0; // Ensure no null value
}


// Query to count pending tasks
$sql = "SELECT COUNT(*) AS pending_tasks FROM tasks WHERE status = 'Pending' OR completion_percentage < 100";
$result = $conn->query($sql);

// Fetch pending task count
$pending_tasks = 0;
if ($result && $row = $result->fetch_assoc()) {
    $pending_tasks = $row['pending_tasks'] ?? 0; // Ensure no null value
}



?>  <!-- Include the database connection file -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .card-hover { cursor: pointer; transition: transform 0.2s; }
        .card-hover:hover { transform: scale(1.05); }
        body {
            padding-top: 60px; /* Adjusted for the fixed navbar */
        }
        .main-content {
            min-height: calc(100vh - 120px); /* Ensures the footer stays at the bottom */
        }
    </style>
</head>
<body>
    <!-- Include Navbar -->


    <div class="container-fluid main-content">
        <div class="row">
            <!-- Sidebar -->
      

            <!-- Main Content -->
            <div class="col-md-9">
                <h3 class="mb-4">Welcome to the CRM Dashboard</h3>
                <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3 card-hover">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-users"></i> Total Clients</h5>
                            <p class="card-text"><?php echo $total_clients; ?></p>
                        </div>
                    </div>
                </div>
                    <!-- Display the total sales dynamically -->
                    <div class="col-md-4">
                        <div class="card text-white bg-success mb-3 card-hover">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-dollar-sign"></i> Sales</h5>
                                <p class="card-text">₹<?php echo number_format($total_sales, 2); ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- Display the pending tasks dynamically -->
                    <div class="col-md-4">
                        <div class="card text-white bg-warning mb-3 card-hover">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-tasks"></i> Pending Tasks</h5>
                                <p class="card-text"><?php echo $pending_tasks; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- More Features with Animations -->
                <div class="row mt-4" id="moreFeatures">
                    <div class="col-md-6">
                        <div class="alert alert-info"><i class="fas fa-bullhorn"></i> Track Leads and Opportunities</div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-secondary"><i class="fas fa-file-alt"></i> Generate Custom Reports</div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-primary"><i class="fas fa-cogs"></i> Manage Permissions</div>
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-danger"><i class="fas fa-envelope-open"></i> Email Integration</div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap JS, jQuery, and Custom JS for Animations -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            // Animate sidebar items on hover
            $('#sidebar .list-group-item').hover(
                function() { $(this).addClass('active'); },
                function() { $(this).removeClass('active'); }
            );

            // Animate cards on load
            $('.card-hover').hide().each(function(index) {
                $(this).delay(200 * index).fadeIn(500);
            });

            // Animate additional features section
            $('#moreFeatures .alert').hide().each(function(index) {
                $(this).delay(300 * index).slideDown(600);
            });
        });
    </script>
</body>
</html>
