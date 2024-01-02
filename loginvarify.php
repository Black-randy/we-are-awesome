<?php
include "dbcon.php";
session_start();

$name = $_POST['uname'];
$password = $_POST['password'];

if ($name == null && !$password == null) {
    header("Location: login.php?error=Name is missing");
} elseif ($password == null && !$name == null) {
    header("Location: login.php?error=Password is missing");
} elseif ($name == null && !$password == null) {
    header("Location: login.php?error=Both name and password are missing");
} elseif (!$name == null && !$password == null) {
    $sql = "SELECT * FROM users WHERE FirstName = '$name' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $row['FirstName'];
        $_SESSION['role'] = $row['role'];
        header("Location: home.php");
        exit();
    } else {
        header("Location: login.php?error=Incorrect username or password");
    }
}

mysqli_close($conn);
?>
