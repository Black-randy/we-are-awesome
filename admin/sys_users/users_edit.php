<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/fluent-ui.css">
    <!-- Bootstrap CDN for styling -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Edit User</title>
</head>
<style>
    body {
        background: #efecff;
    }
</style>
<body>

<?php
include '../dbcon.php';

if (isset($_GET['sys_users_id'])) {
    $sys_users_id = $_GET['sys_users_id'];
    $result = $conn->query("SELECT * FROM sys_users WHERE sys_users_id = $sys_users_id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Populate form fields with existing data
        
        $name = $row['name'];
        $username = $row['username'];
        $password = $row['password'];
        $role = $row['role'];
    } else {
        echo "User not found.";
        // Redirect or handle accordingly
    }
} else {
    echo "Invalid request. User ID not provided.";
    // Redirect or handle accordingly
}
?>

<div class="glass-form" style="width: 800px; text-align: left;">
    <div class="container mt-5">
        <h2>Edit User</h2>
        <!-- Create a form with input fields for editing user details -->
        <form action="users_edit_func.php" method="post">
            <input type="hidden" name="sys_users_id" value="<?php echo $sys_users_id; ?>">

            <label for="sys_users_id">User ID:</label>
            <input type="text" class="form-control" name="sys_users_id" value="<?php echo $sys_users_id; ?>" readonly>
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $name; ?>" class="form-control">

            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">

            <label for="password">Password:</label>
            <input type="password" name="password" value="<?php echo $password; ?>" class="form-control">

            <label for="role">Role:</label>
            <select name="role" class="form-control">
                <option value="1" <?php echo ($role == 1) ? 'selected' : ''; ?>>Admin</option>
                <option value="2" <?php echo ($role == 2) ? 'Order Taker' : ''; ?>>Staff</option>
                <option value="3" <?php echo ($role == 3) ? 'Delivery' : ''; ?>>Delivery</option>
                <option value="4" <?php echo ($role == 4) ? 'Not Defined' : ''; ?>>Not Defined</option>
            </select>

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
