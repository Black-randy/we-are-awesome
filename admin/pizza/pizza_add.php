<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <title>Add Pizza</title>
</head>
<body>

<div class="container mt-5">
  <h2>Add New Pizza</h2>
  <form action="pizza_add_func.php" method="POST">
    <div class="form-group">
      <label for="pizza_name">Pizza Name:</label>
      <input type="text" class="form-control" id="pizza_name" name="pizza_name" required>
    </div>
    <div class="form-group">
      <label for="pizza_type">Pizza Category:</label>
      <!-- Fetch pizza categories from the database and populate the dropdown -->
      <?php
        include '../dbcon.php';
        $sql = "SELECT * FROM pizza_catagories";
        $result = $conn->query($sql);
      ?>
      <select class="form-control" id="pizza_type" name="pizza_type" required>
        <?php
          while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['pizza_category_id'] . "'>" . $row['pizza_category_name'] . "</option>";
          }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="text" class="form-control" id="price" name="price" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Pizza</button>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
