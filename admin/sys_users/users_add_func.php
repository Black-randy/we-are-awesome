<?php
include '../dbcon.php';

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $sql = "INSERT INTO sys_users (sys_users_id, name, username, password, role) 
            VALUES ('$user_id', '$name', '$username', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        // Update successful
        echo "User updated successfully";
        // Redirect to home.php after successful update
        header("Location: /weareawesome/home.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
