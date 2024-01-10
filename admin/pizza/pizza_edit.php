<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/fluent-ui.css">
    <!-- Bootstrap CDN for styling -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Pizza</title>
</head>
<style>
    body {
        background: #efecff;
    }
</style>
<body>

<?php
include '../dbcon.php';

if (isset($_GET['pizza_id'])) {
    $pizza_id = $_GET['pizza_id'];
    $result = $conn->query("SELECT * FROM pizza WHERE pizza_id = $pizza_id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Populate form fields with existing data
        $pizza_name = $row['pizza_name'];
        $pizza_category = $row['pizza_type'];
        $price = $row['price'];
    } else {
        echo "Pizza not found.";
        // Redirect or handle accordingly
    }
} else {
    echo "Invalid request. Pizza ID not provided.";
    // Redirect or handle accordingly
}
?>

<div class="glass-form" style="width: 800px; text-align: left;">
    <div class="container mt-5">
        <h2>Edit Pizza</h2>
        <!-- Create a form with input fields for editing pizza details -->
        <form action="pizza_edit_func.php" method="post">
            <input type="hidden" name="pizza_id" value="<?php echo $pizza_id; ?>">

            <label for="pizza_id">Pizza ID:</label>
            <input type="text" class="form-control" name="pizza_id" value="<?php echo $pizza_id; ?>" readonly>

            <label for="pizza_name">Pizza Name:</label>
            <input type="text" name="pizza_name" value="<?php echo $pizza_name; ?>" class="form-control">

            <label for="pizza_category">Pizza Category:</label>
            <input type="text" name="pizza_category" value="<?php echo $pizza_category; ?>" class="form-control">

            <label for="price">Price:</label>
            <input type="text" name="price" value="<?php echo $price; ?>" class="form-control">

            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
</div>

<!-- Bootstrap JS and Popper.js CDN -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
