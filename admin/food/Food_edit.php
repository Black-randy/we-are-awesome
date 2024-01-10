<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/fluent-ui.css">
    <!-- Bootstrap CDN for styling -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit Food</title>
</head>
<style>
    body {
        background: #efecff;
    }
</style>
<body>

<?php
include '../dbcon.php';

if (isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];
    $result = $conn->query("SELECT * FROM food WHERE food_id = $food_id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Populate form fields with existing data
        $food_name = $row['food_name'];
        $food_type = $row['food_type'];
        $price = $row['price'];
    } else {
        echo "Food not found.";
        // Redirect or handle accordingly
    }
} else {
    echo "Invalid request. Food ID not provided.";
    // Redirect or handle accordingly
}
?>

<div class="glass-form" style="width: 800px; text-align: left;">
    <div class="container mt-5">
        <h2>Edit Food</h2>
        <!-- Create a form with input fields for editing food details -->
        <form action="food_edit_func.php" method="post">
            <input type="hidden" name="food_id" value="<?php echo $food_id; ?>">

            <label for="food_id">Food ID:</label>
            <input type="text" class="form-control" name="food_id" value="<?php echo $food_id; ?>" readonly>

            <label for="food_name">Food Name:</label>
            <input type="text" name="food_name" value="<?php echo $food_name; ?>" class="form-control">

            <label for="food_type">Food Type:</label>
            <input type="text" name="food_type" value="<?php echo $food_type; ?>" class="form-control">

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
