<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Add New Food</title>
</head>
<body>

<div class="container mt-5">
    <h2>Add New Food</h2>
    <form action="food_add_func.php" method="POST">
        <div class="form-group">
            <label for="food_id">Food ID:</label>
            <input type="text" class="form-control" id="food_id" name="food_id" required>
        </div>
        <div class="form-group">
            <label for="food_name">Food Name:</label>
            <input type="text" class="form-control" id="food_name" name="food_name" required>
        </div>
        <div class="form-group">
            <label for="food_type">Food Type:</label>
            <select class="form-control" id="food_type" name="food_type" required>
                <?php
                // Assuming $conn is your database connection object
                include '../dbcon.php';
                $sql = "SELECT * FROM product_catagories";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['product_type_id'] . "'>" . $row['products_type_name'] . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Food</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
