<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <title>Add Customer</title>
</head>
<body>

<div class="container mt-5">
  <h2>Add New Customer</h2>
  <form action="customer_add_func.php" method="POST">
    <div class="form-group">
      <label for="user_email">Email:</label>
      <input type="email" class="form-control" id="user_email" name="user_email" required>
    </div>
    <div class="form-group">
      <label for="first_name">First Name:</label>
      <input type="text" class="form-control" id="first_name" name="first_name" required>
    </div>
    <div class="form-group">
      <label for="last_name">Last Name:</label>
      <input type="text" class="form-control" id="last_name" name="last_name" required>
    </div>
    <div class="form-group">
      <label for="phone_no">Phone Number:</label>
      <input type="tel" class="form-control" id="phone_no" name="phone_no" required>
    </div>
    <div class="form-group">
      <label for="User_loyalty">Loyalty:</label>
      <select class="form-control" id="User_loyalty" name="User_loyalty" required>
        <option value="Loyal">Loyal</option>
        <option value="Regular">Regular</option>
      </select>
    </div>
    <div class="form-group">
      <label for="User_Birthday">Birthday:</label>
      <input type="date" class="form-control" id="User_Birthday" name="User_Birthday" required>
    </div>
    <div class="form-group">
      <label for="address">Address:</label>
      <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add Customer</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
