<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container-box {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 500px;
            opacity: 0;
            transform: scale(0.8);
        }
        .btn-link {
            font-size: 18px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container-box text-center">
        <h1 class="mb-4 fs-1">Welcome</h1>
        <button id="admin-login" class="btn btn-link fs-1">Admin Login</button>
        <a href="client/" class="btn btn-link fs-1">Go to User</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            // Animate container on load
            $('.container-box').animate({ opacity: 1, transform: "scale(1)" }, 500);

            // Admin login button click
            $('#admin-login').click(function () {
                alert("Admin Login Credentials:\nUsername: admin\nPassword: admin");
                window.location.href = "login.php"; // Redirect to login.php
            });
        });
    </script>
</body>
</html>
