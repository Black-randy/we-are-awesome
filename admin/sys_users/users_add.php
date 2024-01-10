<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../css/fluent-ui.css">
  <title>Add User</title>
</head>
<style>
    body {
        background: #efecff;
    }
</style>
<body>
<div class="glass-form" style="width: 800px; text-align: left;">
    <h2>Add New User</h2>
    <form action="users_add_func.php" method="POST">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="role">Role:</label>
        <select class="form-control" id="role" name="role" required>
          <option value="1">Admin</option>
          <option value="2">Order Taker</option>
          <option value="3">Delivery</option>
          <option value="4">Not Defined</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Add User</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
