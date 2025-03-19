<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Customer Sign Up</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <style>
    /* Custom animation styling */
    .animated-field { opacity: 0; }
    .form-container { display: none; }
  </style>
</head>
<body>
  
  <?php include '_Nav.php'; ?>

  <div class="container mt-5 form-container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <h2 class="text-center">Customer Registration</h2>
        <form action="signup_process.php" method="post" id="signupForm">
          <div class="form-row animated-field">
            <div class="form-group col-md-6">
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
          </div>
          <div class="form-group animated-field">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group animated-field">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone">
          </div>
          <div class="form-group animated-field">
            <label for="address">Address:</label>
            <textarea class="form-control" id="address" name="address"></textarea>
          </div>
          <div class="form-row animated-field">
            <div class="form-group col-md-4">
              <label for="city">City:</label>
              <input type="text" class="form-control" id="city" name="city">
            </div>
            <div class="form-group col-md-4">
              <label for="state">State:</label>
              <input type="text" class="form-control" id="state" name="state">
            </div>
            <div class="form-group col-md-4">
              <label for="postal_code">Postal Code:</label>
              <input type="text" class="form-control" id="postal_code" name="postal_code">
            </div>
          </div>
          <div class="form-group animated-field">
            <label for="country">Country:</label>
            <input type="text" class="form-control" id="country" name="country">
          </div>
          <div class="form-group animated-field">
            <label for="company_name">Company Name:</label>
            <input type="text" class="form-control" id="company_name" name="company_name">
          </div>
          <div class="form-group animated-field">
            <label for="position">Position:</label>
            <input type="text" class="form-control" id="position" name="position">
          </div>
          <div class="form-group animated-field">
            <label for="tags">Tags:</label>
            <input type="text" class="form-control" id="tags" name="tags" placeholder="E.g., Lead, VIP">
          </div>
          <div class="form-group animated-field">
            <label for="notes">Notes:</label>
            <textarea class="form-control" id="notes" name="notes"></textarea>
          </div>
          <button type="submit" class="btn btn-primary btn-block animated-field">Sign Up</button>
        </form>
      </div>
    </div>
  </div>

  <?php include '_Footer.php'; ?>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/scripts.js"></script>
  <script>
    $(document).ready(function() {
      // Fade in the form container
      $('.form-container').fadeIn(1000, function() {
        // Sequentially fade in each form field without changing position
        $('.animated-field').each(function(index) {
          $(this).delay(300 * index).animate({ opacity: 1 }, 600);
        });
      });

      // Simple form validation
      $('#signupForm').on('submit', function(event) {
        var password = $('#password').val();
        var confirmPassword = $('#confirmPassword').val();

        if (password !== confirmPassword) {
          event.preventDefault();
          alert('Passwords do not match!');
          $('#confirmPassword').focus();
        }
      });
    });
  </script>
</body>
</html>
