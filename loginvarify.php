<?php
include "admin/dbcon.php";
session_start();

$name = $_POST['uname'];
$password = $_POST['password'];

if (empty($name) && empty($password)) {
    header("Location: login.php?error=Both name and password are missing");
    exit();
} elseif (!empty($name) && !empty($password)) {
    $sql = "SELECT * FROM sys_users WHERE username = '$name' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['name'] = $row['name'];
        $_SESSION['user'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        header("Location: home.php");
    } else {
        header("Location: login.php?error=Invalid username or password");
    }
}

mysqli_close($conn);
?>
