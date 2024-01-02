<?php
include "dbcon.php";
session_start();

$fname = mysqli_real_escape_string($conn, $_POST['firstName']);
$lname = mysqli_real_escape_string($conn, $_POST['lastName']);
$pwd = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "INSERT INTO users (FirstName, LastName, Password) VALUES ('$fname', '$lname', '$pwd')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header("Location: success.html");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("Location: 404.html");
}

mysqli_close($conn);
?>
