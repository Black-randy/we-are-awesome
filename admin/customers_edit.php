<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/fluent-ui.css">
    <title>Edit Customer</title>
    <!-- Include necessary stylesheets and scripts, similar to the ones in your existing code -->
    <!-- Bootstrap CDN for styling (you can adjust the version if needed) -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
	body{
        background: #efecff;
  }
</style>
<body>

<?php
include 'dbcon.php';

if (isset($_GET['UserID'])) {
    $userID = $_GET['UserID'];
    $result = $conn->query("SELECT * FROM customers WHERE UserID = $userID");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Populate form fields with existing data
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $user_email = $row['user_email'];
        $phone_no = $row['phone_no'];
        $order_count = $row['Order_count'];
        $address = $row['address'];
        // Other fields as needed
    } else {
        echo "Customer not found.";
        // Redirect or handle accordingly
    }
} else {
    echo "Invalid request. UserID not provided.";
    // Redirect or handle accordingly
}
?>

<div class="glass-form" style="width: 600px;text-align: left;">
    <div class="container mt-5">
    <h2>Edit Customer</h2>
    <!-- Create a form with input fields for editing customer details -->
    <form action="customers_edit_func.php" method="post">
        <input type="hidden" name="UserID" value="<?php echo $userID; ?>">

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?php echo $first_name; ?>" class="form-control">
        
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="<?php echo $last_name; ?>" class="form-control">

        <label for="user_email">Email:</label>
        <input type="email" name="user_email" value="<?php echo $user_email; ?>" class="form-control">

        <label for="phone_no">Phone Number:</label>
        <input type="tel" name="phone_no" value="<?php echo $phone_no; ?>" class="form-control">

        <label for="order_count">Order Count:</label>
        <input type="number" name="order_count" value="<?php echo $order_count; ?>" class="form-control">

        <label for="address">Address:</label>
        <textarea name="address" class="form-control"><?php echo $address; ?></textarea>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
    </div>
</div>

<!-- Bootstrap JS and Popper.js CDN (you can adjust the version if needed) -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
