<?php include 'includes/db.php'; 

// session_start();
// if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
//     header("Location: ../login.php");
//     exit;
// }

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
            display: flex;
        }
        /* Make iframe full-screen */
        iframe {
            width: 80vw;
            height: 100vh;
            border: none;
            overflow: hidden;

        }
        /* Hide the default scrollbar */
        iframe::-webkit-scrollbar {
            display: none;
        }
        iframe {
            scrollbar-width: none; /* For Firefox */
        }

       
             /* Basic reset */
             * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        /* Container grid setup */
        .container2 {
            display: grid;
            grid-template-areas: 
                "sidebar navbar navbar"
                "sidebar iframe iframe"
                "sidebar footer footer";
            grid-template-columns: 200px 1fr;
            grid-template-rows: 60px 1fr 50px;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            grid-area: sidebar;
            background-color: #f4f4f4;
            padding: 10px;
            width: 40rem;
        }

        /* Navbar */
        .navbar {
            grid-area: navbar;
            background-color: #ddd;
            padding: 10px;
            text-align: center;
        }

        /* Main iframe area */
        .iframe {
            width: 86.5vw;
            grid-area: iframe;
            background-color: #fff;
            padding: 10px;
        }

        /* Footer */
        .footer {
            grid-area: footer;
            background-color: #ddd;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container2">
        <div class="sidebar"><?php include '_Sidebar.php'; ?></div>
        <div class="navbar"> <?php include '_Nav.php'; ?></div>
        <div class="iframe"><iframe src="./home.php" frameborder="0" width="100%" name="mainframe"></iframe></div>
        <div class="footer">  <?php include '_Footer.php'; ?></div>
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
