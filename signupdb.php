<?php
include "admin/dbcon.php";
session_start();

$Name = mysqli_real_escape_string($conn, $_POST['Name']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$pwd = mysqli_real_escape_string($conn, $_POST['password']);

// Check for duplicate username
$checkDuplicate = "SELECT * FROM sys_users WHERE username='$username'";
$result = mysqli_query($conn, $checkDuplicate);

if (mysqli_num_rows($result) > 0) {
    // Username already exists
    echo "Error: Username already exists. Please choose a different username.";
    header("404.html"); // Redirect to an error page or display an error message
} else {
    // Insert the new record
    $sql = "INSERT INTO sys_users (Name, username, password) VALUES ('$Name', '$username', '$pwd')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
        header("Location: success.html");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        header("404.html");
    }
}

mysqli_close($conn);
?>
