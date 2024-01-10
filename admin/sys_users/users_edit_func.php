<?php
include '../dbcon.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure the form is submitted using POST method

    // Retrieve and sanitize form data
    $sys_users_id = $_POST['sys_users_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    // Perform update query
    $updateQuery = "UPDATE sys_users SET 
                    name='$name', 
                    username='$username', 
                    password='$password', 
                    role=$role
                    WHERE sys_users_id=$sys_users_id";

    if ($conn->query($updateQuery) === TRUE) {
        // Update successful
        echo "User updated successfully";
        // Redirect to home.php after successful update
        header("Location: /weareawesome/home.php");
        exit();
    } else {
        // Handle update failure
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Redirect or handle accordingly for invalid requests
    echo "Invalid request method.";
}
?>
